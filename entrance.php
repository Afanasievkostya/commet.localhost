<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'db.php';
require_once 'functions.php';
if (!empty($_GET)) {
    // записываем в переменную значение get
    $stok = $_GET['name'];
    // шифрование имени
    $stok = base64_encode($stok);
    // получаем массив зарегистрированных пользователей
    $users = search_user();
    // возращаем массив из знач. name массива $users
    $users_name = array_column($users, 'name');
    // проверяем существует ли в массиве имя
    $name = in_array($stok, $users_name, true);
    // выбираем массив с именем зарегистрированным пользователем
    $pas = search_pas($stok);

    // ищем ключ массива
    // $key = key($pas);
    // ищем id ключа массива
    // $id = $pas[$key]['id'];

    // проверяем если не существует  имя то
    if (!$name) {
        $name_user_erroy = '<p class="nameErroy" style="font-size: 18px; color: red;">' .base64_decode($stok). ' чтобы комментировать, пожалуйста зарегистрируйтесь. <a href="user.php">Перейти к регистрации.</a></p>';
    } elseif (!password_verify($_GET['password'], $pas['password'])) {
        // проверяем пароль пользователя с введённым, если не совподает, то
        $password_user_erroy =  '<p class="nameErroy" style="font-size: 18px; color: red;">Не верный пароль</p>';
        $end_password = '<a href="entrance.php" class="end-user">&times;</a>';
    } else {
        header("Location: index.php?name={$stok}");
        exit;
    }
}

// Шаблонизация

$page_content = include_template('templates/entrance.php', [
    'name_user_erroy' => @$name_user_erroy,
    'password_user_erroy' => @$password_user_erroy,
    'end_password' => @$end_password
	]);

$layout_content = include_template('templates/layout.php', [
    'title' => 'Вход',
    'pagetitle' => 'Вход',
    'content' => $page_content
]);

print($layout_content);
