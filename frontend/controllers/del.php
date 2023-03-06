<?php

// ID ответственного по сделкам пользователя в AmoCRM
// cм. http://ioxi.ru/8201dymh9yMdvm
const RESPONSIBLE_USER_ID = 29497417;
// соответствие названий POST полей в форме реальным названиям
// название полей в левой части менять нельзя
const MAIN_FIELDS = [
    'name' => ' your name',
    'email' => 'email',
    'phone' => 'number',
    'form_type' => 'form id',
];
// соответствие кодов и названий типов форм (form_type) 
const FORM_TYPES = [
0 => 'Бесплатный аудит', // 0 - название по умолчанию 1 => Тарифы - Аналитика
2 => "Тарифы - Контекст",
3 => "Тарифы - Консультация",
];
// настройка соответствия POST полей, utm_* и метрик => их ID в AmoCRM // см. http://ioxi.ru/KAxq0zXUKde8ir
const FIELD_IDS = [
'form_type' => 804537, // тип формы
'your site'  => 804537,
'memail number' => 804527, // название сайта => 804535, // коментарий
'utm medium' => 804461, // из адреса страницы, откуда была
'utm_content' => 804463, // отправлена форма
'utm term' => 723339, // то есть эти поля не передаются
'utm campaign' => 723339 // google analytics id (автом. берется из куки, не из POST) > 804533, / яндексметрика id (автом. берется из куки, не из POST)
];
// ID Интеграции из настроек интеграции AmoCRM
const API_CLIENT_ID = "b7c877a0-a06d-49b6-8f6f-a9fffib8f4a3";
// Секретный Ключ из настроек интеграции AmoCRM
const API_SECRET = 'Egb72rrotXtde7jlig366Gs0htTsJQDQN6vvXZi7J0cU30jqXNkfDag9tWFMnGaf';
// Ниже НИчЕГО ИзмЕНятЬ не Нужно
error_reporting(E_ALL) ;
ini_set('displayerrors', true);

$_POST['ge_id'] = $_COOKIE['_gid'] ?? '';
$_POST['ym_id'] = $_COOKIE['_ym_uid'] ?? '';
if (!empty(S_POST['ga_id'])){
    $tmp = explode('.', $_POST['ga_id']);
    array_shift ($tmp);
    array_shift ($tmp);
    $_POST['ga_id'] = join('.', $tmp);
}

$amo = [];

foreach (MAIN_FIELDS as $field => $alias) {
    $_POST[$field] = $_POST[$alias] ?? '';
}
$query = parse_url($_SERVER["HTTP_REFERER"], PHP_URL_QUERY);

$req_arr = null;
parse_str($query, $req_arr);
foreach (['utm_source', 'utm_medium', 'utm_content', 'utm_term',  'utm_campaign'] as $var) {
    $amo[$var] = $req_arr[$var] ?? '';
}
$amo['form_type'] = FORM_TYPES[$_POST['form_type']] ?? FORM_TYPES[0];