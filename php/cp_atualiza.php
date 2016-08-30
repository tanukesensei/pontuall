<?php
    include '../class/Carrega.class.php';
    session_start();

    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }

    $contador = $_POST["num"];
    $id_processo=$_POST["id_processo"][0];

    if (isset($_POST['atualizar'])) {
for ($i=0; $i < $contador; $i++) {
  
        $objCP                              = new CartaoPonto();
        $objCP->id                          = $_POST["id"][$i];
        $objCP->id_perito                   = $_POST["id_perito"][$i];
        $objCP->id_processo                 = $_POST["id_processo"][$i];
        $objCP->data_dia                    = $_POST["data_dia"][$i];
        $objCP->entrada_manha               = $_POST["entrada_manha"][$i];
        $objCP->entrada_tarde               = $_POST["entrada_tarde"][$i];
        $objCP->entrada_noite               = $_POST["entrada_noite"][$i];
        $objCP->descanso_diurno_trabalhado  = $_POST["descanso_diurno_trabalhado"][$i];
        $objCP->saida_manha                 = $_POST["saida_manha"][$i];
        $objCP->saida_tarde                 = $_POST["saida_tarde"][$i];
        $objCP->saida_noite                 = $_POST["saida_noite"][$i];
        $objCP->descanso_noturno_trabalhado = $_POST["descanso_noturno_trabalhado"][$i];
        $objCP->hora_extra_diurna           = $_POST["hora_extra_diurna"][$i];
        $objCP->hora_extra_diurna2          = $_POST["hora_extra_diurna2"][$i];
        $objCP->hora_extra_diurna3          = $_POST["hora_extra_diurna3"][$i];
        $objCP->hora_extra_noturna          = $_POST["hora_extra_noturna"][$i];
        $objCP->hora_extra_noturna2         = $_POST["hora_extra_noturna2"][$i];
        $objCP->hora_extra_noturna3         = $_POST["hora_extra_noturna3"][$i];
        $objCP->hora_diaria_total           = $_POST["hora_diaria_total"][$i];
        $objCP->situacao                    = $_POST["situacao"][$i];
        var_dump($objCP);
        //$objCP->atualizar();
  }
}
  else
{
  echo "<script>alert('Desculpa, ocorreu um erro momentâneo.')</script>";
  header("Location:cartao_ponto.php?id=$id_processo");
}
?>
