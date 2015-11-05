<?php

include_once 'BD.class.php';

class Processo
{

							//NOME NO BANCO
	private $num_processo;	//num_process
	private $id_perito;			//id_expert
	private $vara_trabalho;		//labour_stick
	private $nome_reclamado;	//name_claimed
	private $nome_reclamante;	//claimants_name
	private $horas_trabalhadas;	//worked_hours
	private $data_inicial;		//initial_date
	private $data_final;		//end_date
	private $data_admissao; 	//admission_date
	private $tipo_processo;		//type_process
	private $quebra_semanal;	//weekly_break;
	private $quebra_mensal;		//monthly_breakdown
	private $periodo_calculado;	//calculation_period
	private $id;					//id
	private $bd;
	private $tabela;


	public function __construct() {
		$this->bd = new BD();
		$this->tabela = "processes";
	}

	public function __destruct() {
		unset($this->bd);
	}

	public function __get($key) {
		return $this->$key;
	}

	public function __set($key, $value) {
		$this->$key = $value;
	}

	//METODOS DO BANCO DE DADOS
	public function inserir() {
		$sql = "INSERT INTO $this->tabela (num_process, id_expert, labour_stick, name_claimed, claimants_name, worked_hours,
			initial_date, end_date, admission_date, type_process, weekly_break, monthly_breakdown, calculation_period) values
			('$this->num_processo', '$this->id_perito', '$this->vara_trabalho', '$this->nome_reclamado', '$this->nome_reclamante',
			 '$this->horas_trabalhadas', '$this->data_inicial', '$this->data_final', '$this->data_admissao', '$this->tipo_processo',
			 '$this->quebra_semanal', '$this->quebra_mensal', '$this->periodo_calculado')";

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
            $obj = new Processo();
            $obj->id = $reg["id"];
            $obj->id_perito = 		  $reg["id_expert"];
            $obj->vara_trabalho = 	  $reg["labour_stick"];
            $obj->nome_reclamado = 	  $reg["name_claimed"];
            $obj->nome_reclamante =   $reg["claimants_name"];
            $obj->horas_trabalhadas = $reg["worked_hours"];
            $obj->data_inicial =      $reg["initial_date"];
            $obj->data_final = 		  $reg["end_date"];
            $obj->data_admissao = 	  $reg["admission_date"];
            $obj->tipo_processo = 	  $reg["type_process"];
            $obj->quebra_semanal = 	  $reg["weekly_break"];
            $obj->quebra_mensal = 	  $reg["monthly_breakdown"];
            $obj->periodo_calculado = $reg["calculation_period"];
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
        $sql = "update $this->tabela set labour_stick ='$this->vara_trabalho', name_claimed ='$this->nome_reclamado',
        claimants_name ='$this->nome_reclamante', worked_hours ='$this->horas_trabalhadas', initial_date ='$this->data_inicial',
        end_date ='$this->data_final', admission_date ='$this->data_admissao', type_process ='$this->tipo_processo',
        weekly_break ='$this->quebra_semanal', monthly_breakdown ='$this->quebra_mensal', calculation_period ='$this->periodo_calculado' where
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
            $obj = new Processo();
            $obj->id = $reg["id"];
            $obj->id_perito = 		  $reg["id_perito"];
            $obj->vara_trabalho = 	  $reg["vara_trabalho"];
            $obj->nome_reclamado = 	  $reg["nome_reclamado"];
            $obj->nome_reclamante =   $reg["nome_reclamante"];
            $obj->horas_trabalhadas = $reg["horas_trabalhadas"];
            $obj->data_inicial =      $reg["data_inicial"];
            $obj->data_final = 		  $reg["data_final"];
            $obj->data_admissao = 	  $reg["data_admissao"];
            $obj->tipo_processo = 	  $reg["tipo_processo"];
            $obj->quebra_semanal = 	  $reg["quebra_semanal"];
            $obj->quebra_mensal = 	  $reg["quebra_mensal"];
            $obj->periodo_calculado = $reg["periodo_calculado"];
            //adiciona a variavel de retorno
            $retorno[] = $obj;
        } else {
            $retorno = null;
        }

        return $retorno;
    }



}

 ?>
