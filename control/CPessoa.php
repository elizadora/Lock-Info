<?php
session_start();
require_once("../model/MPessoa.php");

class CPessoa{
	private $m_pessoa;
	//inicializando o construtor com o objeto da classe MPessoa
	function __construct(){
		$this->m_pessoa = new MPessoa(0,0,"");
	}
	//Função de inserir
	public function AddPessoa($cpf,$nome){
		$this->m_pessoa->SetCPF($cpf);
		$this->m_pessoa->SetNome($nome);
		//verificação para ver se o objeto foi preenchido
		if((!empty($this->m_pessoa->GetCPF())) && (!empty($this->m_pessoa->GetNome()))){
			$_SESSION['cod'][] = $_SESSION['gerador_cod'];
			$_SESSION['nome'][] = $this->m_pessoa->GetNome();
			$_SESSION['cpf'][] = $this->m_pessoa->GetCPF();
			return true;
		}else{
			return false;
		}
	}

	public function EditPessoa($cod,$cpf,$nome){
		$this->m_pessoa->SetId($cod);
		$this->m_pessoa->SetCPF($cpf);
		$this->m_pessoa->SetNome($nome);
		$valor = array_search($this->m_pessoa->GetId(), $_SESSION['cod']);
		$_SESSION['cpf'][$valor] = $this->m_pessoa->GetCPF();
		$_SESSION['nome'][$valor] = $this->m_pessoa->GetNome();
		if(($_SESSION['cpf'][$valor] == $this->m_pessoa->GetCPF()) && ($_SESSION['nome'][$valor]) == $this->m_pessoa->GetNome()){
			return true;
		}else{
			return false;
		}
	}
	
	public function DelPessoa($id){
		$this->m_pessoa->SetId($id);
		$valor = array_search($this->m_pessoa->GetId(), $_SESSION['cod']);
		unset($_SESSION['cod'][$valor], $_SESSION['nome'][$valor], $_SESSION['cpf'][$valor]);
		if(!(array_key_exists($valor, $_SESSION['cod']))){
			return true;
		}else{
			return false;
		}
	}
	public function SearPessoa($pesquisa)
	{
		$this->m_pessoa->SetNome($pesquisa);
		$pesquisa = $this->m_pessoa->GetNome();
		echo $pesquisa;
		for ($j=0; $j < $_SESSION['cont'] ; $j++) { 
			$palavra = str_split($_SESSION['nome'][$j],strlen($pesquisa));
			// var_dump($palavra);
			for ($i=0; $i < count($palavra); $i++) {
				if(utf8_decode(strtolower($pesquisa)) === utf8_decode(strtolower($palavra[$i]))){
					$arr[] = array_search($_SESSION['nome'][$j], $_SESSION['nome']);
					continue 2;
				}
			}
		}
		if(isset($arr)){
			return $arr;
		}else{
			return false;
		}
	}

}
?>