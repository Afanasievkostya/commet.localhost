<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'db.php';
require_once 'functions.php';
if (!empty($_POST)) {
    // записываем в переменную значение post
    $stok = @$_REQUEST['name'];
    // шифрование имени
    $stok = base64_encode($stok);
    // получаем массив зарегистрированных пользователей
    $users = search_user();
    // возращаем массив из знач. name массива $users
    $users_name = array_column($users, 'name');
    // проверяем существует ли в массиве имя
    $name = in_array($stok, $users_name, true);
    //если существует то
    if ($name) {
        $name_user_erroy = '<p style="font-size: 18px; color: red;">Пользователь с таким именем уже существует!</p>';
        $end_user = '<a href="user.php" class="end-user">&times;</a>';
    } else {
        // проверяем, можно ли загружать изображение
        //если файл не выбран, значит файл по умолчанию
        if($_FILES['file']['name'] == '') {
            get_no_img($_FILES['file']);
            $image_no = 'Если аватар не выбран, аватарка устанавливаеться по умолчанию.';
            $end_image_no = '<a href="index.php?name='.$stok.'" class="imag-no">Войдите чтобы комментировать</a>';
        }else{
        $check = can_upload($_FILES['file']);
        if ($check === true) {
            // загружаем изображение на сервер
            make_upload($_FILES['file']);
            //  записываем данные в БД
            save_user($_FILES['file']);
            header("Location: index.php?name={$stok}");
            exit;
        } else {
            $erroy = $check;
            $end = '<a class="get-end" href="user.php" class="user-end">&times;</a>';
        }
        }
    }
}

// Шаблонизация

$page_content = include_template('templates/user.php', [
    'name_user_erroy' => @$name_user_erroy,
    'end_user' => @$end_user,
    'image_no' => @$image_no,
    '$end_image_no' => @$end_image_no
	]);

$layout_content = include_template('templates/layout.php', [
    'title' => 'Регистрация',
    'pagetitle' => 'Регистрация',
    'content' => $page_content
]);

print($layout_content);
