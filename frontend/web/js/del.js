window.addEventListener('load', () => {
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
    })
})