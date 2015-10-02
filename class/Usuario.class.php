<?php

include_once 'BD.class.php';

class Usuario
{	
	private $nome;
	private $sobrenome;
	private $cpf;
	private $email;
	private $senha;
	private $username;
	private $bd;
	private $tabela;
	private $id;

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
        
        $sql = "INSERT INTO $this->tabela (name_exp, last_name, cpf, email, password, username) values 
        ('$this->nome','$this->sobrenome','$this->cpf', '$this->email','$this->senha', '$this->username')";
        
        echo $sql;
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
            $obj = new Usuario();
            $obj->id = $reg["id"];
            $obj->nome = $reg["nome"];
            $obj->sobrenome = $reg["sobrenome"];
            $obj->cpf = $reg["cpf"];
            $obj->email = $reg["email"];
            $obj->senha = $reg["senha"];
            $obj->username = $reg["username"];
            //adiciona a variavel de retorno
            $retorno[] = $obj;
        }
        return $retorno;
    }
	
    public function excluir() {
        
        $sql = "delete from $this->tabela where id = $this->id";
        $retorno = pg_query($sql);
        return $retorno;
    }

    public function atualizar() {
        $retorno = false;
        $sql = "update $this->tabela set name_exp ='$this->nome', last_name ='$this->sobrenome', cpf ='$this->cpf', email ='$this->email', password ='$this->senha', username ='$this->username' where
                       id = $this->id";
        $retorno = pg_query($sql);
        return $retorno;
    }

    public function retornarunico() {
        $sql = "Select * FROM $this->tabela where id=$this->id";

        $resultado = pg_query($sql);
        $retorno = NULL;

        $req = pg_fetch_assoc($resultado);
        if ($req == true) {
            $obj = new Usuario();
            $obj->id = $reg["id"];
            $obj->nome = $reg["nome"];
            $obj->sobrenome = $reg["sobrenome"];
            $obj->cpf = $reg["cpf"];
            $obj->email = $reg["email"];
            $obj->senha = $reg["senha"];
            $obj->username = $reg["username"];
            //adiciona a variavel de retorno
            $retorno[] = $obj;
        } else {
            $retorno = null;
        }

        return $retorno;
    }

}
?>