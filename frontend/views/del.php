гр მთის
мр ზღვის

მთის
მთის
მთის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
ზღვის
მთის
მთის
მთის
მთის
მთის












































































balcony_area: "4.1"

floor_num: "11"

id: "1"
​​
living_space: "24.5"
​​
money: "40040.0000"
​​
num: "1101"
​​
ru: "Море"
​​
status: "0"
​​
total_area: "28.6"






0
1
2
0
0
2
1
1
1
1
1
1
1
1
1
2
1
2
0
2
2
2
0


Горы
Горы
Горы
Море
Море
Море
Море
Море
Море
Море
Море
Море
Море
Море
Море
Море
Море
Море
Горы
Горы
Горы
Горы
Горы





<div class="top-lang">
                <?php $langs = \backend\modules\language\models\Language::find()->where(['deleted_at' => null])->all(); ?>
                <?php foreach ($langs as $lang): ?>
                    <a <?= ($lang->key == $currentLang) ? 'class="current"' : ''; ?> href="/site/set-locale?locale=<?=$lang->key?>">
                        <span><?= $lang->code; ?></span>
                    </a>
                <?php endforeach; ?>
			</div>




<!-- <div class="floor-choose-inner" data-floor="2">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/3.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/3.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                    </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="3">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/4.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/4.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="4">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/5.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/5.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="5">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/6.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/6.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="6">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/7.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/7.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="7">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/8.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/8.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="8">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/9.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/9.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div> -->