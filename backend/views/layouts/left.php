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
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Главные настройки', 'icon' => 'home', 'url' => ['site/index']],
                    // ['label' => 'Кваритры', 'icon' => 'building-o', 'url' => ['floor/index']],
                    [
                        'label' => 'Кваритры',
                        'icon' => 'building-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Этажи', 'icon' => 'building', 'url' => ['floor/index'],],
                            ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['apartments/index'],],
                        ],
                    ],
                    ['label' => 'Заявки', 'icon' => 'envelope-open-o', 'url' => ['feedback/index']],
                    ['label' => 'Системные', 'options' => ['class' => 'header'], 'permission' => ['canSupper', 'canAdmin', 'canEditor']],
                    [
                        'label' => 'Локализация',
                        'icon' => 'language',
                        'url' => '/admin/language/languages/active',
                        'permission' => ['canSupper', 'canAdmin']
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
