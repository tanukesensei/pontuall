<?php
    ini_set('session.save_path', '../../tmp');
    session_start();
    include '../class/Carrega.class.php';

    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }

    $contador = $_POST["num"];
    $id_processo=$_POST["id_processo"][0];

    if (isset($_POST['atualizar'])) {
      for ($i=0; $i < $contador; $i++) {

        $objCp                              = new CartaoPonto();
        $objCp->id                          = $_POST["id"][$i];
        $objCp->id_perito                   = $_POST["id_perito"][$i];
        $objCp->id_processo                 = $_POST["id_processo"][$i];
        $objCp->data_dia                    = $_POST["data_dia"][$i];
        $objCp->entrada_manha               = $_POST["entrada_manha"][$i];
        $objCp->entrada_tarde               = $_POST["entrada_tarde"][$i];
        $objCp->entrada_noite               = $_POST["entrada_noite"][$i];
        $objCp->descanso_diurno_trabalhado  = $_POST["descanso_diurno_trabalhado"][$i];
        $objCp->saida_manha                 = $_POST["saida_manha"][$i];
        $objCp->saida_tarde                 = $_POST["saida_tarde"][$i];
        $objCp->saida_noite                 = $_POST["saida_noite"][$i];
        $objCp->descanso_noturno_trabalhado = $_POST["descanso_noturno_trabalhado"][$i];
        $objCp->hora_extra_diurna           = $_POST["hora_extra_diurna"][$i];
        $objCp->hora_extra_diurna2          = $_POST["hora_extra_diurna2"][$i];
        $objCp->hora_extra_diurna3          = $_POST["hora_extra_diurna3"][$i];
        $objCp->hora_extra_noturna          = $_POST["hora_extra_noturna"][$i];
        $objCp->hora_extra_noturna2         = $_POST["hora_extra_noturna2"][$i];
        $objCp->hora_extra_noturna3         = $_POST["hora_extra_noturna3"][$i];
        $objCp->hora_diaria_total           = $_POST["hora_diaria_total"][$i];
        $objCp->situacao                    = $_POST["situacao"][$i];
        $objCp->atualizar();

        header("Location:cartao_ponto.php?id=$id_processo");
  }
}
  else
{
  echo "<script>alert('Desculpa, ocorreu um erro momentâneo.')</script>";
  header("Location:cartao_ponto.php?id=$id_processo");
}
?>
