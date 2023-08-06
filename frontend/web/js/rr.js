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
}))