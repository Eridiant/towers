<header class="header">
  <div class="header-bg">
    <picture class="header-vis">
      <source srcset="images/del/bg14.jpg" media="(max-width: 420px)">
      <source srcset="images/del/bg13.jpg" media="(max-width: 1280px)">
      <source srcset="images/del/bg12.jpg" media="(max-width: 1500px)">
      <source srcset="images/del/bg11.jpg" media="(min-width: 1501px)">
      <img src="images/del/bg13.jpg" alt="">
    </picture>
    <picture class="header-vis">
      <source srcset="images/del/bg24.jpg" media="(max-width: 420px)">
      <source srcset="images/del/bg23.jpg" media="(max-width: 1280px)">
      <source srcset="images/del/bg22.jpg" media="(max-width: 1500px)">
      <source srcset="images/del/bg21.jpg" media="(min-width: 1501px)">
      <img src="images/del/bg23.jpg" alt="">
    </picture>
  </div>
  <div class="container" style="max-width: 1170px; margin-left: auto; margin-right: auto">
    <div class="header-link">
      <div class="header-icon">
        <a href="#">
          <svg width="16" height="16"><use xlink:href="images/icons.svg#header-icon"></use></svg>
        </a>
        <a href="#">
          <svg width="9" height="16"><use xlink:href="images/icons.svg#header-icon2"></use></svg>
        </a>
        <a href="#">
          <svg width="16" height="16"><use xlink:href="images/icons.svg#header-icon3"></use></svg>
        </a>
        <a href="#">
          <svg width="16" height="16"><use xlink:href="images/icons.svg#header-icon4"></use></svg>
        </a>
      </div>
      <div class="header-lang">
        <?php $model = \backend\modules\language\models\Language::find()->where(['deleted_at' => null])->all(); ?>
        <?php foreach ($model as $lang): ?>
          <a <?= ($lang->key == $currentLang) ? 'class="current"' : ''; ?> href="/site/set-locale?locale=<?=$lang->key?>">
            <span><?= preg_replace('/-\w{2}/', '$1', $lang->key); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="header-panel">
      <div class="header-logo">
       <svg width="46" height="56"><use xlink:href="images/icons.svg#header-logo"></use></svg>
      </div>
      <div class="header-nav">
        <div class="header-nav-item"><a href="#">О проекте</a></div>
        <div class="header-nav-item"><a href="#">Апартаменты</a></div>
        <div class="header-nav-item"><a href="#">Галерея</a></div>
        <div class="header-nav-item"><a href="#">Условия</a></div>
        <div class="header-nav-item"><a href="#">Контакты</a></div>
      </div>
      <a href="tel:+995574202020" class="header-tel">
        +995 (574) 20 20 20 
      </a>
    </div>
    <div class="header-content">
      <p class="header-subtitile">Жилой комплекс</p>
      <h1>CUBE TOWER</h1>
      <p>Роскошные апартаменты для жизни и инвестиций.</p>
      <div class="header-button">
        <a href="#" class="btn btn-yellow">Выбрать квартиру</a>
        <a data-fancybox="" data-src="#modal" href="javascript:;" class="btn btn-yellow">Заказать звонок</a>
        <a href="#" class="btn btn-bg">Mardi</a>
      </div>
    </div>
    <div class="header-burger">
      <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M32 0.814453H0V3.99326H32V0.814453Z" fill="currentColor"/>
        <path d="M32 22.0068H0V25.1856H32V22.0068Z" fill="currentColor"/>
        <path d="M32 11.4102H0V14.589H32V11.4102Z" fill="currentColor"/>
      </svg>
    </div>
    <div class="burger-bg">
      <!-- <img src="images/dist/burger-bg.jpg" alt=""> -->
      <div class="burger-top">
        <div class="burger-logo">
         <svg width="46" height="56"><use xlink:href="images/icons.svg#burger-logo"></use></svg>
        </div>
        <div class="burger-lang">
          <a href="/site/set-locale?locale=ru-RU" class="current"><span>ru</span></a>
          <a href="/site/set-locale?locale=he-Ge"><span>he</span></a>
          <a href="/site/set-locale?locale=en-US"><span>en</span></a>
        </div>
      </div>
      <div class="burger-menu">
        <div class="burger-nav">
          <div class="burger-nav-item"><a href="#">О проекте</a></div>
          <div class="burger-nav-item"><a href="#">Апартаменты</a></div>
          <div class="burger-nav-item"><a href="#">Галерея</a></div>
          <div class="burger-nav-item"><a href="#">Условия</a></div>
          <div class="burger-nav-item"><a href="#">Контакты</a></div>
        </div>
        <a href="tel:+995574202020" class="burger-tel">
          +995 (574) 20 20 20 
        </a>
        <div class="burger-icon">
          <a href="#">
           <svg width="16" height="16"><use xlink:href="images/icons.svg#viber"></use></svg>
          </a>
          <a href="#">
            <svg width="9" height="16"><use xlink:href="images/icons.svg#fb"></use></svg>
          </a>
          <a href="#">
           <svg width="16" height="16"><use xlink:href="images/icons.svg#instagram"></use></svg>
          </a>
          <a href="#">
            <svg width="16" height="16"><use xlink:href="images/icons.svg#whatsapp"></use></svg>
          </a>
        </div>
      </div>
      <div class="burger-arrow">
        <svg width="32" height="28"><use xlink:href="images/icons.svg#burger-arrow"></use></svg>
      </div>
    </div>
    <div class="header-navigation navigation">
      <div class="header-prev prev">
        <svg width="24" height="16"><use xlink:href="images/icons.svg#header-prev prev"></use></svg>
      </div>
      <div class="header-next next">
        <svg width="24" height="16"><use xlink:href="images/icons.svg#header-next next"></use></svg>
      </div>
    </div>
  </div>
</header>