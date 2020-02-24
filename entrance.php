<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'db.php';
require_once 'functions.php';
if (!empty($_GET)) {
    // записываем в переменную значение get
    $stok = htmlspecialchars(@$_REQUEST['name']);
    // получаем массив зарегистрированных пользователей
    $users = search_user();
    // возращаем массив из знач. name массива $users
    $users_name = array_column($users, 'name');
    // проверяем существует ли в массиве имя
    $name = in_array($stok, $users_name, true);
    // выбираем массив с именем зарегистрированным пользователем
    $pas = search_pas($stok);
    // ищем ключ массива
    $key = key($pas);
    // проверяем если не существует  имя то
    if (!$name) {
        $name_user_erroy = '<p class="nameErroy" style="font-size: 18px; color: red;">' . $stok . ' чтобы комментировать, пожалуйста зарегистрируйтесь. <a href="user.php">Перейти к регистрации.</a></p>';
    } elseif (!password_verify($_GET['password'], $pas[$key]['password'])) {
        // проверяем пароль пользователя с введённым, если не совподает, то
        $password_user_erroy =  '<p class="nameErroy" style="font-size: 18px; color: red;">Не верный пароль</p>';
        $end_password = '<a href="entrance.php" class="end-user">&times;</a>';
    } else {
        header("Location: index.php?name={$stok}");
        exit;
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
      <title>вход</title>
   </head>
   <body>
         <div class="container">
            <section class="entrance comments">
               <div class="form-wrapper">
                  <div class="title">
                     <h2>Вход</h2>
                  </div>
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Комментарии</a></li>
                           <li class="breadcrumb-item"><a href="user.php">Регистрация</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Вход</li>
                        </ol>
                  </nav>
                  <form action="" method="get" class="needs-validation" novalidate>
                     <div class="form-row">
                       <?php $value = isset($stok) ? $stok : ''; ?>
                        <div class="col-md-4 mb-3">
                           <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Ваше имя" value="<?= @$stok; ?>" required>
                           <div class="valid-feedback">
                              Имя указано!
                           </div>
                           <div class="invalid-feedback">
                              Вы не указали ваше имя.
                           </div>
                        </div>
                        <?= @$name_user_erroy; ?>
                     </div>
                     <div class="form-row" style="margin-top: 15px;">
                        <div class="col-md-4 mb-3">
                        <input type="password" class="form-control" id="validationCustom02" name="password" placeholder="Пароль" required>
                        <div class="valid-feedback">
                           Пароль указан!
                        </div>
                        <div class="invalid-feedback">
                           Вы не указали ваш пароль!
                        </div>
                        </div>
                      </div>
                      <div class="form-item" style="margin-top: 10px;"><span style="color: red;"><?= @$password_user_erroy; ?><?= @$end_password; ?></span></div>
                     <button type="submit" class="btn btn-success">войти</button>
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
