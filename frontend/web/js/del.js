window.addEventListener('load', () => {

    setTimeout(() => {
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/61a67a909099530957f761a7/1flp4thvt';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        
    }, 10000);

    // alert(JSON.parse(dato));
    // alert(dato);
    // let arr = JSON.parse(dato);
    // arr.forEach(el => {
    //     console.log(el);
        
    // });
    // balcony_area: "4.1"
    // en: null
    // floor_num: "11"
    // ge: null
    // he: null
    // id: "1"
    // living_space: "24.5"
    // money: "40040.0000"
    // num: "1101"
    // ru: "sea view"
    // status: "0"
    // total_area: "28.6"
    // document.querySelector('#form').addEventListener('submit', (e) => {
    $("#form").submit(function(e) {
        e.preventDefault();

        let data = $(this).serializeArray();
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
    }

    if (document.querySelector('#layouts')) {
        let layouts = document.querySelector('#block').contentDocument;
        fillData(summ);
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
                    document.querySelector('#floor').dataset.floor = 'block-A';
                    if (window.history.replaceState) {
                        window.history.replaceState('blockA', 'Title', '/layouts/block-A');
                    }
                    fdel();

                }
                if (choose.activeIndex == 1) {
                    ajaxBlock('block-B');
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
        

        // start
        // let tooltipElem;
        // document.onmouseover = function(event) {
        //     let target = event.target;

        //     // если у нас есть подсказка...
        //     let tooltipHtml = target.dataset.floor;
        //     if (!tooltipHtml) return;

        //     // ...создадим элемент для подсказки

        //     tooltipElem = document.createElement('div');
        //     tooltipElem.className = 'tooltip';
        //     tooltipElem.innerHTML = tooltipHtml;
        //     document.body.append(tooltipElem);

        //     // спозиционируем его сверху от аннотируемого элемента (top-center)
        //     let coords = target.getBoundingClientRect();

        //     let left = coords.left + (target.offsetWidth - tooltipElem.offsetWidth) / 2;
        //     if (left < 0) left = 0; // не заезжать за левый край окна

        //     let top = coords.top - tooltipElem.offsetHeight - 5;
        //     if (top < 0) { // если подсказка не помещается сверху, то отображать её снизу
        //         top = coords.top + target.offsetHeight + 5;
        //     }

        //     tooltipElem.style.left = left + 'px';
        //     tooltipElem.style.top = top + 'px';
        // };

        // document.onmouseout = function(e) {

        // if (tooltipElem) {
        //     tooltipElem.remove();
        //     tooltipElem = null;
        // }

        // };
        // sdfsdf
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
                    // let blocks = JSON.parse(response).blocks;
                    // console.log(model[0].floor_num);
                    // console.log(blocks.length);
                    // floor.update();
                    // document.querySelector('#min').innerHTML = JSON.parse(response).min;
                    document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                    fillData(model);
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
            let letters = document.querySelectorAll('.blocks');
            function ltrs(ltr) {
                letters.forEach(el=> {
                    el.innerHTML = ltr;
                });
            }
            

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
                    // console.log(model[0].floor_num);
                    // console.log(blocks.length);
                    // document.querySelector('#min').innerHTML = JSON.parse(response).min;
                    document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                    document.querySelector('.floorChoose .swiper-wrapper').innerHTML = cont(blocks.length, model[0].floor_num);
                    floor.update();
                    fillData(model);
                    // console.log(response['blocks']);
                },
                error: function(response) {
                    console.log(response);
                    
                }
            })
        }
        
	}
})

function checkModule(block, floor = 0) {
    let fls = 0;
    console.log(floor);
    
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
            case 4:
            case 8:
            case 9:
            case 16:
                fls = 5;
                break;
            case 29:
                fls = 30;
                break;
            case 30:
            case 31:
            case 32:
            case 33:
            case 34:
                fls = 31;
                break;
            case 35:
                fls = 36;
                break;
            case 36:
                fls = 37;
                break;
            case 36:
                fls = 37;
                break;
            case 37:
                fls = 38;
                break;
            case 38:
                fls = 39;
                break;
            case 39:
            case 40:
            case 41:
            case 42:
            case 43:
                fls = 40;
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
    console.log(block,fl);
    
    document.querySelector('#floor .floor-choose-img').innerHTML = `<picture><img src="/images/blocks/img/${block}/${fl}.jpg" alt=""></picture>`;
    let svg = document.querySelector('#floor .floor-choose-fig');
    svg.innerHTML = `<object id="test" data-floor="${fl}" data-block="${block}" data="/images/blocks/svg/${block}/${fl}.svg" type="image/svg+xml"></object>`;
    setTimeout(showStatus, 2000);
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
            // document.querySelector('.flat-num-inner .btn').href = `/images/blocks/pdf/${bl}/${floor}/${i}.pdf`;
            // document.querySelector('.flat-num-inner .btn').href = `http://calligraphy.de/pdf?block=${bl}&floor=${floor}&flat=${i}`;
            document.querySelector('.flat-num-inner .btn').href = `http://calligraphy1.mamaevjg.beget.tech/pdf?block=${bl}&floor=${floor}&flat=${i}`;
            document.querySelector('.num').innerHTML = et.dataset.flat;
            document.querySelector('.total').innerHTML = et.dataset.total;
            document.querySelector('.balcony').innerHTML = et.dataset.balcony;
            document.querySelector('.living').innerHTML = et.dataset.living;
            document.querySelector('.view').innerHTML = et.dataset.view;
            document.querySelector('.status').innerHTML = et.dataset.status;
            document.querySelector('#flat').scrollIntoView()

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

function fillData(model) {
    let floor = document.querySelector('#test').contentDocument.querySelectorAll('.area');
    
    for (let i = 0; i < floor.length; i++) {
        // const element = array[i];
        floor[i].dataset.flat = model[i].num;
        if (model[i].status == '0') {
            floor[i].dataset.status = 'available';
        }
        if (model[i].status == '1') {
            floor[i].dataset.status = 'reserved';
        }
        if (model[i].status == '2') {
            floor[i].dataset.status = 'solded';
        }
        floor[i].dataset.floor = model[i].floor_num;
        floor[i].dataset.living = model[i].money;
        floor[i].dataset.total = model[i].total_area;
        floor[i].dataset.living = model[i].living_space;
        floor[i].dataset.balcony = model[i].balcony_area;
        floor[i].dataset.view = model[i][currLang];
        
    }
    model.forEach(model => {
        // console.log(model.balcony_area);
        
    });
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