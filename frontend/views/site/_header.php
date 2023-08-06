<header class="header">
	<div class="header-bg img-bg">
		<div class="header-bg-wrap header-lights">
			<picture>
				<source srcset="/images/dist/header/header_mb_bg.jpg, /images/dist/header/header_mb_bg-2x.jpg 2x, /images/dist/header/header_mb_bg-4x.jpg 4x" media="(max-width: 480px)">
                <source type="image/jpeg" srcset="/images/dist/header/header_bg_clouds.jpg, /images/dist/header/header_bg_clouds-2x.jpg 2x">
				<img src="/images/dist/header/header_bg_clouds.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
			</picture>
		</div>
		<div class="header-bg-wrap">
			<picture>
				<source srcset="/images/dist/header/header_mb_bg_night.jpg, /images/dist/header/header_mb_bg_night-2x.jpg 2x, /images/dist/header/header_mb_bg_night-4x.jpg 4x" media="(max-width: 480px)">
				<source type="image/jpeg" srcset="/images/dist/header/header_bg_night.jpg, /images/dist/header/header_bg_night-1_5x.jpg 2x">
				<img src="/images/dist/header/header_bg_night.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
			</picture>
		</div>
	</div>
    <div class="header-bg-svg hide">
        <object id="header-bg-svg" data="images/svg/header__bg.svg" type="image/svg+xml"></object>
    </div>
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="header-wrapper">
			<div class="header-inner">
				<p class="header-cap cap">
                    official website
                </p>
				<h1 class="header-title">Calligraphy Towers Batumi</h1>
				<div class="header-video">
					<svg width="141" height="141"><use xlink:href="/images/icons.svg#video"></use></svg>
					<p>
                        <?=Yii::t('frontend', 'Видео')?>
                        <?//=Yii::t('frontend', 'Видео о жилом комплексе')?>
                    </p>
				</div>
			</div>
		</div>
        <div class="header-footer">
			<div class="header-light">
				<svg width="19" height="19"><use xlink:href="/images/icons.svg#sun"></use></svg>
				<svg class="header-light-rt light-rt" width="57" height="24"><use xlink:href="/images/icons.svg#switch"></use></svg>
				<svg width="17" height="17"><use xlink:href="/images/icons.svg#moon"></use></svg>
			</div>
			<div class="header-sound">
				<a href="/sound/sea.mp3" class="top-sound top-sound-mb">
					<svg id="sound" width="32" height="32"><use xlink:href="/images/icons.svg#sound"></use></svg>
				</a>
			</div>

		</div>
	</div>
</header>