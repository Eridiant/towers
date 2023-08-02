<?php

use yii\helpers\Html;

$this->title = 'Status';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="apartments-status">
    <p>
        отметить словом или фразой содержащей
    </p>
    <p>
        забронированные: 1 booked ჯავშანი
    </p>
    <p>
        проданные: 2 sold დახურული გაიყიდა
    </p>
    <p>
        без учета регистра
    </p>
    <form action="#" method="post" class="block-a">
        <p>ссылка на block-a (true)</p>
        <input type="text" name="message">
        <button type="button" class="check">check</button>
        <button type="submit">submit</button>
    </form>
    <br>
    
    <form action="#" method="post" class="block-b">
        <p>ссылка на block-b (true)</p>
        <input type="text" name="message">
        <button type="button" class="check">check</button>
        <button type="submit">submit</button>
    </form>
    
    <form action="#" method="post" class="block-c">
        <p>ссылка на block-c (true)</p>
        <input type="text" name="message">
        <button type="button" class="check">check</button>
        <button type="submit">submit</button>
    </form>
<!--     
    <form action="#" method="post" class="block-f">
        <p>ссылка на block-f (true)</p>
        <input type="text" name="message">
        <button type="button" class="check">check</button>
        <button type="submit">submit</button>
    </form>
    
    <form action="#" method="post" class="block-e">
        <p>ссылка на block-e (true)</p>
        <input type="text" name="message">
        <button type="button" class="check">check</button>
        <button type="submit">submit</button>
    </form> -->
    <br>
    <br>
    <div class="apartments-check"></div>
</div>