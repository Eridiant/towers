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
use yii\web\View;

AppAsset::register($this);

$currentLang = Yii::$app->language;

switch ($currentLang) {
    case 'ru-RU':
        $curLangUrl = "/" . explode("-", $currentLang)[0];
        break;
    case 'en-US':
        $curLangUrl = "/" . explode("-", $currentLang)[0];
        break;
    default:
        $curLangUrl = "";
        break;
}
$user_info = \common\models\UserInfo::find()->where(['user_id' => 1])->one();
$scripts = \frontend\models\Scripts::find(1)->one();


// $this->registerJs('var baseUrl = "' . Url::home(true) . '";');

#сохраняем utm-метки в cookie 
if(isset($_GET["utm_source"])) setcookie("utm_source", $_GET["utm_source"], time()+3600*24*30);
if(isset($_GET["utm_medium"])) setcookie("utm_medium", $_GET["utm_medium"], time()+3600*24*30);
if(isset($_GET["utm_campaign"])) setcookie("utm_campaign", $_GET["utm_campaign"], time()+3600*24*30);
if(isset($_GET["utm_content"])) setcookie("utm_content", $_GET["utm_content"], time()+3600*24*30);
if(isset($_GET["utm_term"])) setcookie("utm_term", $_GET["utm_term"], time()+3600*24*30);
if(isset($_GET["utm_referrer"])) setcookie("utm_referrer", $_GET["utm_referrer"], time()+3600*24*30);
if(isset($_GET["fbclid"])) setcookie("fb_cl_id", $_GET["fbclid"], time()+3600*24*30);
if(isset($_GET["gclientid"])) setcookie("g_client_id", $_GET["gclientid"], time()+3600*24*30);
if(isset($_GET["gclid"])) setcookie("g_cl_id", $_GET["gclid"], time()+3600*24*30);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" href="/images/favicon/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/touch-icon-ipad-retina.png">
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

    <?= $scripts->header; ?>
    <?php
        if (!YII_ENV_DEV) {
            $this->registerJsFile(
                '//www.googletagmanager.com/gtag/js?id=AW-307879312',
                ['position' => $this::POS_HEAD, 'async'=>true]
            );
            $this->registerJs(
                "window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'AW-307879312');",
                View::POS_HEAD,
            );
        }
    ?>
</head>
<body class="<?= $this->context->bodyClass; ?>">
<?= $scripts->body; ?>
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



