<!DOCTYPE html>
<html lang="<?//= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="body">
    <div class="container">
        <div class="wrapper"><!-- <a href="/images/blocks/pdf/<?//= $block; ?>/<?//= $floor_num; ?>/1.pdf" alt="" class="contacts-call btn btn-blue"> -->

            <img src="/images/blocks/<?= $block; ?>/<?= $floor; ?>/<?= $flat; ?>.jpg" alt="">
            <div class="inner">
                <p><?=Yii::t('frontend', 'Блок')?> <?= $block; ?></p>
                <p><?=Yii::t('frontend', 'Этаж')?> <?= $floor; ?></p>
                <p><?=Yii::t('frontend', 'Квартира')?> <?= $flat; ?></p>
                <a class ="print-doc" href="javascript:(print());">
                    <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    <?=Yii::t('frontend', 'Распечатать')?>
                </a>
            </div>
        </div>
    </div>
</body>
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        max-height: 100%s;
    }
    .wrapper {
        display: flex;
        align-items: center;
        width: 79%;
        height: 79%;
    }
    .wrapper img {
        max-width: 70%;
        max-height: 90%;
        /* height: auto; */
    }
    .inner {
        width: 20%;
    }
    .inner p, a {
        margin-left: 50px;
    }
    .inner a {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        width: 200px;
        border: 3px solid #0568cd;
        border-radius: 5px;
        color: #fff;
        background-color: #0568cd;
        text-decoration: none;
        margin-top: 50px;
        transition: .5s
    }
    .inner a:hover {
        color: #0568cd;
        background-color: #fff;
    }
    .inner svg {
        margin-right: 10px;
    }
    @media screen and (max-width: 900px) {
        .wrapper {
            flex-direction: column;
        }
        .wrapper img {
            width: 100%;
            height: auto;
        }
        .inner {
            margin-top: 30px;
            width: 100%;
        }
        .inner p, a {
            margin-left: 0px;
        }
    }
    @media print {
        a.print-doc {
            display: none;
            color: #fff;
            border: 3px solid #fff;
        }
    }
</style>
</html>