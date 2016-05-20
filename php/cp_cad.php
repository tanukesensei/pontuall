<?php

    include '../class/Carrega.class.php';
    session_start();
    if (isset($_SESSION["username"]))
    {
         $login = $_SESSION["username"]->username;
         $id = $_SESSION["username"]->id;
    } else {
        header("Location:../index.php");
    }

if (isset($_POST["cadastrar"], $_POST["data_dia"], $_POST["entrada_manha"], $_POST["entrada_tarde"], $_POST["entrada_noite"],
 $_POST["descanso_diurno_trabalhado"], $_POST["saida_manha"], $_POST["saida_tarde"], $_POST["saida_noite"],
 $_POST["descanso_noturno_trabalhado"], $_POST["hora_extra_diurna"], $_POST["hora_extra_diurna2"],
 $_POST["hora_extra_diurna3"], $_POST["hora_extra_noturna"], $_POST["hora_extra_noturna2"], $_POST["hora_extra_noturna3"],
 $_POST["hora_diaria_total"], $_POST["situacao"])) {

   $objCp = new CartaoPonto();
   $objCp->id_perito = $_POST["id_perito"];
   $objCp->id_processo = $_POST["id_processo"];
   $objCp->data_dia = $_POST["data_dia"];
   $objCp->entrada_manha = $_POST["entrada_manha"];
   $objCp->entrada_tarde = $_POST["entrada_tarde"];
   $objCp->entrada_noite = $_POST["entrada_noite"];
   $objCp->descanso_diurno_trabalhado = $_POST["descanso_diurno_trabalhado"];
   $objCp->saida_manha = $_POST["saida_manha"];
   $objCp->saida_tarde = $_POST["saida_tarde"];
   $objCp->saida_noite = $_POST["saida_noite"];
   $objCp->descanso_noturno_trabalhado = $_POST["descanso_noturno_trabalhado"];
   $objCp->hora_extra_diurna = $_POST["hora_extra_diurna"];
   $objCp->hora_extra_diurna2 = $_POST["hora_extra_diurna2"];
   $objCp->hora_extra_diurna3 = $_POST["hora_extra_diurna3"];
   $objCp->hora_extra_noturna = $_POST["hora_extra_noturna"];
   $objCp->hora_extra_noturna2 = $_POST["hora_extra_noturna2"];
   $objCp->hora_extra_noturna3 = $_POST["hora_extra_noturna3"];
   $objCp->hora_diaria_total = $_POST["hora_diaria_total"];
   $objCp->situacao = $_POST["situacao"];
   $objCp->inserir();


   header("Location:cartao_ponto.php");
}

?>
