<?php

include_once 'BD.class.php';

class Usuario
{
	private $id;
	private $nome;
	private $sobrenome;
	private $cpf;
	private $email;
	private $senha;
	private $username;
	private $bd;
	private $tabela;


	public function __construct() {
        $this->bd = new BD();
        $this->tabela = "users";
    }
    public function __destruct() {
        unset($this->bd);
    }

    public function __get($key) {
        return $this->$key;
    }

    //método de retorno de valores do objeto
    public function __set($key, $value) {
        $this->$key = $value;
    }

    //METODOS
    //BANCO DE DADOS
    public function inserir() {
        $sql = "INSERT INTO $this->tabela (name_exp, last_name, cpf, email, password, username) VALUES
        ('$this->nome','$this->sobrenome','$this->cpf', '$this->email','$this->senha', '$this->username')";

        $retorno = pg_query($sql);
        return $retorno;
    }

    public function listar($complemento = "") {
        $sql = "SELECT * FROM $this->tabela ".
                $complemento;

        $resultado = pg_query($sql);
        $retorno = NULL;
        //percorre os registros
        while ($reg = pg_fetch_assoc($resultado)) {
            //transforma em objetos categoria
            $obj            = new Usuario();
            $obj->id        = $reg["id"];
            $obj->nome      = $reg["name_exp"];
            $obj->sobrenome = $reg["last_name"];
            $obj->cpf       = $reg["cpf"];
            $obj->email     = $reg["email"];
            $obj->senha     = $reg["password"];
            $obj->username  = $reg["username"];
            //adiciona a variavel de retorno
            $retorno[]      = $obj;
        }
        return $retorno;
    }

    public function excluir() {

        $sql = "delete from $this->tabela where id = $this->id";
        $retorno = pg_query($sql);
        return $retorno;
    }

    public function atualizar() {
        $retorno  = false;
        $sql      = "update $this->tabela set name_exp ='$this->nome',
				last_name ='$this->sobrenome',
				cpf       ='$this->cpf',
				email     ='$this->email',
				password  ='$this->senha',
				username  ='$this->username' where
				id        = $this->id";
        $retorno  = pg_query($sql);
        return $retorno;
    }

    public function retornarunico($id="") {
        $sql = "SELECT * FROM $this->tabela WHERE id=$id";

        $resultado = pg_query($sql);
        $retorno = NULL;

				while ($reg = pg_fetch_assoc($resultado))
				{
					$obj            = new Usuario();
					$obj->id        = $reg["id"];
					$obj->nome      = $reg["name_exp"];
					$obj->sobrenome = $reg["last_name"];
					$obj->cpf       = $reg["cpf"];
					$obj->email     = $reg["email"];
					$obj->senha     = $reg["password"];
					$obj->username  = $reg["username"];
					//adiciona a variavel de retorno
					$retorno[]      = $obj;
				}
				return $retorno;
    }

	public function editar($id)
	{
		$sql = "SELECT * FROM $this->tabela WHERE id = $id";
		$result = pg_query($sql);

		while ($reg = pg_fetch_assoc($result))
		{
			$obj            = new Usuario();
			$obj->id        = $reg["id"];
			$obj->nome      = $reg["name_exp"];
			$obj->sobrenome = $reg["last_name"];
			$obj->cpf       = $reg["cpf"];
			$obj->email     = $reg["email"];
			$obj->senha     = $reg["password"];
			$obj->username  = $reg["username"];
			//adiciona a variavel de retorno
			$retorno     = $obj;
		}
		return $retorno;
	}

	public function login($login='', $senha='')
	{
		$sql = "SELECT * FROM $this->tabela WHERE username = '$login' AND password = '$senha' ";
		$resultado = pg_query($sql);
		$user = pg_num_rows($resultado);

		if ($user == 1) {
			session_start();

			while ($reg = pg_fetch_assoc($resultado)) {
				$_SESSION['id']        = $reg["id"];
				$_SESSION['nome']      = $reg["name_exp"];
				$_SESSION['sobrenome'] = $reg["last_name"];
				$_SESSION['cpf']       = $reg["cpf"];
				$_SESSION['email']     = $reg["email"];
				$_SESSION['senha']     = $reg["password"];
				$_SESSION['username']  = $reg["username"];
			}
		}
		return $_SESSION;
	}

}
?>
