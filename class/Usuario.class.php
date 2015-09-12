<?php 
include_once 'BD.class.php';


class Usuario
{	
	private $nome;
	private $sobrenome;
	private $cpf;
	public $email;
	public $senha;
	public $username;
	protected $BD;

	function __construct(){
		$this->BD = new BD();
	}


	 public function cadastro($nome, $sobrenome, $cpf, $email, $username, $senha)
	{	
		$this->nome 	 = $nome;
		$this->sobrenome = $sobrenome;
		$this->cpf 		 = $cpf;
		$this->email 	 = $email;
		$this->senha 	 = $senha;
		$this->username	 = $username;

		$result = $BD->pg_query("INSERT INTO users (name_exp, last_name, cpf, email, password, username)
			VALUES ('$nome, $sobrenome, $cpf, $email, $senha, $username')");
		if (isset($result)) {
			echo "Usuario cadastrado com sucesso.";
		} else {
			echo "erro ao cadastrar.";
		}
	}

	public function login($login, $senha)
	{
		$this->login = $login;
		$this->senha = $senha;

		$verify = $DB->query("SELECT name_exp, password FROM users");

		if ($verify) {
			foreach ($verify as $row) {
				$verify['name_exp'] == $login;
				$verify['password'] == $senha;
			}
		} else {
			echo "Login ou senha inválidos, por favor tente novamente mais tarde";
		}
	}

}

 ?>