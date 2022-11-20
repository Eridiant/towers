window.addEventListener('load', () => {
    const status = document.querySelector('.apartments-status');
    if (status) {
        console.log('st');
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
        })
    }
})

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