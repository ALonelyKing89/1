  <?
  $url = $_SERVER['REQUEST_URI'];

  $url = explode('?', $url);
  
  $url = $url[0];

  ?>
  
  <nav class="navbar sticky-top badge-light">
    <div class="container">
      <a class="navbar-brand" href="\">
        <img src="logo.png" alt="" width="40" >
      </a>
      <form class="d-flex" role="search">
      <?
        if (isset($_SESSION["login"])){
      ?>
          <a href="login.php" class="btn btn-info">выход</a>
      <?     
      }else{
        if ($url != '/login.php'){
      ?>          
        <a href="login.php" class="btn btn-outline-info">вход</a>
        <?  
        }
        if ($url != '/register.php'){
        ?> 
      <a href="register.php" class="btn btn-outline-info">регистрация</a>
      <?  
        }
      }
      ?> 
      </form>
    </div>
  </nav>

