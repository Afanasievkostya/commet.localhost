<?php
// безопасность
require_once 'mysql_helper.php';

// удобочитаемая функция информации о переменной
function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
// функция для экранирования апострофов
function clear() {
    global $db;
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }
}
// функция для записи в users если аватар выбран
function save_user($file) {
    global $db;
    clear();
    extract($_POST); // функция берёт ключи и делает из них переменные
    $name = htmlspecialchars($name); // функция Преобразует специальные символы в HTML-сущности
    $name = base64_encode($name); // функция шифрование имени
    $pas = password_hash($password, PASSWORD_DEFAULT); // функция создает хеш пароля
    $query = "INSERT INTO users (name, password, image) VALUES (?, ?, '{$file['name']}')";
    $stmt = db_get_prepare_stmt($db, $query, [$name, $pas]);
    mysqli_stmt_execute($stmt);
}
// функция для записи в users если аватар не выбран
function get_no_img() {
    global $db;
    clear();
    extract($_POST); // функция берёт ключи и делает из них переменные
    $name = htmlspecialchars($name); // функция Преобразует специальные символы в HTML-сущности
    $name = base64_encode($name); // функция шифрование имени
    $pas = password_hash($password, PASSWORD_DEFAULT); // функция создает хеш пароля
    $query = "INSERT INTO users (name, password, image) VALUES (?, ?, 'no-image.png')";
    $stmt = db_get_prepare_stmt($db, $query, [$name, $pas]);
    mysqli_stmt_execute($stmt);
}
// функция для записи данных в messangers
function save_mess() {
    global $db;
    clear();
    extract($_POST); // функция берёт ключи и делает из них переменные
    $_monthsList = [".01." => "января", ".02." => "февраля", ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", ".07." => "июля", ".08." => "августа", ".09." => "сентября", ".10." => "октября", ".11." => "ноября", ".12." => "декабря"];
    $data = date("d.m.Y");
    $_mD = date(".m.");
    $data = str_replace($_mD, " " . $_monthsList[$_mD] . " ", $data);
    $comment = nl2br(htmlspecialchars($comment)); // Вставляет HTML-код разрыва строки и Преобразует специальные символы в HTML-сущности
    $query = "INSERT INTO messanges (users_id, name_user, image_user, comment, data) VALUES ('$users_id', '$name_user', '$image_user', '$comment', '$data')";
    mysqli_query($db, $query);
}
// фукция выбора из messangers 20 последних комментариев
function get_mess() {
    global $db;
    $query = "SELECT * FROM messanges ORDER BY id DESC LIMIT 20";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
// фукция показывает кол-во комментариев
function get_sum() {
    global $db;
    $query = "SELECT * FROM messanges ORDER BY id DESC";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
// фукция для проверки файла
function can_upload($file) {
    // проверка размера
    if ($file['size'] == 104000) return 'Файл слишком большой.';
    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file['name']);
    // нас интересует последний элемент массива - расширение
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    // если расширение не входит в список допустимых - return
    if (!in_array($mime, $types)) return 'Недопустимый тип файла.';
    return true;
}
// фукция копирует файл на сервер
function make_upload($file) {
    global $db;
    copy($file['tmp_name'], 'img/' . $file['name']);
}
// фукция выбирает все значения из users
function search_user() {
    global $db;
    $query = "select * from users";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
// фукция выбирает значения password из таблицы users по имени
function search_pas($name) {
    global $db;
    $query = 'select * from users WHERE name = ?';
    $stmt = db_get_prepare_stmt($db, $query, [$name]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
  return mysqli_fetch_assoc($res);
}
// функция для удаления комментариев
function remove_mess($del) {
   global $db;
   $query="delete from messanges where id='$del'";
   $res = mysqli_query($db, $query);
}
