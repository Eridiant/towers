<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="header-wrapper">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <header class="header">
			<div class="header-logo">
				<a href="https://calligraphy-batumi.com">
					<svg width="100%" height="100%"><use xlink:href="/images/icons.svg#logos"></use></svg>
				</a>
                <span>Calligraphy Towers</span>
			</div>
            <div class="header-mail">
                <a href="https://calligraphy-batumi.com">www.calligraphy-batumi.com</a>
            </div>
        </header>
    </div>
</div>
<main class="main">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="plan">
                <div class="plan-img">
                    <picture>
                        <img src="/images/price/plan.jpg" alt="">
                    </picture>
                </div>
            </div>
            <div class="price">
                <div class="price-button">
                    <div class="price-text">
                        <span>ფასი</span>
                        <span>price</span>
                        <span>цены</span>
                    </div>
                    <div class="price-btn">G</div>
                    <div class="price-text">
                        <span>დაბლოკვა</span>
                        <span>block</span>
                        <span>блок</span>
                    </div>
                </div>
                <div class="price-table">
                    <table class="yard">
                        <tbody>
                            <tr>
                                <td class="first" rowspan="2">FLOOR</td>
                                <td colspan="2">YARD VIEW</td>
                            </tr>
                            <tr>
                                <td class="head">Price per
                                    sq.m
                                    (white frame)</td>
                                <td class="head">Price per
                                    sq.m
                                    (turnkey)</td>
                            </tr>
                            <?php foreach ($model as $item): ?>
                                <?php if ($item["area"] == "yard"): ?>
                                    <tr>
                                        <?php if ($item["min_floor"] === $item["max_floor"]): ?>
                                            <td class="first"><?= $item["min_floor"]; ?></td>
                                        <?php else: ?>
                                            <td class="first"><?= $item["min_floor"]; ?>-<?= $item["max_floor"]; ?></td>
                                        <?php endif; ?>
                                        <td>$ <?= $item["max_white"]; ?></td>
                                        <td>$ <?= $item["max_turnkey"]; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                                    <tr class="dn">
                                        <td class="first">36-38</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="dn">
                                        <td class="first">39-40</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                        </tbody>
                    </table>
                    <table class="port">
                        <tbody>
                            <tr>
                                <td class="first" rowspan="2">FLOOR</td>
                                <td colspan="2">PORT AND CITY</td>
                            </tr>
                            <tr>
                                <td class="head">Price per
                                    sq.m
                                    (white frame)</td>
                                <td class="head">Price per
                                    sq.m
                                    (turnkey)</td>
                            </tr>
                            <?php foreach ($model as $item): ?>
                                <?php if ($item["area"] == "port and city"): ?>
                                    <tr>
                                        <?php if ($item["min_floor"] === $item["max_floor"]): ?>
                                            <td class="first"><?= $item["min_floor"]; ?></td>
                                        <?php else: ?>
                                            <td class="first"><?= $item["min_floor"]; ?>-<?= $item["max_floor"]; ?></td>
                                        <?php endif; ?>
                                        <td>$ <?= $item["max_white"]; ?></td>
                                        <td>$ <?= $item["max_turnkey"]; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="alley">
                        <tbody>
                            <tr>
                                <td class="first" rowspan="2">FLOOR</td>
                                <td colspan="2">ALLEY VIEW</td>
                            </tr>
                            <tr>
                                <td class="head">Price per
                                    sq.m
                                    (white frame)</td>
                                <td class="head">Price per
                                    sq.m
                                    (turnkey)</td>
                            </tr>
                            <?php foreach ($model as $item): ?>
                                <?php if ($item["area"] == "alley"): ?>
                                    <tr>
                                        <?php if ($item["min_floor"] === $item["max_floor"]): ?>
                                            <td class="first"><?= $item["min_floor"]; ?></td>
                                        <?php else: ?>
                                            <td class="first"><?= $item["min_floor"]; ?>-<?= $item["max_floor"]; ?></td>
                                        <?php endif; ?>
                                        <td>$ <?= $item["max_white"]; ?></td>
                                        <td>$ <?= $item["max_turnkey"]; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>