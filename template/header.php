  <?
  $url = $_SERVER['REQUEST_URI'];

  $url = explode('?', $url);

  $url = $url[0];

  if ((!$_SESSION["login"]) && ($url == '/')) {
    header('Location: login.php');
  }

  ?>

<<<<<<< Updated upstream
  <nav class="navbar sticky-top badge-light bg-light">
    <div class="container">
      <?
      if (isset($_SESSION["login"])) {
        echo '<a class="navbar-brand" href="\">
        <img src="logo.png" alt="" width="30">
      </a>';
      } else {
        echo '<a class="navbar-brand">
        <img src="logo.png" alt="" width="30">
      </a>';
      }
      ?>
=======
  <nav class="navbar sticky-top badge-light">
    <div class="container">
      <a class="navbar-brand" href="\">
        <img src="logo.png" alt="" width="40">
      </a>
>>>>>>> Stashed changes
      <form class="d-flex btn-group" role="search">
        <?
        if (isset($_SESSION["login"])) {
          if ($_SESSION["adm"] == 1) {
            echo '<a href="Acabinet.php" class="btn btn-info text-white">Админка</a>';
          } else {
<<<<<<< Updated upstream
            echo '<a href="Ucabinet.php" class="btn btn-info text-white">Профиль</a>';
=======
            echo '<a href="Ucabinet.php" class="btn btn-info text-white">Личный кабинет</a>';
>>>>>>> Stashed changes
          }
          echo '<a href="login.php" class="btn btn-danger">Выход</a>';
        } else {
          if ($url == '/register.php') {
            echo '<a href="login.php" class="btn btn-success">Вход</a>';
          };
          if ($url == '/login.php') {
            echo '<a href="register.php" class="btn btn btn-info text-white">Регистрация</a>';
          };
        }
        ?>
      </form>
    </div>
  </nav>