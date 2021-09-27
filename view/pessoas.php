<?php
session_start();
if ((!isset($_SESSION['cont'])) || ($_SESSION['cont'] == 0)) {
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Font Awesome  -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
  <!-- Style CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>LockInfo</title>
</head>
<body>
  <!-- Navbar -->
  <?php include("navbar.php")?>
  <!-- Navbar -->
  <!-- Message -->
  <div aria-live="polite" aria-atomic="true" style="position: relative; z-index: 10;">
   <div style="position: absolute; top: 0; right: 0;">
    <?php
    if(isset($_SESSION['message'])){
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
    
    ?>
  </div>
</div>
<!-- Message -->
<div class="py-5" style="z-index: 1;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 custom-card">
        <div class="col-12 p-5">
          <div class="text-center">
            <h3 class="mb-5 font-weight-light">Pessoas</h3>
          </div>
          <!-- Form eddit start -->
          <form method="POST" action="../control/rotas.php?acao=3">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">CPF:</label>
                <input type="hidden" name="id" id="id">
                <input type="text" class="form-control" id="cpf" disabled="true" name="cpf" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Nome:</label>
                <input type="text" class="form-control" id="nome" disabled="true" name="nome" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" disabled="true" id="alteracao">Salvar</button>
          </form>
          <!-- Form eddit end -->
        </div>
        <!-- search start -->
        <div class="col-12 table-responsive py-5 text-center">
         <form action="../control/rotas.php?acao=4" class="form-inline justify-content-center mb-2" method="POST">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nome"name="pesquisa">
          </div>
          <button type="submit" class="btn btn-success" ><i class="fa fa-search"></i></button>
        </form>
        <form action="#" class="form-inline justify-content-end mb-3">
          <div class="form-group">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#limpar_dados">Zerar Tabela</button>
          </div>
        </form>
        <!-- search end -->
        <table class="table table-striped table-bordered text-center" id="tabela">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($_SESSION['result'])){
              for ($i=0; $i < count($_SESSION['result']) ; $i++) { 
                if (array_key_exists($_SESSION['result'][$i], $_SESSION['cod'])) {
                  $pos = $_SESSION['result'][$i];
                  ?>
                  <tr>
                    <th><?php echo $_SESSION['cod'][$pos]?></th>
                    <td><?php echo $_SESSION['nome'][$pos]?></td>
                    <td><?php echo $_SESSION['cpf'][$pos]?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-6 mt-1">
                          <a class="btn btn-danger btn-block mt-1" href="../control/rotas.php?acao=2&key=<?php echo $_SESSION['cod'][$pos]?>">Deletar</a>

                        </div>
                        <div class="col-md-6 mt-1">
                          <button type="button" class="btn btn-warning btn-block" id="editar">Editar</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php

                }
              }
              unset($_SESSION['result']);
            }else{
              foreach ($_SESSION['cod'] as $keys => $cod) {
                ?>
                <tr>
                  <th><?php echo $_SESSION['cod'][$keys]?></th>
                  <td><?php echo $_SESSION['nome'][$keys]?></td>
                  <td><?php echo $_SESSION['cpf'][$keys]?></td>
                  <td>
                    <div class="row">
                      <div class="col-md-6 mt-1">
                        <a class="btn btn-danger btn-block mt-1" href="../control/rotas.php?acao=2&key=<?php echo $_SESSION['cod'][$keys]?>">Deletar</a>

                      </div>
                      <div class="col-md-6 mt-1">
                        <button type="button" class="btn btn-warning btn-block" id="editar">Editar</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="limpar_dados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmete apagar todos os dados?
        <form method="POST" action="../control/rotas.php?acao=5" id="limpar">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-danger" form="limpar">Sim</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- <jQuery Mask -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <!-- My script -->
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>