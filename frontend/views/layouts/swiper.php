<?php

use frontend\assets\SwiperAsset;

SwiperAsset::register($this);

// var_dump('<pre>');
// var_dump();
// var_dump('</pre>');
// die;



?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
    <?php $this->head() ?>

</head>
<body>

<?= $content ?>

<!-- Swiper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
