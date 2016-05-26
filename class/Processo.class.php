<?php

include_once 'Carrega.class.php';

class Processo
{

							//NOME NO BANCO
	private $num_processo;	//num_process - num_processo
	private $id_perito;			//id_expert - id_perito
	private $vara_trabalho;		//labour_stick - vara_trabalho
	private $nome_reclamado;	//name_claimed - nome_reclamado
	private $nome_reclamante;	//claimants_name - nome_reclamante
	private $horas_trabalhadas;	//worked_hours - horas_trabalhadas
	private $data_distribuicao;	//date_distribution - data_distribuicao
	private $data_admissao;    	//admission_date - data_admissao
	private $data_demissao; 		//resignation_date - data_demissao
	private $tipo_processo;		//type_process - tipo_processo
	private $quebra_semanal;	//weekly_break - quebra_semanal
	private $quebra_mensal;		//monthly_breakdown - quebra_mensal
	private $periodo_calculado;	//calculation_period - periodo_calculado
	private $id;								//id
	private $data_prescricao;  //prescription_date - data_prescricao
	private $bd;
	private $tabela;					//tabela


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

		if ($this->data_prescricao!=null && $this->data_demissao!=null)
		{
		$sql = "INSERT INTO $this->tabela (num_process, id_expert, labour_stick, name_claimed, claimants_name, worked_hours,
			 date_distribution, prescription_date, resignation_date, admission_date, type_process, weekly_break, monthly_breakdown,
			 calculation_period)
			 VALUES ('$this->num_processo', '$this->id_perito', '$this->vara_trabalho', '$this->nome_reclamado', '$this->nome_reclamante',
			 '$this->horas_trabalhadas', '$this->data_distribuicao','$this->data_prescricao','$this->data_demissao', '$this->data_admissao',
			 '$this->tipo_processo', '$this->quebra_semanal', '$this->quebra_mensal', '$this->periodo_calculado')";
		 }
		 	elseif ($this->data_prescricao==null && $this->data_demissao==null)
				 {

					 $sql = "INSERT INTO $this->tabela (num_process, id_expert, labour_stick, name_claimed, claimants_name, worked_hours,
			 			 date_distribution, prescription_date, resignation_date, admission_date, type_process, weekly_break, monthly_breakdown,
			 			 calculation_period)
			 			 VALUES ('$this->num_processo', '$this->id_perito', '$this->vara_trabalho', '$this->nome_reclamado', '$this->nome_reclamante',
			 			 '$this->horas_trabalhadas', '$this->data_distribuicao',NULL,NULL, '$this->data_admissao',
			 			 '$this->tipo_processo', '$this->quebra_semanal', '$this->quebra_mensal', '$this->periodo_calculado')";

				 }
				 elseif ($this->data_prescricao==null)
					 {
					 $sql = "INSERT INTO $this->tabela (num_process, id_expert, labour_stick, name_claimed, claimants_name, worked_hours,
						 date_distribution, prescription_date, resignation_date, admission_date, type_process, weekly_break, monthly_breakdown,
						 calculation_period)
						 VALUES ('$this->num_processo', '$this->id_perito', '$this->vara_trabalho', '$this->nome_reclamado', '$this->nome_reclamante',
						 '$this->horas_trabalhadas', '$this->data_distribuicao',NULL,'$this->data_demissao', '$this->data_admissao',
						 '$this->tipo_processo', '$this->quebra_semanal', '$this->quebra_mensal', '$this->periodo_calculado')";
					 }
					 elseif ($this->data_demissao==null)
						 {

							 $sql = "INSERT INTO $this->tabela (num_process, id_expert, labour_stick, name_claimed, claimants_name, worked_hours,
								 date_distribution, prescription_date, resignation_date, admission_date, type_process, weekly_break, monthly_breakdown,
								 calculation_period)
								 VALUES ('$this->num_processo', '$this->id_perito', '$this->vara_trabalho', '$this->nome_reclamado', '$this->nome_reclamante',
								 '$this->horas_trabalhadas', '$this->data_distribuicao','$this->data_prescricao',NULL, '$this->data_admissao',
								 '$this->tipo_processo', '$this->quebra_semanal', '$this->quebra_mensal', '$this->periodo_calculado')";

						 }

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
            $obj->id_perito = 		 	  $reg["id_expert"];
						$obj->num_processo  = 		$reg["num_process"];
            $obj->vara_trabalho = 	  $reg["labour_stick"];
            $obj->nome_reclamado = 	  $reg["name_claimed"];
            $obj->nome_reclamante =   $reg["claimants_name"];
            $obj->horas_trabalhadas = $reg["worked_hours"];
            $obj->data_distribuicao = $reg["date_distribution"];
						$obj->data_demissao = 		$reg["resignation_date"];
						$obj->data_admissao = 	  $reg["admission_date"];
            $obj->tipo_processo = 	  $reg["type_process"];
            $obj->quebra_semanal = 	  $reg["weekly_break"];
            $obj->quebra_mensal = 	  $reg["monthly_breakdown"];
            $obj->periodo_calculado = $reg["calculation_period"];
						$obj->data_prescricao = 	$reg["prescription_date"];
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
        claimants_name ='$this->nome_reclamante', worked_hours ='$this->horas_trabalhadas', date_distribution ='$this->data_distribuicao',
				resignation_date ='$this->data_demissao', admission_date ='$this->data_admissao', type_process ='$this->tipo_processo',
				weekly_break ='$this->quebra_semanal', monthly_breakdown ='$this->quebra_mensal', calculation_period ='$this->periodo_calculado',
				prescription_date = '$this->data_prescricao' where id = $this->id";
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
            $obj->id_perito = 		  	$reg["id_perito"];
						$obj->num_processo=       $reg["num_processo"];
            $obj->vara_trabalho = 	  $reg["vara_trabalho"];
            $obj->nome_reclamado = 	  $reg["nome_reclamado"];
            $obj->nome_reclamante =   $reg["nome_reclamante"];
            $obj->horas_trabalhadas = $reg["horas_trabalhadas"];
            $obj->data_distribuicao = $reg["data_distribuicao"];
						$obj->data_demissao = 		$reg["data_demissao"];
            $obj->data_admissao = 	  $reg["data_admissao"];
            $obj->tipo_processo = 	  $reg["tipo_processo"];
            $obj->quebra_semanal = 	  $reg["quebra_semanal"];
            $obj->quebra_mensal = 	  $reg["quebra_mensal"];
            $obj->periodo_calculado = $reg["periodo_calculado"];
						$obj->data_prescricao =		$reg["data_prescricao"];
            //adiciona a variavel de retorno
            $retorno[] = $obj;
        } else {
            $retorno = null;
        }

        return $retorno;
    }

		public function quantidade_dias($id_processo){ /*Calculo da diferença entre a data da admissão e a data da demissão*/
			$sql = "SELECT id, resignation_date, admission_date, resignation_date - admission_date AS quantidade_dias
			FROM $this->tabela WHERE id = $id_processo";
		 	$resultado = pg_query($sql);
			$linha = pg_fetch_array($resultado);
			$quantidade_dias = $linha['quantidade_dias'];

			if ($quantidade_dias > 1826) {
				$quantidade_dias = 1826;
			}
			return $quantidade_dias;
		}
}
 ?>
