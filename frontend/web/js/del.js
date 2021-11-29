window.addEventListener('load', () => {
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

    

    if (document.querySelector('#layouts')) {
        let layouts = document.querySelector('#block').contentDocument;
        
		var floor = new Swiper(".floorChoose", {
			direction: "vertical",
			slidesPerView: 5,
			centeredSlides: true,
			grabCursor: true,
			breakpoints: {
				1700: {
					slidesPerView: 5,
				},
				1000: {
					slidesPerView: 5,
				},
				600: {
					slidesPerView: 3,
				},
			},
		});

		floor.on('slideChange', fn);

		function fn() {
			let timeoutId = null;
			let wait = 1000;
			let floor_num = document.querySelector('.floor-show').dataset.floor;
			var num;

			let fnCall = () => {
				
				if (floor_num != (floor.activeIndex + 1) ) {
					num = floor.activeIndex;

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

        buildA.addEventListener('mouseover', (e) => {
            if (e.target.classList.contains('area')) {
                
                floorNum.innerHTML = e.target.dataset.floor;
            // focus.style.backgroundColor = "blue";
            }
        });
        buildB.addEventListener('mouseover', (e) => {
            if (e.target.classList.contains('area')) {
                
                floorNum.innerHTML = e.target.dataset.floor;
            // focus.style.backgroundColor = "blue";
            }
        });
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
            changeModule(block); //, floor
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
                    document.querySelector('.floorChoose .swiper-wrapper').innerHTML = cont(blocks.length, model[0].floor_num);
                    // floor.update();
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
                        ltrs('A');
                        fordel();
                        bl = 'a';
                        changeBlock(1, bl);
                        ajaxBlock('block-A');
                    }
                }
				if (button == 2) {
                    if (window.history.replaceState) {
                        //prevents browser from storing history with each change:
                        window.history.replaceState('blockB', 'Title', '/layouts/block-B');
                        ltrs('B');
                        fordel();
                        bl = 'b';
                        changeBlock(2, bl);
                        ajaxBlock('block-B');
                    }
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

            

            function ajaxBlock(block) {
                // let data = ['block' = 'block'].serializeArray();
                let data = {'slug': block};
                // let data = `'slug' = ${block}`;
                changeModule(block);
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

            
        })

        
	}
})

function changeModule(block, floor = 0) {
    let fl = 0;
    if (!floor) {
        if (block === 'block-A') {
            block = 'a';
            fl = 11;
        }
        if (block === 'block-B') {
            block = 'b';
            fl = 2;
        }
    }
    document.querySelector('#floor .floor-choose-img').innerHTML = `<picture><img src="/images/blocks/img/${block}/${fl}.jpg" alt=""></picture>`;
    let svg = document.querySelector('#floor .floor-choose-fig');
    svg.innerHTML = `<object id="test" data-block="${block}" data="/images/blocks/svg/${block}/${fl}.svg" type="image/svg+xml"></object>`;
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
            // document.querySelector('#flat-num').innerHTML = flat;
            document.querySelector('.flat-plan-img').innerHTML = `<picture><img src="/images/blocks/${bl}/${floor}/${i}.jpg" alt=""></picture>`;
            document.querySelector('.num').innerHTML = et.dataset.flat;
            document.querySelector('.total').innerHTML = et.dataset.total;
            document.querySelector('.balcony').innerHTML = et.dataset.balcony;
            document.querySelector('.price').innerHTML = et.dataset.price;
            document.querySelector('.view').innerHTML = et.dataset.view;
            document.querySelector('.status').innerHTML = et.dataset.status;

            setTimeout(document.querySelector('#flat').scrollIntoView(), 500);
        }
    })
    // let floorDoc = document.querySelector(`#floor${num}`).contentDocument;
    let focus = document.querySelector('.focus');
    let flat = document.querySelector('.focus-flat');
    let status = document.querySelector('.focus-status');
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
        document.querySelector('.focus').classList.remove('focus-pocus');
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
        floor[i].dataset.price = model[i].money;
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
    console.log(block);
    
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