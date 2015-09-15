<?php

include_once 'Carrega.class.php'; 

class BD {
    public function __construct() {

pg_connect("host=localhost user=postgres password=senha5 dbname=pontuall port=5432")
                or die("Erro ao conectar ao servidor");
    }
    
  
    
    public function __destruct() {
        //pg_close();
    }
}



/*
  class BD
  {
    public $pdo;

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }

    public function __construct()
    {
      static $pdo = null;
      if ($pdo === null)
      {
         $config = require(__DIR__ . '/../dbconfig.php');

         pg_connect("host=$config[host] user=$config[usuario] password='$config[senha]' dbname=$config[banco] port=$config[port] ")
              or die(' Erro de conexão com o Banco de dados!!');

         $pdo = new PDO("pgsql:host=$config[host];dbname=$config[banco]", $config['usuario'], $config['senha'], array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         ));
      }
      $this->pdo = $pdo;
    }

    public function __destruct(){}

  }

*/?>
