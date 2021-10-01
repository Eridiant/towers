<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$cookies = Yii::$app->request->cookies;
$currentLang = $cookies->getValue('_locale', 'en-US');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="header">
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
    <?php require_once('template-header.php'); ?>
</header>


<?= $content ?>

<?php require_once('template-footer.php'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
