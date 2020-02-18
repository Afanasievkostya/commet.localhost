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
      <header>
         <nav aria-label="breadcrumb">
            <div class="container">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Комментарии</a></li>
                  <li class="breadcrumb-item"><a href="user.php">Регистрация</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Вход</li>
               </ol>
            </div>
         </nav>
      </header>
      <main>
         <div class="container">
            <section class="entrance comments">
               <div class="form-wrapper">
                  <div class="title">
                     <h2>Вход</h2>
                     <p>Отработка функций</p>
                  </div>
                  <form action="index.php" method="get" class="needs-validation" novalidate>
                     <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Ваше имя" required>
                           <div class="valid-feedback">
                              Имя указано!
                           </div>
                           <div class="invalid-feedback">
                              Вы не указали ваше имя.
                           </div>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success">войти</button>
                  </form>
               </div>
            </section>
         </div>
      </main>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="js/script.js"></script>
   </body>
</html>