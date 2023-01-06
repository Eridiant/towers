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
// 

    // src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCabbDzORGtAU9PwXxSc4YG0fSM7YyVEPw&region=EN&language=en";

    // src="https://www.googletagmanager.com/gtag/js?id=AW-307879312";

    // window.dataLayer = window.dataLayer || [];
        
    // gtag('js', new Date());
    // gtag('config', 'AW-307879312');

    // gtag('event', 'conversion', {'send_to': 'AW-307879312/8pVBCO7ohZMDEJC755IB'});

    if (document.body.classList.contains('index') || !document.cookie.split(';').filter((item) => item.includes('_prm=1')).length) {
        document.cookie = "_prm=1; max-age=3600";
        if (document.querySelector('.stock')) {
            setTimeout(() => {
                document.querySelector('.stock:not(.dnn)').classList.add('popup-show');
            }, 15000);
        }
    }

    if (document.querySelector('#map')) {
        let map = document.querySelector('#map');

        let listenerMap = function lm() {
            function loadScript() {
                return new Promise(function(resolve, reject) {
                    var script = document.createElement("script");
                    script.onload = resolve;
                    script.onerror = reject;
                    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAatwjPC0N1Ku1zqWAFebbu66TnvDEbk6w&region=EN&language=en';
                    script.type = 'text/javascript';
                    document.body.parentNode.appendChild(script);
                });
            }
            
            loadScript().then(function() {
                // map.innerHTML = '';
                map.removeEventListener('click', listenerMap, false);
                init();
                map.classList.add('map-active');

            });
        }
        
        map.addEventListener('click', listenerMap, false);
        // map.addEventListener('keydown', liMa, false);
    }


    document.addEventListener('click', (e) => {
        let target = e.target;
        if (target.closest('.btn[data-trg]')) {
            document.querySelector(`${target.closest('.btn').dataset.trg}`).scrollIntoView();
        }
    })

    $("#form-call-back").submit(function(e) {
        e.preventDefault();
        // gtag_report_conversion();
        let data = $(this).serializeArray();

        // try {gtag_report_conversion();} catch(err) {console.log(err);};
        
        $.ajax({
            url: '/site/ajax',
            type: 'POST',
            data: data,
            success: function(response){

                if (response.data.success == true) {
                    document.querySelector('.success').classList.add('popup-show');
                    document.querySelectorAll('input').forEach(el => {
                        el.value = '';
                    })
                } else {
                    document.querySelector('.error').classList.add('popup-show');
                }
            },
            error: function(response) {
                document.querySelector('.error').classList.add('popup-show');
            }
        })
    });


    $("#form").submit(function(e) {
        e.preventDefault();
        // gtag_report_conversion();
        let data = $(this).serializeArray();

        // try {gtag_report_conversion();} catch(err) {console.log(err);};
        
        $.ajax({
            url: '/site/ajax',
            type: 'POST',
            data: data,
            success: function(response){

                if (response.data.success == true) {
                    document.querySelector('.success').classList.add('popup-show');
                    document.querySelectorAll('input').forEach(el => {
                        el.value = '';
                    })
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
        // gtag_report_conversion();
        let data = $(this).serializeArray();

        try {gtag_report_conversion();} catch(err) {console.log(err);};
        
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

    $("#form-stock").submit(function(e) {
        e.preventDefault();
        // gtag_report_conversion();
        let data = $(this).serializeArray();

        try {gtag_report_conversion();} catch(err) {console.log(err);};
        
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

    // document.querySelector("#privacy-policy").addEventListener('click', (e) => {
    //     e.preventDefault();
    //     console.log("#privacy-policy");
        
    //     document.querySelector('.privacy-policy').classList.add('popup-show');
    // });

    if (document.querySelector('.project-swiper')) {
        var project =  new Swiper(".project-swiper", {
            slidesPerView: 1,
            navigation: {
                nextEl: ".choose-next",
                prevEl: ".choose-prev",
            },
        });
    }

    if (document.querySelector('.renovation')) {
        var renovation = new Swiper(".renovation-swiper", {
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

        if (window.location.href.match(/block-\w/)) {
            switch (window.location.href.match(/block-\w/)[0]) {
                case 'block-A':
                    choose.slideTo(0);
                    break;
                case 'block-B':
                    choose.slideTo(1);
                    break;
                case 'block-G':
                    choose.slideTo(2);
                    break;
                default:
                    break;
            }
        }
    }

    if (document.querySelector('#layouts')) {
        // console.log(state["1101"].floor_num);
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
				600: {
					direction: "vertical",
				},
				240: {
					direction: 'horizontal',
				},
			},
		});

        floor.slideTo(document.querySelector('.floorChoose').dataset.indx);
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
                    document.querySelector('.flat-switch').classList.add('none');

                }
                if (choose.activeIndex == 1) {
                    ajaxBlock('block-B');
                    ltrs('B');
                    document.querySelector('#floor').dataset.floor = 'block-B';
                    if (window.history.replaceState) {
                        window.history.replaceState('blockB', 'Title', '/layouts/block-B');
                    }
                    fdel();
                    document.querySelector('.flat-switch').classList.remove('none');
                }
                if (choose.activeIndex == 2) {
                    ajaxBlock('block-G');
                    ltrs('G');
                    document.querySelector('#floor').dataset.floor = 'block-G';
                    if (window.history.replaceState) {
                        window.history.replaceState('blockG', 'Title', '/layouts/block-G');
                    }
                    fdel();
                    document.querySelector('.flat-switch').classList.remove('none');
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
                    let data = {'slug': document.querySelector('#floor').dataset.floor, 'floor': num, 'lgg': lgg};
                    changeModule(checkModule(document.querySelector('#floor').dataset.floor, num));
                    xhRequest(data, '/site/layouts')
                        .then(response => {
                            let model = JSON.parse(response).model;
                            let status = JSON.parse(response).status;
                            document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                            fillData(model, status);
                        })
                        .catch(error => console.error('error'));
                    // ajaxFloor(document.querySelector('#floor').dataset.floor, num)
					// document.querySelector('.floor-show').classList.remove('floor-show');

					// document.querySelector(`.floor-choose-inner[data-floor="${num + 1}"`).classList.add('floor-show');
				}
			}

			clearTimeout(timeoutId);

			timeoutId = setTimeout(fnCall, wait);

		}
        
        let buildB = document.querySelector('#buildB').contentDocument;
        let buildA = document.querySelector('#buildA').contentDocument;
        let buildG = document.querySelector('#buildG').contentDocument;
        let floorNum = document.querySelector('#fl');
        let focusa = document.querySelector('#blocks .block-svg-a .focus');
        let focusb = document.querySelector('#blocks .block-svg-b .focus');
        let focusg = document.querySelector('#blocks .block-svg-g .focus');

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

        buildG.addEventListener('mouseover', (e) => {
            if (e.target.classList.contains('area')) {
                let target = e.target;
                
                floorNum.innerHTML = target.dataset.floor;
                // focus.style.backgroundColor = "blue";
                focusg.classList.add('focus-pocus');
                
                focusg.style = `top: ${target.getBoundingClientRect().top * 0.9}px; left: ${target.getBoundingClientRect().right + 10}px;`;
                focusg.innerHTML = target.dataset.floor;
            }
        });

        buildG.addEventListener('mouseout', (e) => {
            focusg.classList.remove('focus-pocus');
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
                // ajaxFloor('block-A', e.target.dataset.i);
                let data = {'slug': 'block-A', 'floor': e.target.dataset.i, 'lgg': lgg};
                changeModule(checkModule('block-A', e.target.dataset.i));
                xhRequest(data, '/site/layouts')
                    .then(response => {
                        let model = JSON.parse(response).model;
                        let status = JSON.parse(response).status;
                        // console.log(model, status);
                        document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                        fillData(model, status);
                    })
                    .catch(error => {
                        console.log(error);
                        console.error('error');
                    });

            }
        })
        buildB.addEventListener('click', (e) => {

            if (Number(e.target.dataset.floor)) {
                // console.log(floor);
                floor.slideTo(e.target.dataset.i - 1);
                document.querySelector('.floor-floor').scrollIntoView();
                // ajaxFloor('block-B', e.target.dataset.i);
                let data = {'slug': 'block-B', 'floor': e.target.dataset.i, 'lgg': lgg};
                changeModule(checkModule('block-B', e.target.dataset.i));
                xhRequest(data, '/site/layouts')
                    .then(response => {
                        let model = JSON.parse(response).model;
                        let status = JSON.parse(response).status;
                        // console.log(model, status);
                        document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                        document.querySelector('.renovation-wrapper.furniture .about-text').innerHTML = JSON.parse(response).rd;
                        fillData(model, status);
                    })
                    .catch(error => {
                        console.log(error);
                        console.error('error');
                    });
            }
        })
        buildG.addEventListener('click', (e) => {

            if (Number(e.target.dataset.floor)) {
                // console.log(floor);
                floor.slideTo(e.target.dataset.i - 1);
                document.querySelector('.floor-floor').scrollIntoView();
                // ajaxFloor('block-G', e.target.dataset.i);
                let data = {'slug': 'block-G', 'floor': e.target.dataset.i, 'lgg': lgg};
                changeModule(checkModule('block-G', e.target.dataset.i));
                xhRequest(data, '/site/layouts')
                    .then(response => {
                        let model = JSON.parse(response).model;
                        let status = JSON.parse(response).status;
                        // console.log(model, status);
                        document.querySelector('#floor-free').innerHTML = JSON.parse(response).flats_free + '/' + JSON.parse(response).flats;
                        document.querySelector('.renovation-wrapper.furniture .about-text').innerHTML = JSON.parse(response).rd;
                        fillData(model, status);
                    })
                    .catch(error => {
                        console.log(error);
                        console.error('error');
                    });
            }
        })

        function ajaxFloor(block, fl) {
            let data = {'slug': block, 'floor': fl, 'lgg': lgg};

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


        let mchbtn = document.querySelector('.layouts');

		mchbtn.addEventListener('mouseover', (e) => {

			let button = e.target.closest('.cb');

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

        mchbtn.addEventListener('click', (e) => {

            let button = e.target.closest('.cb');
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
                let block = '';
                let lng = currLang !== 'ge' ? `/${currLang}` : '';

				if (button == 1) {
                    if (window.history.replaceState) {
                        //prevents browser from storing history with each change:
                        window.history.replaceState('blockA', 'Title', `${lng}/layouts/block-A`);
                    }
                    ltrs('A');
                    fordel();
                    bl = 'a';
                    changeBlock(1, bl);
                    block = 'block-A';
                    ajaxBlock('block-A');
                    document.querySelector('#floor').dataset.floor = 'block-A';
                    document.querySelector('.flat-switch').classList.add('none');
                }
				if (button == 2) {
                    if (window.history.replaceState) {
                        //prevents browser from storing history with each change:
                        window.history.replaceState('blockB', 'Title', `${lng}/layouts/block-B`);
                    }
                    ltrs('B');
                    fordel();
                    bl = 'b';
                    changeBlock(2, bl);
                    block = 'block-B';
                    ajaxBlock('block-B');
                    document.querySelector('#floor').dataset.floor = 'block-B';
                    document.querySelector('.flat-switch').classList.remove('none');
                }
				if (button == 3) {
                    if (window.history.replaceState) {
                        //prevents browser from storing history with each change:
                        window.history.replaceState('blockG', 'Title', `${lng}/layouts/block-G`);
                    }
                    ltrs('G');
                    fordel();
                    bl = 'g';
                    changeBlock(3, bl);
                    block = 'block-G';
                    ajaxBlock('block-G');
                    document.querySelector('#floor').dataset.floor = 'block-G';
                    document.querySelector('.flat-switch').classList.remove('none');
                }
                changeRenovation(block);
            }
        })

        function changeRenovation(block) {
            // let hd = document.querySelector('.renovation-wrapper:not(.hidden)');
            // hd?.classList?.add('hidden');
            // let vz = document.querySelectorAll('.renovation-wrapper.hidden');
            // vz[1].classList.remove('hidden');
            document.querySelector('.flat-switch').classList.remove('repair');

            let data = {'slug': block};
            xhRequest(data, '/site/lts')
                .then(response => {
                    document.querySelector('#renovation').innerHTML = response;
                    var renovation = new Swiper(".renovation-swiper", {
                        slidesPerView: 1,
                        navigation: {
                            nextEl: ".choose-next",
                            prevEl: ".choose-prev",
                        },
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        }

        function ajaxBlock(block) {
            // let data = ['block' = 'block'].serializeArray();
            let data = {'slug': block};
            // let data = `'slug' = ${block}`;
            // let lng = currLang !== 'ge' ? `/${currLang}` : '';
            changeModule(checkModule(block));
            $.ajax({
                url: `/site/layouts`,
                // url: `${lng}/site/layouts`,
                // url: `/${currLang}/site/layouts`,
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
                    // document.querySelector('.renovation-wrapper.furniture .about-text').innerHTML = JSON.parse(response).rd;
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

    if (document.querySelector('#header-bg-svg')) {
        let headerBgSvg = document.querySelector('#header-bg-svg').contentDocument;
        headerBgSvg.addEventListener('click', (e) => {
            if (e.target.closest('.area')) {
                let area = e.target.closest('.area');
                let crnt = currLang == 'ge' ? '' : `${currLang}/`;
                document.location.href = `${base_url}/${crnt}layouts/block-${area.dataset.block}/floor-${area.dataset.floor}`;
            }
        })
    }

    if (document.querySelector('.news')) {
        let news_container = document.querySelector('.news-wrapper');
        let more_games = document.querySelector('.news-next');

        more_games.addEventListener('click', (e) => {
            let add = news_container.childElementCount;

            sender(add);
        })

        function sender(add = 0) {
            more_games.classList.add('news-next-load');

            let cl = currLang === 'ge' ? '' : `/${currLang}`;

            setTimeout(()=>{
                $.ajax({
                    url: `${cl}/news`,
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
                // console.log('slideChange');
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
            document.querySelector('.video .popup').innerHTML = '<iframe src= "https://rtsp.me/embed/iGYn4s2R/" width="100%" height="100%" frameborder="0" allowfullscreen> </iframe>';
            // document.querySelector('.video .popup').innerHTML = '<iframe src= "https://g2.ipcamlive.com/player/player.php?alias=627cc094ae3bb" width="100%" height="100%" frameborder="0" allowfullscreen> </iframe>';
		})
    }
})


function xhRequest(data, url) {
    return new Promise((succeed, fail) => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onload = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                // rend(JSON.parse(xhr.responseText));
                succeed(xhr.responseText);
            } else if (xhr.status == 400) {
                fail(new Error(`Request failed: ${xhr.status}`));
            } else {
                fail(new Error('Ошибка, что-то пошло не так.'));

            }
        }
        xhr.onerror = function() {console.log(onerror)};
        // console.log(data, url);
        // console.log(JSON.stringify(data));
        xhr.send(JSON.stringify(data));
    });
}


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
            case 22:
            case 23:
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
                fls = 30;
                break;
            case 30:
            case 31:
            case 32:
            case 33:
                fls = 32;
                // fls = 36;
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
    if (block === 'block-G') {
        block = 'g';

        if (!floor) return [block, fls = 11];
        switch (parseInt(floor)) {
            case 44:
                fls = 44;
                break;
            case 45:
                fls = 45;
                break;
            default:
                fls = 11;
                break;
        }
    }

    return [block, fls];
}

function changeModule(arr) {

    block = arr[0];
    let mem = fl == arr[1] ? 0 : 1;
    fl = arr[1];

    let checkFloor = document.querySelector('#test');
    if (checkFloor.dataset.block == block && checkFloor.dataset.floor == fl) return;
    // console.log(block,fl);
    
    let svg = document.querySelector('#floor .floor-choose-fig');

    svg.innerHTML = `<object id="test" data-floor="${fl}" data-block="${block}" data="/images/blocks/svg/${block}/${fl}.svg" type="image/svg+xml"></object>`;

    if (mem) {
        document.querySelector('#test').addEventListener('load', () => {
            showStatus;
        })
    } else {
        showStatus;
    }

    document.querySelector('#floor .floor-choose-img').innerHTML = `<picture><img src="/images/blocks/img/${block}/${fl}.jpg" alt=""></picture>`;

    setTimeout(showStatus, 1000);
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
    let num_mb = document.querySelector('#test').contentDocument.querySelectorAll('.num');
    var nms = 0;

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
        if (model[i].num < 10) {
            nms = '&#160;&#160;&#160;' + model[i].num;
        } else if (model[i].num < 100) {
            nms = '&#160;&#160;' + model[i].num;
        } else if (model[i].num < 1000) {
            nms = '&#160;' + model[i].num;
        } else {
            nms = model[i].num;
        }
        num_mb[i].innerHTML = nms;
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
    document.querySelector("#blocks .block-img").innerHTML = `<picture><img src="/images/dist/layouts/block-${imgNum}-x1.png" alt=""></picture>`;
}

function cont(lg, num) {
    lg += Number(num);
    
    let ct = '';
    for (let i = num; i < lg; i++) {
        ct += `<div class="swiper-slide">${i}</div>`;
        
    }
    return ct;
}

function fordel() {
    document.querySelector('#floor').style.display = 'block';
    document.querySelector('#flat').style.display = 'block';
    document.querySelector('#blocks').style.display = 'block';
    document.querySelector('#renovation').style.display = 'block';
}
function fdelc() {
    document.querySelector('#floor').style.display = 'none';
    document.querySelector('#flat').style.display = 'none';
    document.querySelector('#renovation').style.display = 'none';
}
function fdel() {
    document.querySelector('#floor').style.display = 'block';
    document.querySelector('#flat').style.display = 'block';
    document.querySelector('#renovation').style.display = 'block';
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



// function gtag_report_conversion(url) {
//     var callback = function () {
//         if (typeof(url) != 'undefined') {
//             window.location = url;
//         }
//     };
    
//     gtag('event', 'conversion', {
//         'send_to': 'AW-307879312/6s-kCOa1__ICEJC755IB',
//         'event_callback': callback
//     });
//     return false;
// }
// function gtag(){dataLayer.push(arguments);}