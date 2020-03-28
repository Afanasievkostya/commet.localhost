<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'db.php';
require_once 'functions.php';
    // записываем в переменную значение $_REQUEST
    $stok = @$_REQUEST['name'];
    // получаем массив зарегистрированных пользователей
    $users = search_user();
    // возращаем массив из знач. name массива $users
    $users_name = array_column($users, 'name');
    // проверяем существует ли в массиве имя
    $name = in_array($stok, $users_name, true);
    // выводим массив $messange
    $messanges = get_mess();
    // колличество комментариев
    $sum = count(get_sum());

if (!empty($_GET)) {
  if (!$name) {
    $erroy_user = '<p style="font-size: 18px; color: red;">Не санкционированный вход. Отказ в допуске!</p>';
    $end_user = '<a href="user.php" class="end-user">&times;</a>';
  }else {
    $name_user = '<p style="color: green;">Добро пожаловать: <span style="font-size: 18px; font-weight: bold;">'.base64_decode($stok).'</span></p>';
    $submit_comm = '<button type="submit" class="btn btn-success">Отправить</button>';
  }
}

if (!empty($_GET['delete'])) {
    $id_mess = $_GET['delete'];
    remove_mess($id_mess);
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

if (!empty($_POST)) {
    // находим ключ активного элемента массива $users
    $key_user = @array_search($stok, @array_column($users, 'name'));
    // создаём массив $_POST
    $_POST['id'] = $key_user;
    $_POST['users_id'] = $users[$_POST['id']]['id'];
    $_POST['name_user'] = base64_decode($stok);
    $_POST['image_user'] = $users[$_POST['id']]['image'];
    // записываем данные в БД
    save_mess();

    header("Location: index.php?name={$stok}");
    exit;
}

// Шаблонизация

if ($messanges && count($messanges)) {
    $messanges_list = include_template('templates/blocks/messanges-list.php', [
      'messanges' => $messanges
    ]);
}

$page_content = include_template('templates/index.php', [
    'sum' => $sum,
    'name_user' => @$name_user,
    'submit_comm' => @$submit_comm,
    'erroy_user' => @$erroy_user,
    'end_user' => @$end_user
	]);

$layout_content = include_template('templates/layout.php', [
    'title' => 'Комментарии',
    'pagetitle' => 'Комментарии',
    'content' => $page_content,
    'messanges_list' => $messanges_list
]);

print($layout_content);
