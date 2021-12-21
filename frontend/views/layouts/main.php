<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\User;
use common\models\UserInfo;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$currentLang = Yii::$app->language;

$user_info = \common\models\UserInfo::find()->where(['user_id' => 1])->one();

// $this->registerJs('var baseUrl = "' . Url::home(true) . '";');

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
    
    
    <?= Yii::$app->language == 'ka-GE' ? '<link rel="stylesheet" href="/css/ge.css">' : '' ; ?>
    <?= Yii::$app->language == 'en-US' ? '<link rel="stylesheet" href="/css/en.css">' : '' ; ?>
</head>
<body class="<?= $this->context->bodyClass; ?>">
<?php $this->beginBody() ?>
<?php require_once('template-header.php'); ?>
<!-- <header class="header"> -->
    <?php
    // NavBar::begin([
    //     'brandLabel' => Yii::$app->name,
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
    //     ],
    // ]);
    // $menuItems = [
    //     ['label' => 'Contact', 'url' => ['/site/contact']],
    // ];
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav'],
    //     'items' => $menuItems,
    // ]);
    // NavBar::end();
    ?>
    
<!-- </header> -->


<?= $content ?>

<?php require_once('template-footer.php'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
