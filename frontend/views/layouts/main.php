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

<!-- Global site tag (gtag.js) - Google Ads: 307879312 -->
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=psKiCSyAJRRyMfpfph_knyKpDjWU61SszNIFomAvNwX64hpK_5PoNpRBQFyF01ZlyeMTVytr1xmk5ol7n2zvay0PSvDTLiYajOLZWlktzt6W8tOK_d7o7I9jzlLsiWiZwHytT_fEjx9_PXwfPfHVvhpHbcxzV4642ofkv3AVL2sOm7j1M-ySemyHFQPad4vDcc89gepO-10sH9nEdGbF6aI1mboOZZ-Z-ARQ-H7VUIXIaGpe8_Zk9N8ucHVuqXhePutyaUcIrWvhnUo3wIqF1g4n-KtEiope4ASDe9j5_jKJILJiAY6WRhKon_jZ49BD4KH5pvkjUn_JxfjdMKQgEQ1k1F2a4S9YUOdj4jHILJgItK9hXTAjdzMn9YA54Phh0JCxZ2YoBl7uGpUoKv-Od_7yh4PwZvtl9Ec4uQC70p5yd5BIpIpKNpH9Ve0xMluok-ry7Xqm2vLctY-r4JDMksY2XviiYbr9qDyZsAEIrwKleMZ20wHMERWPXlQ_aQEGQk5rlQwggGOAB4RnVFFCD-zxef42tduin_q76yxyX8ZxSwFtNCJGvju2ETh3d0y9yppSKUSofWeEc9A0BSP4E5sBZ7GQPaVlreWvpveCnmhhxDnK0QhxmZAGmd7NmNXhgn56fAvveL-S1vpgES4okiCUMM1aK2hhT14jtR0ZcSRXUbB7Wisp_aKj67Tmm2XWL5RIWnboIeuZow8dODyDAw" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly93ZWJhdHRhY2gubWFpbC55YW5kZXgubmV0L21lc3NhZ2VfcGFydF9yZWFsL0dsb2JhbCUyMHNpdGUlMjB0YWcudHh0P25hbWU9R2xvYmFsJTIwc2l0ZSUyMHRhZy50eHQmc2lkPVlXVnpYM05wWkRwN0ltRmxjMHRsZVVsa0lqb2lNVGM0SWl3aWFHMWhZMHRsZVVsa0lqb2lNVGM0SWl3aWFYWkNZWE5sTmpRaU9pSldTRGh0U20xaFVGQm9OSHAxTUcxb1N6aHJSVUozUFQwaUxDSnphV1JDWVhObE5qUWlPaUl4U2xWNkwzTm5Rak54Y0M4M1dtdEVNMUJNWlZCd2VEZHNZMFZMUVRsR09FbEpiMHhhVlRCcmMzQk9NVzEyZFRKSWVTOHZjSGg0TW1WRVZGRlBNVTlaTkZKNVF6WXhPV3R4YkZOa1FXUkliWFJNUlhWdWFubHVjRlpPVVdWaFNsZzVXV0kyZUhGNGRGazBkaTlKTmxSS1prNUpjMFZMVjNJM00wMUhTMGRKWjFkSk1qUm5Relo1VlZKNWVGZEJZalZJYjBWNVMzYzlQU0lzSW1odFlXTkNZWE5sTmpRaU9pSlhWVlp0VFUxWVFUQkxlVEZIUml0elNtcGlNak5oZG00eFRrVkdjbm93VmtORldVbG5VVGxXUjFOTlBTSjk"/><script async src="https://www.googletagmanager.com/gtag/js?id=AW-307879312"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-307879312');
</script>
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

function getIp() {
    $keys = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR'
    ];

    foreach ($keys as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = explode(',', $_SERVER[$key]);
            $ip = end($ip);
            $ip = trim($ip);
            // $ip = $_SERVER[$key];
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
}
require_once('SxGeo.php');
$ip = getIp();


$SxGeo = new SxGeo(Yii::getAlias('@webroot') . '/dat/SxGeo.dat', SXGEO_BATCH | SXGEO_MEMORY);
// var_dump($SxGeo->getCountry($ip));

$fileName = Yii::getAlias('@webroot') . "/dat/ip.log";
if ( file_exists($fileName) && ($fp = fopen($fileName, "a"))!==false ) {

    $fLog = fopen($fileName,'a');
    fwrite($fLog, date("d.m.Y H:i:s") . " | " . $SxGeo->getCountry($ip) . " | " . $ip . " | роут=" . $_SERVER['REQUEST_URI'] . " || ref=" . $_SERVER['HTTP_REFERER'] . "              ||| " . trim($_SERVER['HTTP_USER_AGENT']) . "\r\n");
    fclose($fLog);

}
// $country = $SxGeo->getCountry($ip); // возвращает двухзначный ISO-код страны
// // $SxGeo->getCountryId($ip); 
// var_dump('<pre>');
// var_dump($SxGeo->getCountry($ip), $SxGeo->getCountryId($ip));
// var_dump('</pre>');

