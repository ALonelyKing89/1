  <?
  $url = $_SERVER['REQUEST_URI'];

  $url = explode('?', $url);

  $url = $url[0];

  if ((!$_SESSION["login"]) && ($url == '/')) {
    header('Location: login.php');
  }

  ?>

  <nav class="navbar sticky-top badge-light">
    <div class="container">
      <a class="navbar-brand" href="\">
        <img src="logo.png" alt="" width="40">
      </a>
      <form class="d-flex btn-group" role="search">
        <?
        if (isset($_SESSION["login"])) {
          if ($_SESSION["adm"] == 1) {
            echo '<a href="Acabinet.php" class="btn btn-info text-white">Админка</a>';
          } else {
            echo '<a href="Ucabinet.php" class="btn btn-info text-white">Профиль</a>';
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