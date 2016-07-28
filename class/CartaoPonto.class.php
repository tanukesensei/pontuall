<?php

include_once 'BD.class.php';

class CartaoPonto
{
									//NOME NO BANCO
	private $id;					//id do cartão ponto
	private $id_perito;					//id_expert
	private $id_processo; 				//id_process
	private $data_dia;					//date_day
	private $entrada_manha;				//morning_entry
	private $saida_manha;				//morning_departure
	private $entrada_tarde;				//late_entry
	private $saida_tarde;				//afternoon_departure
	private $entrada_noite;				//night_entry
	private $saida_noite;				//night_departure
	private $descanso_diurno_trabalhado; //daily_rest_worked
	private $descanso_noturno_trabalhado;//nocturnal_rest_worked
	private $situacao;					//situation
	private $hora_extra_diurna;			//extra_hour_daily1
	private $hora_extra_diurna2;			//extra_hour_daily2
	private $hora_extra_diurna3;			//extra_hour_daily3
	private $hora_extra_noturna;			//night_overtime1
	private $hora_extra_noturna2;		//night_overtime2
	private $hora_extra_noturna3;		//night_overtime3
	private $hora_diaria_total;			//total_daily_time
	private $bd;
	private $tabela;

	public function __construct() {
		$this->bd     = new BD();
		$this->tabela = "pointcards";
	}

	public function __destruct() {
		unset($this->bd);
	}

	public function __get($key) {
		return $this->$key;
	}

	public function __set($key, $value) {
		$this->$key   = $value;
	}

	//METODOS DO BANCO DE DADOS
	public function inserir() {
		$sql     = "INSERT INTO $this->tabela (id_expert, id_process, date_day, morning_entry, morning_departure, late_entry,
			afternoon_departure, night_entry, night_departure, daily_rest_worked, nocturnal_rest_worked, situation, extra_hour_daily1,
			extra_hour_daily2, extra_hour_daily3, night_overtime1, night_overtime2, night_overtime3, total_daily_time
			) values ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19) ";
/*
Deus Esteve aqui e revisou meu código.
*/
echo $sql;

		$retorno = pg_query_params($sql, array(
			$this->id_perito ?: null,
			$this->id_processo ?: null,
			$this->data_dia ?: null,
			$this->entrada_manha ?: null,
			$this->saida_manha ?: null,
			$this->entrada_tarde ?: null,
			$this->saida_tarde ?: null,
			$this->entrada_noite ?: null,
			$this->saida_noite ?: null,
			$this->descanso_diurno_trabalhado ?: null,
			$this->descanso_noturno_trabalhado ?: null,
			$this->situacao ?: null,
			$this->hora_extra_diurna ?: null,
			$this->hora_extra_diurna2 ?: null,
			$this->hora_extra_diurna3 ?: null,
			$this->hora_extra_noturna ?: null,
			$this->hora_extra_noturna2 ?: null,
			$this->hora_extra_noturna3 ?: null,
			$this->hora_diaria_total ?: null,
		));
		return $retorno;
	}


	public function listar($complemento         = "") {
        $sql                                  = "SELECT * FROM $this->tabela ".
                $complemento;

        $resultado                            = pg_query($sql);
        $retorno                              = NULL;
        //percorre os registros
        while ($reg                           = pg_fetch_assoc($resultado)) {
            //transforma em objetos categoria
            $obj                              = new CartaoPonto();
            $obj->id                          = 							$reg["id"];
            $obj->id_perito                   = 		 			$reg["id_expert"];
            $obj->id_processo                 = 	 			$reg["id_process"];
            $obj->data_dia                    = 	 				$reg["date_day"];
            $obj->entrada_manha               = 			$reg["morning_entry"];
            $obj->entrada_tarde               = 				$reg["late_entry"];
            $obj->entrada_noite               = 			$reg["night_entry"];
            $obj->descanso_diurno_trabalhado  = 	$reg["daily_rest_worked"];
            $obj->saida_manha                 = 	 			$reg["morning_departure"];
            $obj->saida_tarde                 = 	 			$reg["afternoon_departure"];
            $obj->saida_noite                 = 	 			$reg["night_departure"];
            $obj->descanso_noturno_trabalhado = $reg["nocturnal_rest_worked"];
            $obj->hora_extra_diurna           = 			$reg["extra_hour_daily1"];
            $obj->hora_extra_diurna2          = 			$reg["extra_hour_daily2"];
            $obj->hora_extra_diurna3          = 			$reg["extra_hour_daily3"];
            $obj->hora_extra_noturna          = 			$reg["night_overtime1"];
            $obj->hora_extra_noturna2         = 		$reg["night_overtime2"];
            $obj->hora_extra_noturna3         = 		$reg["night_overtime3"];
            $obj->hora_diaria_total           = 			$reg["total_daily_time"];
						$obj->situacao                    = 					$reg["situation"];
            //adiciona a variavel de retorno
            $retorno[]                        = $obj;
        }
        return $retorno;
    }

    public function excluir() {

        $sql     = "delete from $this->tabela where id = $this->id";
        $retorno = pg_query($sql);
        return $retorno;
    }

    public function atualizar() {
        $retorno              = false;
        $sql                  = "update $this->tabela set date_day ='$this->data_dia', morning_entry ='$this->entrada_manha',
        late_entry            ='$this->entrada_tarde', night_entry ='$this->entrada_noite', daily_rest_worked ='$this->descanso_diurno_trabalhado',
        morning_departure     ='$this->saida_manha', afternoon_departure ='$this->saida_tarde', night_departure ='$this->saida_noite',
        nocturnal_rest_worked ='$this->descanso_noturno_trabalhado', extra_hour_daily1 ='$this->hora_extra_diurna',
        extra_hour_daily2     ='$this->hora_extra_diurna2', extra_hour_daily3 ='$this->hora_extra_diurna3',
        night_overtime1       ='$this->hora_extra_noturna', night_overtime2 ='$this->hora_extra_noturna2', night_overtime3 ='$this->hora_extra_noturna3',
        total_daily_time      ='$this->hora_diaria_total', situation ='$this->situacao' where
                       id     = $this->id";
        $retorno              = pg_query($sql);
        return $retorno;
    }

    public function retornarunico() {
        $sql                                  = "SELECT * FROM $this->tabela WHERE id = $this->id";


        $resultado                            = pg_query($sql);
        $retorno                              = NULL;

        $reg                                  = pg_fetch_assoc($resultado);
        if ($reg                              == true) {
            $obj                              = new CartaoPonto();
						$obj->id                          = 							$reg["id"];
						$obj->id_perito                   = 		 			$reg["id_expert"];
						$obj->id_processo                 = 	 			$reg["id_process"];
						$obj->data_dia                    = 	 				$reg["date_day"];
						$obj->entrada_manha               = 			$reg["morning_entry"];
						$obj->entrada_tarde               = 				$reg["late_entry"];
						$obj->entrada_noite               = 			$reg["night_entry"];
						$obj->descanso_diurno_trabalhado  = 	$reg["daily_rest_worked"];
						$obj->saida_manha                 = 	 			$reg["morning_departure"];
						$obj->saida_tarde                 = 	 			$reg["afternoon_departure"];
						$obj->saida_noite                 = 	 			$reg["night_departure"];
						$obj->descanso_noturno_trabalhado = $reg["nocturnal_rest_worked"];
						$obj->hora_extra_diurna           = 			$reg["extra_hour_daily1"];
						$obj->hora_extra_diurna2          = 			$reg["extra_hour_daily2"];
						$obj->hora_extra_diurna3          = 			$reg["extra_hour_daily3"];
						$obj->hora_extra_noturna          = 			$reg["night_overtime1"];
						$obj->hora_extra_noturna2         = 		$reg["night_overtime2"];
						$obj->hora_extra_noturna3         = 		$reg["night_overtime3"];
						$obj->hora_diaria_total           = 			$reg["total_daily_time"];
						$obj->situacao                    = 					$reg["situation"];
            //adiciona a variavel de retorno
            $retorno[]                        = $obj;
        } else {
            $retorno                          = null;
        }

        return $retorno;
    }

		public function somaHoras($id_processo) {

			$sql = "SELECT morning_entry AS a, morning_departure AS b, late_entry AS c, afternoon_departure AS d, night_entry AS e,
			night_departure AS f, daily_rest_worked AS g, nocturnal_rest_worked AS h FROM $this->tabela WHERE id_process = $id_processo";
			$resultado = pg_query($sql);

			$somaSegundos = 0;
			while ($row = pg_fetch_assoc($resultado)){
				$objCartaoPonto = new CartaoPonto();
				$somaSegundos += $objCartaoPonto->calculaTempo($row['a'], $row['b']) + $objCartaoPonto->calculaTempo($row['c'], $row['d']) +
				$objCartaoPonto->calculaTempo($row['e'], $row['f']) + $objCartaoPonto->calculaTempo($row['g'], $row['h']);
			}
			return $objCartaoPonto->formataHora($somaSegundos);
		}

			function calculaTempo($hora_inicial, $hora_final){
				if ($hora_inicial==NULL && $hora_final==NULL) {
					return 0;
				}

				$i = 1;
				$tempo_total = array();

				$tempos = array($hora_final, $hora_inicial);

				foreach($tempos as $tempo) {

					$segundos = 0;

					list($h, $m, $s) = explode(':', $tempo);

					$segundos += $h * 3600;
					$segundos += $m * 60;
					$segundos += $s;

					$tempo_total[$i] = $segundos;

					$i++;
				}
				$segundos = $tempo_total[1] - $tempo_total[2];
				return $segundos;

			}

			function formataHora($segundos) {
				$horas = floor($segundos / 3600);
				$segundos -= $horas * 3600;
				$minutos = str_pad((floor($segundos / 60)), 2, '0', STR_PAD_LEFT);
				$segundos -= $minutos * 60;
				$segundos = str_pad($segundos, 2, '0', STR_PAD_LEFT);

				return "$horas:$minutos:$segundos";
			}

			public function buscarCartaoPonto($id_processo){
				$sql = "SELECT * FROM $this->tabela WHERE id_process = $id_processo";
				$resultado = pg_query($sql);
				return $resultado;
							}


}
?>
