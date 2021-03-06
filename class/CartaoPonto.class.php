<?php
ini_set('session.save_path', '../../tmp');
session_start();
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
	private $situacao;					//situation
	private $hora_diaria_total;			//total_daily_time//retirar essa linha daqui e do banco.
	private $bd;
	private $tabela;

/* NÃO EXCLUIR VARIÁREVEIS ABAIXO ATÉ O CRUD FUNCIONAR*/

	//private $descanso_diurno_trabalhado; //daily_rest_worked
	//private $descanso_noturno_trabalhado;//nocturnal_rest_worked
	//private $hora_extra_diurna;			//extra_hour_daily1 //retirar essa linha daqui e do banco.
	//private $hora_extra_diurna2;			//extra_hour_daily2 //retirar essa linha daqui e do banco.
	//private $hora_extra_diurna3;			//extra_hour_daily3//retirar essa linha daqui e do banco.
	//private $hora_extra_noturna;			//night_overtime1//retirar essa linha daqui e do banco.
	//private $hora_extra_noturna2;		//night_overtime2//retirar essa linha daqui e do banco.
	//private $hora_extra_noturna3;		//night_overtime3//retirar essa linha daqui e do banco.


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
			afternoon_departure, night_entry, night_departure, situation, total_daily_time) values ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11) ";
/*
Deus Esteve aqui e revisou meu código.
*/

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
			$this->situacao ?: null,
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
            $obj->saida_manha                 = 	 			$reg["morning_departure"];
            $obj->saida_tarde                 = 	 			$reg["afternoon_departure"];
            $obj->saida_noite                 = 	 			$reg["night_departure"];
						$obj->situacao                    = 					$reg["situation"];
						$obj->hora_diaria_total           = 			$reg["total_daily_time"];

            //adiciona a variavel de retorno
            $retorno[][]                      = $obj;
        }
        return $retorno;
    }

    public function excluir() {

        $sql     = "delete from $this->tabela where id = $this->id";
        $retorno = pg_query($sql);
        return $retorno;
    }

		public function atualizar() { #modificar essa parada maneiramente
			echo "Ret";
		    $retorno = true;
		    $sql = "update $this->tabela set
		    date_day = $1,
		    morning_entry = $2,
		    morning_departure = $3,
		    late_entry = $4,
		    afternoon_departure = $5,
		    night_entry = $6,
		    night_departure = $7,
		    situation = $8,
		    total_daily_time = $9,	where
		    id = $this->id";

		    $retorno = pg_query_params($sql, array(
		      $this->data_dia ?: null,
		      $this->entrada_manha ?: null,
		      $this->saida_manha ?: null,
		      $this->entrada_tarde ?: null,
		      $this->saida_tarde ?: null,
		      $this->entrada_noite ?: null,
		      $this->saida_noite ?: null,
		      $this->situacao ?: null,
		      $this->hora_diaria_total  ?: null));

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
						$obj->saida_manha                 = 	 			$reg["morning_departure"];
						$obj->saida_tarde                 = 	 			$reg["afternoon_departure"];
						$obj->saida_noite                 = 	 			$reg["night_departure"];
						$obj->situacao                    = 					$reg["situation"];
						$obj->hora_diaria_total           = 			$reg["total_daily_time"];
            //adiciona a variavel de retorno
            $retorno[]                        = $obj;
        } else {
            $retorno                          = null;
        }

        return $retorno;
    }

		/*NÃO MODIFICAR ABAIXO AINDA ESTA MERDA!!!*/

/*
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
*/
			public function buscarCartaoPonto($id_processo){/*Função que busca se existe o cartão ponto. */
				$sql = "SELECT * FROM $this->tabela WHERE id_process = $id_processo";
				$resultado = pg_query($sql);
				return $resultado;
			}

			public function buscarID($id_processo){
				$sql = "SELECT id FROM pointcards WHERE id_process = $id_processo";
				$resultado = pg_query($sql);
				$linhas = pg_fetch_array($resultado);
				$id = $linhas['id'];
				return $id;
			}

}
?>
