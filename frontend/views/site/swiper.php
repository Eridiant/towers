<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\FileHelper;





?>
<div class="slider swiper-container">
    <div class="swiper-wrapper">
    <?php

        $images = glob("images/swiper/*.*", GLOB_BRACE);

        foreach ($images as $image) {
        echo "<div class='swiper-slide'>" . Html::img($image, ['alt' => 'Image']) . "</div>";
        }
    ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>