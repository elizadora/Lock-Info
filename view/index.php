<?php
session_start();
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
  <!-- Start Navbar -->
  <?php include("navbar.php")?>
  <!-- End Navbar -->
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
<!-- Start Form_Cad -->
<div class="py-5" style="z-index: 1;">
  <div class="container-fluid">
    <div class="row">
      <!-- xm sm md lg -->
      <div class="col-10 offset-1 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2  rounded custom-form">
        <div class="row">
          <div class="col-md-6 img-cad text-center d-flex">
            <div class="mx-auto my-auto d-block text-white position-relavite">
              <h4 class="py-5"><i class="fa fa-4x fa-users"></i>
                <?php
                if ((isset($_SESSION['cont'])) && ($_SESSION['cont'] > 0)) { 
                  ?>
                  <span class="position-absolute badge badge-pill icon-navbar"><?php echo $_SESSION['cont']?></span>
                  <?php
                }

                ?>
                <h4>
                </div>
              </div>
              <div class="col-md-6 p-5">
                <div class="text-center">
                  <h3 class="mb-5 font-weight-light">Cadastro</h3>
                </div>
                <div class="p-1">
                  <form method="POST" action="../control/rotas.php?acao=1">
                    <div class="form-group">
                     <label for="exampleInputEmail1">CPF:</label>
                     <input type="text" class="form-control rounded-pill" name="cpf" id="cpf" placeholder="Ex: 111.111.111-11">
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Nome:</label>
                    <input type="text" class="form-control rounded-pill" name="nome" placeholder="Ex: João">
                  </div>
                  <div class="form-group mt-1">
                   <button type="submit" class="btn btn-cad btn-block rounded-pill">Cadastrar</button>
                   <button type="reset" class="btn btn-cad-outiline btn-block rounded-pill">Limpar campos</button> 
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- End Form_Cad -->

 
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- <jQuery Mask -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <!-- My script -->
  <script type="text/javascript">
   $(document).ready(function() {
    $("#cpf").mask("000.000.000-00");
    $("#message").toast("show");
  });
</script>
</body>
</html>