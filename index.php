<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'db.php';
require_once 'functions.php';

    // записываем в переменную значение post
    $stok = htmlspecialchars(@$_REQUEST['name']);
    // получаем массив зарегистрированных пользователей
    $users = search_user();

if (!empty($_GET)) {
    $name_user = '<p style="color: green;">Добро пожаловать: <span style="font-size: 18px; font-weight: bold;">' . $stok . '</span></p>';
    $submit_comm = '<button type="submit" class="btn btn-success">Отправить</button>';
}

if (!empty($_POST)) {
    // находим ключ активного элемента массива $users
    $key_user = @array_search($stok, @array_column($users, 'name'));
    // создаём массив $_POST
    $_POST['id'] = $key_user;
    $_POST['users_id'] = $users[$_POST['id']]['id'];
    $_POST['name_user'] = $stok;
    $_POST['image_user'] = $users[$_POST['id']]['image'];
    // записываем данные в БД
    save_mess();
    
    header("Location: index.php?name={$stok}");
    exit;
}
$messanges = get_mess(); // выводим массив
$sum = count(get_sum()); // колличество комментариев
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
      <title>Комментарии</title>
   </head>
   <body>
         <div class="container">
            <section class="comments">
               <div class="form-wrapper">
                  <div class="title">
                     <h2>Комментарии</h2>
                  </div>
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item active" aria-current="page">Комментарии</li>
                           <li class="breadcrumb-item"><a href="user.php">Регистрация</a></li>
                           <li class="breadcrumb-item"><a href="entrance.php">Вход</a></li>
                        </ol>
                  </nav>
                  <!--Блок формы комментарий-->
                  <form  action="" method="post" class="needs-validation" novalidate>
                     <fieldset class="commentForm">
                        <legend>
                           <p class="title-sum">Комментарии</p>
                           <p class="sum"><?= $sum; ?></p>
                        </legend>
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <textarea class="form-control" id="validationCustom02" name="comment" rows="2" placeholder="Ваш комментарий" required></textarea>
                              <div class="valid-feedback">
                                 Текст написан!
                              </div>
                              <div class="invalid-feedback">
                                 Вы не написали текст.
                              </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <p>Чтобы комментировать: <a href="user.php">Зарегистрироваться</a> или <a href="entrance.php">
                                 Войти
                                 </a>
                              </p>
                           </div>
                        </div>
                        <?= @$name_user; ?>
                        <?= @$submit_comm; ?>
                     </fieldset>
                  </form>
               </div>
               <!--Блок показа комментарий-->
               <div class="title title-mess">
                  <h3>Последние 20 комментарий</h3>
               </div>
               <div class="wrapper">
                  <?php if (isset($messanges)): ?>
                  <?php foreach ($messanges as $messange): ?>
                  <div class="card-wrapper">
                     <div class="card-image">
                        <img src="img/<?= htmlspecialchars($messange['image_user']); ?>" alt="">
                     </div>
                     <div class="card message">
                        <div class="card-header text-muted">
                           <p class="text-weight"><?= htmlspecialchars($messange['name_user']); ?></p>
                           <p class="text-weight data"><?= $messange['data']; ?></p>
                        </div>
                        <div class="card-body">
                           <?= nl2br(htmlspecialchars($messange['comment'])); ?>
                        </div>
                     </div>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
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
