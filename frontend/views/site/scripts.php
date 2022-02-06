<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="#" class="imp">asdfasdf</a>

<script>
    document.querySelector('.imp').addEventListener('click', (e) => {
        e.preventDefault();
        gtag_report_conversion(window.location);
    });
    function gtag_report_conversion(url) {
        var callback = function () {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'conversion', {
            'send_to': 'AW-307879312/6s-kCOa1__ICEJC755IB',
            'event_callback': callback
        });
        return false;
    }
</script>

<!-- Global site tag (gtag.js) - Google Ads: 307879312 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-307879312"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-307879312');
</script>


</body>
</html>