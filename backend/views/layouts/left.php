<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p> <?= Yii::$app->user->identity->username; ?> </p>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Главные настройки', 'icon' => 'home', 'url' => ['/site/index']],
                    ['label' => 'Скрипты', 'icon' => 'home', 'url' => ['/site/scripts']],
                    ['label' => 'Новости', 'icon' => 'home', 'url' => ['/news/index']],
                    // ['label' => 'Кваритры', 'icon' => 'building-o', 'url' => ['floor/index']],
                    // [
                        // 'label' => 'Новости',
                        // 'icon' => 'building-o',
                        // 'url' => '#',
                        // 'items' => [
                            // ['label' => 'Этажи', 'icon' => 'building', 'url' => ['floor/index'],],
                            // ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['apartments/index'],],
                        // ],
                    // ],
                    // [
                    //     'label' => 'Кваритры',
                    //     'icon' => 'building-o',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Этажи', 'icon' => 'building', 'url' => ['floor/index'],],
                    //         ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['apartments/index'],],
                    //     ],
                    // ],
                    [
                        'label' => 'Кваритры',
                        'icon' => 'building-o',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'блок а',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/index', 'block' => 'a'],],
                                    // ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/multy', 'block' => 'a'],],
                                    ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['/apartments/index', 'block' => 'a'],],
                                ],
                            ],
                            [
                                'label' => 'блок б',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/index', 'block' => 'b'],],
                                    // ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/multy', 'block' => 'b'],],
                                    ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['/apartments/index', 'block' => 'b'],],
                                ],
                            ],
                            [
                                'label' => 'блок с',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/index', 'block' => 'c'],],
                                    // ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/multy', 'block' => 'c'],],
                                    ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['/apartments/index', 'block' => 'c'],],
                                ],
                            ],
                        ],
                    ],
                    ['label' => 'Заявки', 'icon' => 'envelope-open-o', 'url' => ['/feedback/index']],
                    ['label' => 'Системные', 'options' => ['class' => 'header'], 'permission' => ['canSupper', 'canAdmin', 'canEditor']],
                    [
                        'label' => 'Локализация',
                        'icon' => 'language',
                        'url' => '/admin/language/languages/active',
                        'permission' => ['canSupper', 'canAdmin']
                    ],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
