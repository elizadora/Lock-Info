<?php
require_once("CPessoa.php");
$acao = $_GET['acao'];
$c_pessoa = new CPessoa();
switch ($acao) {
	//add
	case 1:
	//verificando se os valores enviados não estão vazios
	if ((!empty($_POST['cpf'])) && (!empty($_POST['nome']))) {
		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$_SESSION['cont']++;
		$_SESSION['gerador_cod']++;
		$result= $c_pessoa->AddPessoa($cpf,$nome);
		if($result == true){
			$_SESSION['message'] ='<div class="toast message-success" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="5000" id="message">
			<div class="toast-body">
			<strong><i class="fa fa-lg fa-check-circle"></i></strong> Ususário cadastrado com sucesso.
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			</div>';

		}else{
			$_SESSION['message'] ='<div class="toast message-danger" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="5000" id="message">
			<div class="toast-body">
			<strong><i class="fa fa-lg fa-times-circle"></i></strong> Erro ao cadastrar ususário.
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			</div>';
		}

	}else{
		$_SESSION['message'] = '<div class="toast message-warning" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="5000" id="message">
		<div class="toast-body">
		<strong><i class="fa fa-lg fa-exclamation-circle"></i></strong> Preencha todos os campos!
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		</div>';

	}
	header("Location:../index.php");
	break;
	
	case 2:
	//deletar valor especifico
	$key = $_GET['key'];
	$result = $c_pessoa->DelPessoa($key);
	if($result == true){
		$_SESSION['cont']--;
		$_SESSION['message'] = '<div class="toast message-success" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="5000" id="message">
		<div class="toast-body">
		<strong><i class="fa fa-lg fa-check-circle"></i></strong> Ususário apagado com sucesso.
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		</div>';
	}else{
		$_SESSION['message'] ='<div class="toast message-danger" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="5000" id="message">
		<div class="toast-body">
		<strong><i class="fa fa-lg fa-times-circle"></i></strong> Erro ao excluir ususário.
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		</div>';
	}
	
	header("Location:../view/pessoas.php");
	break;

	//editando
	case 3:
	$id = $_POST['id'];
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome'];
	$result = $c_pessoa->EditPessoa($id,$cpf,$nome);
	if($result == true){
		$_SESSION['message'] = '<div class="toast message-success" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="5000" id="message">
		<div class="toast-body">
		<strong><i class="fa fa-lg fa-check-circle"></i></strong> Ususário editado com sucesso.
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		</div>';
	}
	header("Location:../view/pessoas.php");
	break;

	case 4:
	if(!empty($_POST['pesquisa'])){
		$pesquisa = $_POST['pesquisa'];
		$result = $c_pessoa->SearPessoa($pesquisa);
		if($result == false){
			$_SESSION['message'] = '<div class="toast message-warning" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="5000" id="message">
			<div class="toast-body">
			<strong><i class="fa fa-lg fa-exclamation-circle"></i></strong> Ususário não encontrado!
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			</div>';
		}else{
			$_SESSION['result'] = $result;
		}
	}
	header("Location:../view/pessoas.php");
	break;
	
	//delete todos os dados
	case 5:
	session_destroy();
	header("Location:../index.php");
	break;
}
?>