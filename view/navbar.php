<nav class="navbar navbar-expand-lg navbar-color">
    <a class="navbar-brand" href="#"><h2 class="navbar-logo h4" ><i class="fa fa-lock"></i> LockInfo</h2></a>
    <button class="navbar-toggler button-icon" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link navbar-link" href="index.php">Cadastro</a>
        </li>
        <li class="nav-item">
          <a <?php  if((isset($_SESSION['cont'])) && ($_SESSION['cont'] > 0) ){echo 'class="nav-link navbar-link"';}
            else{
              echo 'class="nav-link navbar-link disabled"';
            }
          ?>  

          href="pessoas.php">Pessoas</a>
        </li>
      </ul>
    </div>
  </nav>