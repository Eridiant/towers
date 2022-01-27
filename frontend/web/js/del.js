window.addEventListener('load', () => {

    // setTimeout(() => {
    //     var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    //     (function(){
    //     var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    //     s1.async=true;
    //     s1.src='https://embed.tawk.to/61a67a909099530957f761a7/1flp4thvt';
    //     s1.charset='UTF-8';
    //     s1.setAttribute('crossorigin','*');
    //     s0.parentNode.insertBefore(s1,s0);
    //     })();
        
    // }, 6000);

    document.addEventListener('click', (e) => {
        let target = e.target;
        if (target.closest('.btn[data-trg]')) {
            document.querySelector(`${target.closest('.btn').dataset.trg}`).scrollIntoView();
        }
    })

    $("#form").submit(function(e) {
        e.preventDefault();
        
        let data = $(this).serializeArray();
        // gtag_report_conversion();
        
        $.ajax({
            url: '/site/ajax',
            type: 'POST',
            data: data,
            success: function(response){

                if (response.data.success == true) {
                    document.querySelector('.success').classList.add('popup-show');
                } else {
                    document.querySelector('.error').classList.add('popup-show');
                }
            },
            error: function(response) {
                document.querySelector('.error').classList.add('popup-show');
            }
        })
    });

    $("#form-popup").submit(function(e) {
        e.preventDefault();
        
        let data = $(this).serializeArray();
        // gtag_report_conversion();
        
        $.ajax({
            url: '/site/ajax',
            type: 'POST',
            data: data,
            success: function(response){

                if (response.data.success == true) {
                    document.querySelector('.success').classList.add('popup-show');
                } else {
                    document.querySelector('.error').classList.add('popup-show');
                }
            },
            error: function(response) {
                document.querySelector('.error').classList.add('popup-show');
            }
        })
    });

    if (document.querySelector('.project-swiper')) {
        var project =  new Swiper(".project-swiper", {
            slidesPerView: 1,
            navigation: {
                nextEl: ".choose-next",
                prevEl: ".choose-prev",
            },
        });
    }

    if (document.querySelector('.choose-swiper')) {
        var choose =  new Swiper(".choose-swiper", {
            slidesPerView: 1,
            navigation: {
                nextEl: ".choose-next",
                prevEl: ".choose-prev",
            },
        });

        switch (window.location.href.slice(-1)) {
            case 'A':
                choose.slideTo(0);
                break;
            case 'B':
                choose.slideTo(1);
                break;
            case 'C':
                choose.slideTo(2);
                // ltrs('C');
                fordelc();
                break;
            default:
                break;
        }

    }

    if (document.querySelector('#layouts')) {
        let layouts = document.querySelector('#block').contentDocument;
        fillData(summ, stt);
        showStatus();
		var floor = new Swiper(".floorChoose", {
			direction: "vertical",
			slidesPerView: 3,
			centeredSlides: true,
			grabCursor: true,
			breakpoints: {
				1000: {
					slidesPerView: 5,
				},
			},
		});
        // document.querySelector('.floorChoose .swiper-wrapper').innerHTML = cont(summ.length, summ[0].floor_num);
        // floor.update();
        // let sdf = choose;
        choose.on('slideChange', ch);
        function ch() {
			let timeoutId = null;

            let fncCall = () => {
                if (choose.activeIndex == 0) {
                    ajaxBlock('block-A');
                    ltrs('A');
                    document.querySelector('#floor').dataset.floor = 'block-A';
                    if (window.history.replaceState) {
                        window.history.replaceState('blockA', 'Title', '/layouts/block-A');
                    }
                    fdel();

                }
                if (choose.activeIndex == 1) {
                    ajaxBlock('block-B');
                    ltrs('B');
                    document.querySelector('#floor').dataset.floor = 'block-B';
                    if (window.history.replaceState) {
                        window.history.replaceState('blockB', 'Title', '/layouts/block-B');
                    }
                    fdel();
                }
                if (choose.activeIndex == 2) {
                    fdelc();
                }
                
                
            }

            clearTimeout(timeoutId);

			timeoutId = setTimeout(fncCall, 1000);
        }

		floor.on('slideChange', fn);

		function fn() {
			let timeoutId = null;
			let wait = 1000;
			let floor_num = document.querySelector('.floor-show').dataset.floor;
			var num;

			let fnCall = () => {
				
				if (floor_num != (floor.activeIndex + 1) ) {
					num = floor.activeIndex + 1;
                    ajaxFloor(document.querySelector('#floor').dataset.floor, num)
					// document.querySelector('.floor-show').classList.remove('floor-show');

					// document.querySelector(`.floor-choose-inner[data-floor="${num + 1}"`).classList.add('floor-show');
				}
				
			}

			clearTimeout(timeoutId);

			timeoutId = setTimeout(fnCall, wait);

		}

        let buildB = document.querySelector('#buildB').contentDocument;
        let buildA = document.querySelector('#buildA').contentDocument;
        let floorNum = document.querySelector('#fl');
        let focusa = document.querySelector('#blocks .block-svg-a .focus');
        let focusb = document.querySelector('#blocks .block-svg-b .focus');

        buildA.addEventListener('mouseover', (e) => {
            if (e.target.classList.contains('area')) {
                let target = e.target;
                
                floorNum.innerHTML = target.dataset.floor;
                // focus.style.backgroundColor = "blue";
                focusa.classList.add('focus-pocus');
                
                focusa.style = `top: ${target.getBoundingClientRect().top * 0.9}px; left: ${target.getBoundingClientRect().right + 10}px;`;
                focusa.innerHTML = target.dataset.floor;
            }
        });

        buildA.addEventListener('mouseout', (e) => {
            focusa.classList.remove('focus-pocus');
        })

        buildB.addEventListener('mouseover', (e) => {
            if (e.target.classList.contains('area')) {
                let target = e.target;
                floorNum.innerHTML = target.dataset.floor;
            // focus.style.backgroundColor = "blue";
                focusb.classList.add('focus-pocus');
                
                focusb.style = `top: ${target.getBoundingClientRect().top * 0.9}px; left: ${target.getBoundingClientRect().right + 10}px;`;
                focusb.innerHTML = target.dataset.floor;
            }
        });
        buildB.addEventListener('mouseout', (e) => {
            focusa.classList.remove('focus-pocus');
        })
        buildA.addEventListener('click', (e) => {

            if (Number(e.target.dataset.floor)) {
                // console.log(floor);
                floor.slideTo(e.target.dataset.i - 1);
                document.querySelector('.floor-floor').scrollIntoView();
                ajaxFloor('block-A', e.target.dataset.i);

            }
        })
        buildB.addEventListener('click', (e) => {

            if (Number(e.target.dataset.floor)) {
                // console.log(floor);
                floor.slideTo(e.target.dataset.i - 1);
                document.querySelector('.floor-floor').scrollIntoView();
                ajaxFloor('block-B', e.target.dataset.i);
            }
        })

        function ajaxFloor(block, fl) {
            let data = {'slug': block, 'floor': fl};
            changeModule(checkModule(block, fl)); //, floor
            $.ajax({
                url: '/site/layouts',
                type: 'POST',
                data: data,
                success: function(response){
                    // console.log(JSON.parse(response).model);
                    let model = JSON.parse(response).model;
                    let status = JSON.parse(response).status;
                    // let blocks = JSON.parse(response).blocks;
                    // console.log(model[0].floor_num);
                    // console.log(blocks.length);
                    // floor.update();
                    // document.querySelector('#min').innerHTML = JSON.parse(response).min;
                    document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                    fillData(model, status);
                    // console.log(response['blocks']);
                },
                error: function(response) {
                    console.log(response);
                    
                }
            })
        }


        let chbtn = document.querySelector('.choose-buttons');

		chbtn.addEventListener('mouseover', (e) => {

			let button = e.target.closest('.choose-button');

			if (button) {
				button = button.dataset.choose;
				// console.log(choose);
				if (layouts.querySelector('.active')) {
					layouts.querySelector('.active').classList.remove('active');
				}

				layouts.querySelector(`#path-${button}`).classList.add('active');
			}
		})

        let bl = 'a';

        chbtn.addEventListener('click', (e) => {

            let button = e.target.closest('.choose-button');
            // let letters = document.querySelectorAll('.blocks');
            // function ltrs(ltr) {
            //     letters.forEach(el=> {
            //         el.innerHTML = ltr;
            //     });
            // }
            

            // document.querySelector('.floorChoose .swiper-wrapper').innerHTML = cont();
            // floor.update();
            
            if (button) {
                button = button.dataset.choose;
				if (button == 1) {
                    if (window.history.replaceState) {
                        //prevents browser from storing history with each change:
                        window.history.replaceState('blockA', 'Title', '/layouts/block-A');
                    }
                    ltrs('A');
                    fordel();
                    bl = 'a';
                    changeBlock(1, bl);
                    ajaxBlock('block-A');
                    document.querySelector('#floor').dataset.floor = 'block-A';
                }
				if (button == 2) {
                    if (window.history.replaceState) {
                        //prevents browser from storing history with each change:
                        window.history.replaceState('blockB', 'Title', '/layouts/block-B');
                    }
                    ltrs('B');
                    fordel();
                    bl = 'b';
                    changeBlock(2, bl);
                    ajaxBlock('block-B');
                    document.querySelector('#floor').dataset.floor = 'block-B';
                }
				if (button == 3) {
                    // if (window.history.replaceState) {
                    //     //prevents browser from storing history with each change:
                    //     window.history.replaceState('blockC', 'Title', '/layouts/block-C');
                    // }
                    ltrs('C');
                    fordelc();
                }
            }

            

            

            
        })
        function ajaxBlock(block) {
            // let data = ['block' = 'block'].serializeArray();
            let data = {'slug': block};
            // let data = `'slug' = ${block}`;
            changeModule(checkModule(block));
            $.ajax({
                url: '/site/layouts',
                type: 'POST',
                data: data,
                success: function(response){
                    // console.log(JSON.parse(response).model);
                    let model = JSON.parse(response).model;
                    let blocks = JSON.parse(response).blocks;
                    let status = JSON.parse(response).status;
                    // console.log(model[0].floor_num);
                    // console.log(blocks.length);
                    // document.querySelector('#min').innerHTML = JSON.parse(response).min;
                    document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                    document.querySelector('.floorChoose .swiper-wrapper').innerHTML = cont(blocks.length, model[0].floor_num);
                    floor.update();
                    fillData(model, status);
                    changeBlockStatus(model, status, block);
                    // console.log(response['blocks']);
                },
                error: function(response) {
                    console.log(response);
                    
                }
            })
        }
        
	}

    if (document.querySelector('.news')) {
        let news_container = document.querySelector('.news-wrapper');
        let more_games = document.querySelector('.news-next');

        more_games.addEventListener('click', (e) => {
            let add = news_container.childElementCount;
            console.log(add);
            
            sender(add);
        })

        function sender(add = 0) {
            more_games.classList.add('news-next-load');
            setTimeout(()=>{
                $.ajax({
                    url: '/news',
                    type: 'POST',
                    data: {add: add},
                    success: function(response){
                        response = JSON.parse(response);

                        if (!response[0]) {
                            more_games.classList.add('hide');
                        } else {
                            more_games.classList.remove('hide');
                        }
                        addGames(response[1]);
                    },
                    complete: function() {
                        more_games.classList.remove('news-next-load');
                    }
                })
            }, 500);
        };
        
        function addGames(games){
            // console.log(games);
            // let div = document.createElement('div');
            // div.innerHTML = games;
            news_container.innerHTML += games;
        };
    }


	if (document.querySelector('.gallery-main')) {
		var gallery = new Swiper(".gallery-thumb", {
			loop: true,
			spaceBetween: 40,
			slidesPerView: 4,
			watchSlidesProgress: true,
			breakpoints: {
				1200: {
					slidesPerView: 4,
				},
				768: {
					slidesPerView: 3,
				},
				540: {
					slidesPerView: 2,
				},
				240: {
					slidesPerView: 1,
				},
			},
			
		});
		var gallery2 = new Swiper(".gallery-main", {
			loop: true,
			// spaceBetween: 10,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			thumbs: {
				swiper: gallery,
			},
		});

        if (document.querySelector('.youtube')) {

            gallery.on('slideChange', () => {
                console.log('slideChange');
                stopVideo();
            })

            function stopVideo() {
                document.querySelectorAll('iframe').forEach(el => {

                    let iframe = el.contentWindow;
                    iframe.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');

                })

            }
        }
	}

    if (document.querySelector('.contact-cam')) {
        document.querySelector('.contact-cam').addEventListener('click', (e)=>{
			e.preventDefault();
            document.querySelector('.video').classList.add('popup-show');
            document.querySelector('.video .popup').innerHTML = '<iframe src= "https://g2.ipcamlive.com/player/player.php?alias=61c4bc8eb383a&autoplay=1" width="100%" height="100%" frameborder="0" allowfullscreen> </iframe>';
		})
    }
})


function ltrs(ltr) {
    if (document.querySelector('.blocks')) {
        let letters = document.querySelectorAll('.blocks');

        letters.forEach(el=> {
            el.innerHTML = ltr;
        });
    }
}

function checkModule(block, floor = 0) {
    let fls = 0;

    if (block === 'block-A') {
        block = 'a';
        if (!floor) return [block, fls = 11];
        switch (parseInt(floor)) {
            case 1:
                fls = 11;
                break;
            case 24:
                fls = 34;
                break;
            case 25:
                fls = 35;
                break;
            default:
                fls = 12;
                break;
        }
    }
    if (block === 'block-B') {
        block = 'b';
        if (!floor) return [block, fls = 2];
        switch (parseInt(floor)) {
            case 1:
                fls = 2;
                break;
            case 2:
                fls = 3;
                break;
            case 3:
                fls = 4;
                break;
            case 8:
            case 15:
                fls = 9;
                break;
            case 4:
                fls = 5;
                break;
            case 27:
            case 28:
                fls = 29;
                break;
            case 29:
            case 30:
            case 31:
            case 32:
            case 33:
                fls = 30;
                break;
            case 34:
                fls = 36;
                break;
            case 35:
                fls = 37;
                break;
            case 36:
                fls = 38;
                break;
            // case 37:
                // fls = 38;
                // break;
            case 23:
            case 24:
            case 25:
            case 26:
            case 37:
                fls = 39;
                break;
            case 38:
            case 39:
            case 40:
            case 41:
            case 42:
                fls = 40;
                break;
            case 43:
                fls = 44;
                break;
            case 44:
                fls = 45;
                break;
            case 45:
                fls = 46;
                break;
            case 46:
                fls = 47;
                break;
            default:
                fls = 6;
                break;
        }
    }

    return [block, fls];
}

function changeModule(arr) {

    block = arr[0];
    fl = arr[1];

    let checkFloor = document.querySelector('#test');
    if (checkFloor.dataset.block == block && checkFloor.dataset.floor == fl) return;
    // console.log(block,fl);
    
    let svg = document.querySelector('#floor .floor-choose-fig');

    svg.innerHTML = `<object id="test" data-floor="${fl}" data-block="${block}" data="/images/blocks/svg/${block}/${fl}.svg" type="image/svg+xml"></object>`;
    
    document.querySelector('#floor .floor-choose-img').innerHTML = `<picture><img src="/images/blocks/img/${block}/${fl}.jpg" alt=""></picture>`;
    
    setTimeout(showStatus, 2000);
}

function changeBlockStatus(model, status, block) {
    let bl = '';
    switch (block) {
        case 'block-A':
            bl = 'a';
            break;
        case 'block-C':
            bl = 'c';
            break;
        default:
            bl = 'b';
            break;
    }
    
    document.querySelector('.flat-plan-img').innerHTML = `<picture><img src="/images/blocks/${bl}/${model[0].floor_num}/1.jpg" alt=""></picture>`;
    // document.querySelector('.flat-num-inner .btn').href = `/images/blocks/pdf/${bl}/${floor}/${i}.pdf`;
    // document.querySelector('.flat-num-inner .btn').href = `http://calligraphy.de/pdf?block=${bl}&floor=${floor}&flat=${i}`;
    document.querySelector('.flat-num-inner .btn').href = `/pdf?block=${bl}&floor=${model[0].floor_num}&flat=${model[0].num}&img=1&view=${model[0].en}`;
    document.querySelector('.num').innerHTML = model[0].num;
    document.querySelector('.total').innerHTML = model[0].total_area;
    document.querySelector('.balcony').innerHTML = model[0].balcony_area;
    document.querySelector('.living').innerHTML = model[0].living_space;
    document.querySelector('.view').innerHTML = model[0][currLang];

    document.querySelector('.flat-num-img').innerHTML = `<picture><img src="/images/blocks/${bl}/d/${model[0].img}.jpg" alt=""></picture>`;
    document.querySelector('.status').innerHTML = status[0];
}

function showStatus() {
    let test = document.querySelector('#test').contentDocument;
    let bl = document.querySelector('#test').dataset.block;
    let floor = 1;
    // console.log(test);
    test.addEventListener('click', (e) => {
        let et = e.target.closest('.area');
        if(et){
            let floor = et.dataset.floor;
            let i = et.dataset.i;
            // http://calligraphy1.mamaevjg.beget.tech/pdf?block=a&floor=11&flat=1
            // document.querySelector('#flat-num').innerHTML = flat;http://calligraphy.de/pdf?block=a&floor=11&flat=1
            document.querySelector('.flat-plan-img').innerHTML = `<picture><img src="/images/blocks/${bl}/${floor}/${i}.jpg" alt=""></picture>`;
            document.querySelector('.flat-num-img').innerHTML = `<picture><img src="/images/blocks/${bl}/d/${et.dataset.img}.jpg" alt=""></picture>`;

            // document.querySelector('.flat-num-inner .btn').href = `/images/blocks/pdf/${bl}/${floor}/${i}.pdf`;
            // document.querySelector('.flat-num-inner .btn').href = `http://calligraphy.de/pdf?block=${bl}&floor=${floor}&flat=${i}`;
            document.querySelector('.flat-num-inner .btn').href = `/pdf?block=${bl}&floor=${floor}&flat=${et.dataset.flat}&img=${i}&view=${et.dataset.views}`;
            document.querySelector('.num').innerHTML = et.dataset.flat;
            document.querySelector('.total').innerHTML = et.dataset.total;
            document.querySelector('.balcony').innerHTML = et.dataset.balcony;
            document.querySelector('.living').innerHTML = et.dataset.living;
            document.querySelector('.view').innerHTML = et.dataset.view;
            document.querySelector('.status').innerHTML = et.dataset.status;
            document.querySelector('#flat').scrollIntoView();
        }
    })
    // let floorDoc = document.querySelector(`#floor${num}`).contentDocument;
    // let test = document.querySelector('#test').contentDocument;
    let focus = document.querySelector('#floor .focus');
    let flat = document.querySelector('#floor .focus-flat');
    let status = document.querySelector('#floor .focus-status');
    focuss(test, focus, flat, status);
}

function focuss(test, focus, flat, status) {
    
    test.addEventListener('mousemove', (e) => {
        // console.log(document.querySelector('#floor').contentDocument);
        
        
        // let X = e.offsetX;
        // let Y = e.offsetY;
        focus.classList.add('focus-pocus');
        // focus.style.top = e.offsetY;
        // focus.style.left = e.offsetX;
        focus.style = `top: ${e.offsetY - 60}px; left: ${e.offsetX + 10}px;`;
        // focus.style.left = '0';
    })
    test.addEventListener('mouseout', (e) => {
        focus.classList.remove('focus-pocus');
    })
    test.addEventListener('mouseover', (e) => {
        if (e.target.classList.contains('area')) {
            flat.innerHTML = e.target.getAttribute('data-flat');
            status.innerHTML = e.target.getAttribute('data-status');
        // focus.style.backgroundColor = "blue";
        } else {
            flat.innerHTML = '';
            status.innerHTML = '';
        // focus.style.backgroundColor = "blue";
        }
    });
    
}

function fillData(model, status) {
    let floor = document.querySelector('#test').contentDocument.querySelectorAll('.area');
    
    for (let i = 0; i < floor.length; i++) {
        // const element = array[i];
        floor[i].dataset.flat = model[i].num;
        // if (model[i].status == '0') {
        //     floor[i].dataset.status = 'available';
        // }
        // if (model[i].status == '1') {
        //     floor[i].dataset.status = 'reserved';
        // }
        // if (model[i].status == '2') {
        //     floor[i].dataset.status = 'solded';
        // }
        floor[i].dataset.status = status[i];
        floor[i].dataset.floor = model[i].floor_num;
        floor[i].dataset.living = model[i].money;
        floor[i].dataset.total = model[i].total_area;
        floor[i].dataset.living = model[i].living_space;
        floor[i].dataset.balcony = model[i].balcony_area;
        floor[i].dataset.view = model[i][currLang];
        floor[i].dataset.views = model[i].en;
        floor[i].dataset.img = model[i].img;
    }
    // model.forEach(model => {
    //     // console.log(model.balcony_area);
        
    // });
}

function changeBlock(block, imgNum) {
    // console.log(block);
    
    document.querySelector("#blocks").scrollIntoView();
    let bl = document.querySelector(`#blocks [data-block="${block}"]`);
    document.querySelector('.block-svg-active').classList.remove('block-svg-active');
    bl.classList.add('block-svg-active');
    document.querySelector("#blocks .block-img").innerHTML = `<picture><img src="/images/src/layouts/block/block-${imgNum}-x1.png" alt=""></picture>`;
}

function cont(lg, num) {
    lg += Number(num);
    
    let ct = '';
    for (let i = num; i < lg; i++) {
        ct += `<div class="swiper-slide">${i}</div>`;
        
    }
    return ct;
}


function fordelc() {
    document.querySelector('#floor').style.display = 'none';
    document.querySelector('#flat').style.display = 'none';
    document.querySelector('#blocks').style.display = 'none';
    document.querySelector('#for-del').style.display = 'block';
}
function fordel() {
    document.querySelector('#floor').style.display = 'block';
    document.querySelector('#flat').style.display = 'block';
    document.querySelector('#blocks').style.display = 'block';
    document.querySelector('#for-del').style.display = 'none';
}
function fdelc() {
    document.querySelector('#floor').style.display = 'none';
    document.querySelector('#flat').style.display = 'none';
    document.querySelector('#for-del').style.display = 'block';
}
function fdel() {
    document.querySelector('#floor').style.display = 'block';
    document.querySelector('#flat').style.display = 'block';
    document.querySelector('#for-del').style.display = 'none';
}

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    let mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 18,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(41.63658205509769, 41.621193980941854),

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{"featureType":"all","elementType":"geometry","stylers":[{"color":"#202c3e"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"gamma":0.01},{"lightness":20},{"weight":"1.39"},{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"weight":"0.96"},{"saturation":"9"},{"visibility":"on"},{"color":"#000000"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":30},{"saturation":"9"},{"color":"#29446b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"lightness":20},{"saturation":-20}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":10},{"saturation":-30}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#193a55"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":25},{"lightness":25},{"weight":"0.01"}]},{"featureType":"water","elementType":"all","stylers":[{"lightness":-20}]}]
    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    let mapElement = document.querySelector('#map');

    // Create the Google Map using our element and options defined above
    let map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it 
    let marker = new google.maps.Marker({
        position: new google.maps.LatLng(41.63658205509769, 41.621193980941854),
        map: map,
        title: 'Snazzy!',
        loading: 'lazy'
    });
}
