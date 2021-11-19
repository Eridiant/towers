<div class="top-lang">
                <?php $langs = \backend\modules\language\models\Language::find()->where(['deleted_at' => null])->all(); ?>
                <?php foreach ($langs as $lang): ?>
                    <a <?= ($lang->key == $currentLang) ? 'class="current"' : ''; ?> href="/site/set-locale?locale=<?=$lang->key?>">
                        <span><?= $lang->code; ?></span>
                    </a>
                <?php endforeach; ?>
			</div>