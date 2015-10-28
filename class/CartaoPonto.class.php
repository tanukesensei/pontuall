<?php 

include_once 'BD.class.php';

class CartaoPonto 
{
									//NOME NO BANCO
	private $id	
	private $id_expert					//id_perito
	private $id_processo 				//id_process	
	private $data_dia					//date_day	
	private $entrada_manha				//morning_entry
	private $entrada_tarde				//late_entry
	private $entrada_noite				//night_entry
	private $descanso_diurno_trabalhado //daily_rest_worked
	private $saida_manha				//morning_departure
	private $saida_tarde				//afternoon_departure
	private $saida_noite				//night_departure
	private $descanso_noturno_trabalhado//nocturnal_rest_worked
	private $hora_extra_diurna			//extra_hour_daily1
	private $hora_extra_diurna2			//extra_hour_daily2
	private $hora_extra_diurna3			//extra_hour_daily3
	private $hora_extra_noturna			//night_overtime1
	private $hora_extra_noturna2		//night_overtime2
	private $hora_extra_noturna3		//night_overtime3
	private $hora_diaria_total			//total_daily_time
	private $situacao					//situation
	private $bd;
	private $tabela;

	public function __construct() {
		$this->bd = new BD();
		$this->tabela = "pointcards";
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
		$sql = "INSERT INTO $this->tabela (id_expert, id_process, date_day, morning_entry, late_entry, night_entry, daily_rest_worked,
		morning_departure, afternoon_departure, night_departure, nocturnal_rest_worked, extra_hour_daily1, extra_hour_daily2, extra_hour_daily3,
		night_overtime1, night_overtime2, night_overtime3, total_daily_time, situation) values ('$this->id_perito', '$this->id_processo',
		'$this->data_dia', '$this->entrada_manha', '$this->entrada_tarde', '$this->entrada_noite', '$this->descanso_diurno_trabalhado',
		'$this->saida_manha', '$this->saida_tarde', '$this->saida_noite', '$this->descanso_noturno_trabalhado', '$this->hora_extra_diurna', 
		'$this->hora_extra_diurna2', '$this->hora_extra_diurna3', '$this->hora_extra_noturna', '$this->hora_extra_noturna2',
		'$this->hora_extra_noturna3', '$this->hora_diaria_total','$this->situacao') ";

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
            $obj = new CartaoPonto();
            $obj->id = 							$reg["id"];
            $obj->id_perito = 		  			$reg["id_expert"];
            $obj->id_processo = 	  			$reg["id_process"];
            $obj->data_dia = 	  				$reg["date_day"];
            $obj->entrada_manha =   			$reg["morning_entry"];
            $obj->entrada_tarde = 				$reg["late_entry"];
            $obj->entrada_noite =      			$reg["night_entry"];
            $obj->descanso_diurno_trabalhado = 	$reg["daily_rest_worked"];
            $obj->saida_manha = 	  			$reg["morning_departure"];
            $obj->saida_tarde = 	  			$reg["afternoon_departure"];
            $obj->saida_noite = 	  			$reg["night_departure"];
            $obj->descanso_noturno_trabalhado = $reg["nocturnal_rest_worked"];
            $obj->hora_extra_diurna = 			$reg["extra_hour_daily1"];
            $obj->hora_extra_diurna2 = 			$reg["extra_hour_daily2"];
            $obj->hora_extra_diurna3 = 			$reg["extra_hour_daily3"];
            $obj->hora_extra_noturna = 			$reg["night_overtime1"];
            $obj->hora_extra_noturna2 = 		$reg["night_overtime2"];
            $obj->hora_extra_noturna3 = 		$reg["night_overtime3"];
            $obj->hora_diaria_total = 			$reg["total_daily_time"];
            $obj->situacao = 					$reg["situation"];
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
        $sql = "update $this->tabela set date_day ='$this->data_dia', morning_entry ='$this->entrada_manha', 
        late_entry ='$this->entrada_tarde', night_entry ='$this->entrada_noite', daily_rest_worked ='$this->descanso_diurno_trabalhado', 
        morning_departure ='$this->saida_manha', afternoon_departure ='$this->saida_tarde', night_departure ='$this->saida_noite', 
        nocturnal_rest_worked ='$this->descanso_noturno_trabalhado', extra_hour_daily1 ='$this->hora_extra_diurna', 
        extra_hour_daily2 ='$this->hora_extra_diurna2', extra_hour_daily3 ='$this->hora_extra_diurna3', 
        night_overtime1 ='$this->hora_extra_noturna', night_overtime2 ='$this->hora_extra_noturna2', night_overtime3 ='$this->hora_extra_noturna3',
        total_daily_time ='$this->hora_diaria_total', situation ='$this->situacao' where
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
            $obj = new CartaoPonto();
            $obj->id = $reg["id"];
            $obj->id =                          $reg["id"];
            $obj->id_perito =                   $reg["id_perito"];
            $obj->id_processo =                 $reg["id_processo"];
            $obj->data_dia =                    $reg["data_dia"];
            $obj->entrada_manha =               $reg["entrada_manha"];
            $obj->entrada_tarde =               $reg["entrada_tarde"];
            $obj->entrada_noite =               $reg["entrada_noite"];
            $obj->descanso_diurno_trabalhado =  $reg["descanso_diurno_trabalhado"];
            $obj->saida_manha =                 $reg["saida_manha"];
            $obj->saida_tarde =                 $reg["saida_tarde"];
            $obj->saida_noite =                 $reg["saida_noite"];
            $obj->descanso_noturno_trabalhado = $reg["descanso_noturno_trabalhado"];
            $obj->hora_extra_diurna =           $reg["hora_extra_diurna"];
            $obj->hora_extra_diurna2 =          $reg["hora_extra_diurna2"];
            $obj->hora_extra_diurna3 =          $reg["hora_extra_diurna3"];
            $obj->hora_extra_noturna =          $reg["hora_extra_noturna"];
            $obj->hora_extra_noturna2 =         $reg["hora_extra_noturna2"];
            $obj->hora_extra_noturna3 =         $reg["hora_extra_noturna3"];
            $obj->hora_diaria_total =           $reg["hora_diaria_total"];
            $obj->situacao =                    $reg["situacao"];
            //adiciona a variavel de retorno
            $retorno[] = $obj;
        } else {
            $retorno = null;
        }

        return $retorno;
    }

}
?>