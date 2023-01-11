<style>
    .price {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 40px;
    }
    .price-button {
        display: flex;
        align-items: center;
        color: #6a9ec3;
    }
    .price-text > span {
        display: block;
    }
    .price-text > span:first-child {
        font-size: 13px;
    }
    .price-text:first-child {
        text-align: right;
    }
    .price-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80px;
        height: 80px;
        margin-left: 10px;
        margin-right: 10px;
        border-radius: 50%;
        font-size: 40px;
        filter: blur(0.5px);
        box-shadow: 0 10px 25px -4px rgba(0, 0, 0, 0.4), inset 0 -8px 25px -1px rgba(255, 255, 255, 0.9), 0 -10px 15px -1px rgba(255, 255, 255, 0.6), inset 0 8px 20px 0 rgba(0, 0, 0, 0.2), inset 0 0 5px 1px rgba(255, 255, 255, 0.6);
    }
    .price-table {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .price-table table {
        background: rgb(202, 202, 201);
        background: linear-gradient(135deg, rgb(202, 202, 201) 0%, rgb(233, 231, 236) 16%, rgb(239, 237, 243) 100%);
    }
    .price-table table tr:first-child td {
        padding-left: 10px;
        padding-right: 10px;
    }
    .price-table table tr:not(:nth-child(-n+2)) td:not(:first-child) {
        min-width: 90px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .price-table table td {
        text-align: center;
    }
    .price-table .yard tbody td:not(.first) {
        background-color: #d3e6ed;
    }
    .price-table .port tbody td:not(.first) {
        background-color: #a5cdd7;
    }
    .price-table .alley tbody td:not(.first) {
        background-color: #67a1c6;
    }
    .price-table .first {
        background-color: rgba(255, 255, 255, 0);
    }
    .price-table .head {
        white-space: pre-line;
        text-align: center;
    }
</style>
            <div class="price">
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