document.addEventListener("DOMContentLoaded",(function(){

    if (document.querySelector('.cont-messager')) {
		document.querySelector('.cont-messager').addEventListener('click', (e)=>{
			e.preventDefault();
			document.querySelector('.form-popup').classList.add('popup-show');
		})
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
}))

let handleFormSubmit = (event) => {
    event.preventDefault();
    document.querySelectorAll(".form-btn.btn").forEach(el => {
        el.disabled = true;
    })

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);
    console.log(data);
    console.log('token', document.querySelector('meta[name="csrf-token"]').content);
    return;
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