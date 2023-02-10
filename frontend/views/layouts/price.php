<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\PriceAsset;

PriceAsset::register($this);




?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
    <?php $this->head() ?>
    
    <?php $this->registerMetaTag(['name' => 'facebook-domain-verification', 'content' => 'zmda1htyfogiz2do08ivmons83rg48']); ?>
    <?php $this->registerMetaTag(['property' => 'og:title', 'content' => 'Premium class high rise residential complex']); ?>
    <?php $this->registerMetaTag(['property' => 'og:image', 'content' => 'https://calligraphy-batumi.com/images/img.jpg']); ?>
    
</head>
<body>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();