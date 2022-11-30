  <nav class="navbar sticky-top badge-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="\">
        <img src="logo.png" alt="" width="40" >
        гниды
      </a>
      <form class="d-flex" role="search">
      <?
        if($_SERVER['REQUEST_URI'] == '/'){
      ?>          
        <a href="login.php" class="btn btn-info">вход</a>
        <a href="register.php" class="btn btn-outline-info">регистрация</a>
      <?
        };
        if($_SERVER['REQUEST_URI'] !== '/' || $_SERVER['REQUEST_URI'] !== 'login' || $_SERVER['REQUEST_URI'] !== '/'){
      ?>          
        <a href="login.php" class="btn btn-info">выход</a>
      <? 
        };
      ?>
      </form>
    </div>
  </nav>

