<?php

use frontend\assets\SpecialOfferAsset;

SpecialOfferAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Offer</title>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>

</head>
<body class="special-offer other bl">
<?php $this->beginBody() ?>

<?php require_once('head-offer.php'); ?>

<?= $content ?>

<?php require_once('footer-offer.php'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
