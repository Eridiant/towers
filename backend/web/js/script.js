window.addEventListener('load', () => {
    const status = document.querySelector('.apartments-status');
    if (status) {
        status.addEventListener('submit', (e) => {
            e.preventDefault();
            let target = e.target;
            // target.closest
            if (target.closest('.block-a')) {
                rqstBlock('a', target.message.value);
            }
            if (target.closest('.block-b')) {
                rqstBlock('b', target.message.value);
            }
            if (target.closest('.block-c')) {
                rqstBlock('c', target.message.value);
            }
        })
    }
})

document.addEventListener("DOMContentLoaded", () => {

    const telegram = document.querySelector('#telegram');
    if (telegram) {
        const img = document.querySelector('#telegram .tg-img');
        const telegramImg = document.querySelector('.telegram-img');

        img?.addEventListener('click', (e) => {
            let type = document.querySelector('#telegramcontent-type_name').value;
            if (!(type === 'image' || type === 'animation' || type === 'video' || type === 'group')) return;

            fetch('/admin/telegram/chose-image', {
                method: 'POST', // replace with your request method
                headers: {
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content, // replace with your actual CSRF token
                    'Content-Type': 'application/json' // replace with your request content type
                },
                body: JSON.stringify({
                    data: type
                })
            })
            .then(response => response.json())
            .then(data => {
                // handle the response data here
                let items = type === 'group' ? `<a class="telegram-btn btn" href="#">добавить изображения</a>` : '';

                data.images.forEach((el, i) => {
                    if (type === 'video') {
                        items += `<video class="video" src="/tg/${el.split('/tg/')[1]}" data-url="${el.split('/tg/')[1]}"  alt="${el.split('/tg/')[1]}"></video>`;
                    }else if (type === 'group') {
                        items += ``;
                        items += `<div class="group">
                                    <input type="checkbox" name="image" id="input-${i}">
                                    <label for="input-${i}">
                                        <img src="/tg/${el.split('/tg/')[1]}" data-url="${el.split('/tg/')[1]}" alt="${el.split('/tg/')[1]}">
                                    </label>
                                </div>`;
                    } else {
                        items += `<img class="img" src="/tg/${el.split('/tg/')[1]}" data-url="${el.split('/tg/')[1]}" alt="${el.split('/tg/')[1]}">`;
                    }
                });

                telegramImg.innerHTML = items;
            })
            .catch(error => {
                // handle any errors that occurred during the request
                console.error(error);
            });
        })

        telegram?.addEventListener('click', (e) => {
            let t = e.target;
            if (t.closest('.telegram-btn')) e.preventDefault();
            let currentImg;
            if (currentImg = t.closest('.telegram-img .img')) {
                console.log(currentImg);
                img.value = telegramImg.dataset.site.split('admin/')[0] + 'tg/' + currentImg.dataset.url;
                telegramImg.innerHTML = '';
            }
            if (currentImg = t.closest('.telegram-img .video')) {
                console.log(currentImg.dataset);
                img.value = telegramImg.dataset.site.split('admin/')[0] + 'tg/' + currentImg.dataset.url;
                telegramImg.innerHTML = '';
            }
            if (t.closest('.telegram-btn')) {
                let checked = document.querySelectorAll('.telegram-img input:checked ~label img');
                arr = [];
                checked.forEach((el, i) => {
                    if (i > 10) return;
                    arr.push(telegramImg.dataset.site.split('admin/')[0] + 'tg/' + el.dataset.url);
                });
                img.value = arr.join(',');
                telegramImg.innerHTML = '';
            }
        })

        const input = document.querySelector('#telegramcontent-caption');
        const span = document.querySelector('.field-telegramcontent-caption label').appendChild(document.createElement('span'));
        span.textContent = " " + input.value.length;
        input.addEventListener('input', (e) => {
            span.textContent = " " + input.value.length;
            const button = document.querySelector('.form-group .btn-success');
            if (input.value.length > 1000) {
                button.disabled = true;
                button.innerHTML = "превышено максимальное количество символов";
                button.classList.add('btn-danger')
            } else {
                button.disabled = false;
                button.innerHTML = "save";
                button.classList.remove('btn-danger')
            }
        })
    }

    let caption = document.querySelector('#telegramcontent-caption');
    if (caption) {
        document.querySelector('.btn').addEventListener('click', (e) => {
            e.preventDefault();
            let start = caption.selectionStart;
            let end = caption.selectionEnd;

            if (start != end) {
                let text = caption.value;

                caption.value = `${text.substring(0, start)}<b>${text.substring(start, end)}</b>${text.substring(end)}`;

                var sel = end + 7;
                caption.setSelectionRange(sel, sel);
            }
            return false;
        })
    }
});

function rqstBlock(block, val) {
    let data = {'block':block, 'value':val};
    ajaxRequest("apartments/status", data)
        .then(response => {
            if (!response) {
                alert('error');
            }
            document.querySelector('.apartments-check').innerHTML = JSON.parse(response).data.success;
            // console.log(response);
            // console.log(JSON.parse(response).data.success);
        })
        .catch(error => {
            alert(error);
            console.log(error);
        });
}

function ajaxRequest(cntr, rqst) {
    // console.log(wrap.dataset.id);
    return new Promise((succeed, fail) => {
        // console.log(wrap.dataset.id);
        let quizRequest = new XMLHttpRequest();
        quizRequest.open("POST", `/admin/${cntr}`, true);
        quizRequest.setRequestHeader('Content-Type', 'application/json');

        quizRequest.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name="csrf-token"]').content);
        quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        quizRequest.onload = function() {
            if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                succeed(quizRequest.responseText);
            } else if (quizRequest.status == 400) {
                // throw Error('Ошибка: ' + quizRequest.status);
                fail(new Error(`Request failed: ${quizRequest.status}`));
            } else {
                // throw Error('Ошибка, что-то пошло не так.');
                fail(new Error(`Request failed: ${quizRequest.status}`));
            }
        }
        quizRequest.onerror = function() {console.log(onerror)};

        quizRequest.send(JSON.stringify(rqst));
    })
}