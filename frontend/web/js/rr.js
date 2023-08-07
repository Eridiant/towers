document.addEventListener("DOMContentLoaded",(function(){

    if (document.querySelector('.cont-messager')) {
		document.querySelector('.cont-messager').addEventListener('click', (e)=>{
			e.preventDefault();
			document.querySelector('.form-popup').classList.add('popup-show');
		})
	}

    if (document.querySelector('.renovation')) {
        var renovations = new Swiper(".renovation-swiper", {
            slidesPerView: 1,
            navigation: {
                nextEl: ".choose-next",
                prevEl: ".choose-prev",
            },
        });
    }

	if (document.querySelector('.popup-wrapper')) {
		document.body.addEventListener('click', (e) => {
			if (e.target.classList.contains('popup-wrapper')) {
				document.querySelectorAll('.popup-wrapper').forEach((e) => {
					e.classList.remove('popup-show');
                    if (e.classList.contains('video')) {
                        document.querySelector('.video .popup').innerHTML = '';
                    }
				})
			}
		})
	}
    
    const form = document.querySelector('#form-popup');
    form?.addEventListener('submit', handleFormSubmit);


    if (document.querySelector('.header-video')) {
        document.querySelector('.header-video').addEventListener('click', (e)=>{
			e.preventDefault();
            document.querySelector('.video').classList.add('popup-show');
            document.querySelector('.video .popup').innerHTML = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/165X0EPNK6c?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		})
    }

    let swtch = document.querySelector('.flat-switch');

    swtch?.addEventListener('click', (e) => {
        if (checkSw(e)) {
            swtch.classList.toggle('repair');
        }
    })

    let renovation = document.querySelectorAll('.renovation-wrapper');
    function checkSw(e) {
        if (e.target.closest('.flat-switch-switch')) {
            switchRenovation();
            return true;
        }
        if (e.target.closest('.repair')) {
            if (e.target.closest('.flat-switch-furniture')) {
                switchRenovation();
                return true;
            }
        } else if (e.target.closest('.flat-switch-repair')) {
            switchRenovation();
            return true;
        }
        return false;
    }

    function switchRenovation() {
        let hd = document.querySelector('.renovation-wrapper:not(.hidden)');
        let vz = document.querySelector('.renovation-wrapper.hidden');
        hd.classList.add('hidden');
        vz.classList.remove('hidden');
        document.querySelector('.renovation').scrollIntoView();
    }

    document.querySelector('#flat-call').addEventListener('click', (e) => {
        e.preventDefault();
        showStatus();
    })

    if (document.querySelector('.gallery')) {
        var gallery = new Swiper(".gallery-main", {
			loop: true,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
    }
}))

let handleFormSubmit = (event) => {
    event.preventDefault();
    document.querySelectorAll(".form-btn.btn").forEach(el => {
        el.disabled = true;
    })

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);
    // console.log(data);
    // console.log('token', document.querySelector('meta[name="csrf-token"]').content);
    // return;
    ajaxRequest('site/ajax', data)
        .then(response => {
            if (JSON.parse(response).data.success) {
                document.querySelector('.success').classList.add('popup-show');
                document.querySelectorAll('input').forEach(el => {
                    el.value = '';
                });

                form.reset();
            } else {
                document.querySelector('.error').classList.add('popup-show');
            }
        });
}

function ajaxRequest(cntr, rqst) {
    // console.log(wrap.dataset.id);
    return new Promise((succeed, fail) => {
        // console.log(wrap.dataset.id);
        let quizRequest = new XMLHttpRequest();
        quizRequest.open("POST", `/${cntr}`, true);
        quizRequest.setRequestHeader('Content-Type', 'application/json');

        quizRequest.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name="csrf-token"]').content);
        quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        quizRequest.onload = function () {
            if (quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                succeed(quizRequest.response);
            } else if (quizRequest.status == 400) {
                // throw Error('Ошибка: ' + quizRequest.status);
                fail(new Error(`Request failed: ${quizRequest.status}`));
            } else {
                // throw Error('Ошибка, что-то пошло не так.');
                fail(new Error(`Request failed: ${quizRequest.status}`));
            }
        }
        quizRequest.onerror = function () {
            console.log(onerror)
        };

        // let data = {};
        // let data = { 'flat':i };

        // quizRequest.send('survey_id=2&parent_id=0');
        // quizRequest.send(JSON.stringify(data));
        quizRequest.send(JSON.stringify(rqst));
    })
}

function showStatus() {

    ajaxRequest('site/special-offer')
        .then(response => {
            if (JSON.parse(response)) {
                let dt = JSON.parse(response).data;
                document.querySelector('.flat-num-inner .btn').href = `/ru/pdf?block=b&floor=${dt.floor_num}&flat=${dt.num}&img=9&view=${dt.ru}`;
                document.querySelector('.floor').innerHTML = dt.floor_num;
                document.querySelector('.num').innerHTML = dt.num;
                document.querySelector('.total').innerHTML = dt.total_area;
                document.querySelector('.balcony').innerHTML = dt.balcony_area;
                document.querySelector('.living').innerHTML = dt.living_space;
                document.querySelector('.view').innerHTML = dt.ru;
            }
        });
    return;

    test.addEventListener('click', (e) => {
        let et = e.target.closest('.area');
        if(et){
            let floor = et.dataset.floor;
            let i = et.dataset.i;

            document.querySelector('.flat-num-inner .btn').href = `/ru/pdf?block=${bl}&floor=${floor}&flat=${et.dataset.flat}&img=${i}&view=${et.dataset.views}`;
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