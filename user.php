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
?>

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <title>Регистрация</title>
   </head>
   <body>
         <div class="container">
            <section class="user comments">
               <div class="form-wrapper">
                  <div class="title">
                     <h2>Регистрация</h2>
                  </div>
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Комментарии</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
                           <li class="breadcrumb-item"><a href="entrance.php">Вход</a></li>
                        </ol>
                  </nav>
                  <form action="" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                     <div class="form-row">
                        <div class="col-md-6">
                           <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Ваше имя" required>
                           <div class="valid-feedback">
                              Имя указано!
                           </div>
                           <div class="invalid-feedback">
                              Вы не указали ваше имя.
                           </div>
                           <div class="form-item" style="margin-top: 10px;"><span style="color: red;"><?= @$name_user_erroy; ?><?= @$end_user; ?></span></div>
                        </div>
                     </div>
                     <div class="form-row" style="margin-top: 15px;">
                        <div class="col-md-6">
                        <input type="password" class="form-control" id="validationCustom02" name="password" placeholder="Пароль" required>
                        <div class="valid-feedback">
                           Пароль не указан!
                        </div>
                        <div class="invalid-feedback">
                           Вы не указали ваш пароль!
                        </div>
                        </div>
                      </div>
                     <div class="form-row" style="margin-top: 15px;">
                        <div class="col-md-6 mb-3">
                           <ul class="form-file">
                              <li class="form-file--item"><label for="inputFile">Ваш аватар </label></li>
                              <li class="form-file--item"><input type="file" id="inputFile" name="file"></li>
                              <li class="form-file--item" style="margin-top: 10px;"><span style="color: red;"><?= @$erroy; ?><?= @$end; ?></span></li>
                              <li class="form-file--item" style="margin-top: 10px;"><?= @$image_no; ?><?= @$end_image_no; ?></li>
                           </ul>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                  </form>
               </div>
            </section>
         </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="js/script.js"></script>
   </body>
</html>
