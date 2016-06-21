<?php

    include '../class/Carrega.class.php';
    session_start();
    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }

    $id_perito = $_SESSION['id'];

    $_SESSION['id_processo']=$_GET['id'];
    $id_processo = $_SESSION['id_processo'];
    $objProcesso = new Processo();
    $quantidadeDias = $objProcesso->quantidade_dias($id_processo);

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

    // Estes dados provavelmente virão do formulário
    $data_Inicial = $objProcesso->dataInicial($id_processo);
    $dataInicial = DateTime::createFromFormat('d/m/Y', $data_Inicial);


/*
    // Transforma as datas do formulário para objetos DateTime: http://php.net/manual/pt_BR/datetime.createfromformat.php
    $dataInicial = DateTime::createFromFormat('d/m/Y', $data_Inicial);
    $dataFinal = DateTime::createFromFormat('d/m/Y', $data_Final);

    while ($dataInicial <= $dataFinal) {
        // A fazer (Luan): executar um SQL INSERT para cada uma destas datas
        echo $dataInicial->format('d/m/Y l'), '<br>';

        // Adiciona um dia à $dataInicial, servindo para dar continuidade ao loop
        $dataInicial->add(new DateInterval('P1D'));
    }
*/

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cartão Ponto - Pontuall</title>

     <!-- Bootstrap Core CSS -->
     <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">

     <!-- Custom Fonts -->
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="../css/creative.css" type="text/css">

     <!-- DataTables CSS -->
     <link href="../css/dataTables.bootstrap.css" rel="stylesheet">

     <!-- DataTables Responsive CSS -->
     <link href="../css/jquery.dataTables.min.css" rel="stylesheet">

  </head>
  <body>
    <form class="form-control" action="cp_cad.php" method="post">
      <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
        <thead>
          <tr class="gradeX">
            <th>
              <label for="data_dia">data do dia:</label>
            </th>
            <th>
               <label for="entrada_manha">Entrada da Manhã:</label>
            </th>
            <th>
              <label for="saida_manha">Saída da Manhã:</label>
            </th>
            <th>
              <label for="entrada_tarde">Entrada da Tarde:</label>
            </th>
            <th>
              <label for="saida_tarde">Saída da Tarde:</label>
            </th>
            <th>
              <label for="entrada_noite">Entrada da Noite:</label>
            </th>
            <th>
              <label for="saida_noite">Saída da Noite:</label>
            </th>
            <th>
              <label for="descanso_diurno_trabalhado">Descanso Diurno:</label>
            </th>
            <th>
              <label for="descanso_noturno_trabalhado">Descanso Noturno:</label>
            </th>
            <th>
              <label for="situacao">Situação:</label>
            </th>
            <th>
              <label for="hora_extra_diurna">Hora Extra Diurna:</label>
            </th>
            <th>
              <label for="hora_extra_diurna2">Hora Extra Diurna 2:</label>
            </th>
            <th>
              <label for="hora_extra_diurna3">Hora Extra Diurna 3:</label>
            </th>
            <th>
              <label for="hora_extra_noturna">Hora Extra Noturna:</label>
            </th>
            <th>
              <label for="hora_extra_noturna2">Hora Extra Noturna 2:</label>
            </th>
            <th>
              <label for="hora_extra_noturna3">Hora Extra Noturna 3:</label>
            </th>
            <th>
              <label for="hora_diaria_total">Total de Horas Diárias:</label>
            </th>
          </tr>
        </thead>

        <tbody>
          <?php for ($i=0; $i < $quantidadeDias; $i++) { ?> <!-- Valor Original há ser utilizado no projeto <?php /*for ($i=0; $i < 1826; $i++) { */?> -->
          <tr class="gradeY">

                <input type="hidden" name="id_processo[]" value="<?php echo $id_processo; ?>">

                <input type="hidden" name="id_perito[]" value="<?php echo $id_perito; ?>">

            <td>
              <input type="text" name="data_dia[]" value="<?php echo $dataInicial->format('d/m/Y l'); ?>" >
            </td>
            <?php $dataInicial->add(new DateInterval('P1D')); ?>
            <td>
              <input type="text" name="entrada_manha[]" placeholder="Entrada da Manhã">
            </td>
            <td>
              <input type="text" name="saida_manha[]" placeholder="Saída da Manhã">
            </td>
            <td>
              <input type="text" name="entrada_tarde[]" placeholder="Entrada da Tarde">
            </td>
            <td>
              <input type="text" name="saida_tarde[]" placeholder="Saída da Tarde">
            </td>
            <td>
              <input type="text" name="entrada_noite[]" placeholder="Entrada Noite">
            </td>
            <td>
              <input type="text" name="saida_noite[]" placeholder="Saída da Noite">
            </td>
            <td>
              <input type="text" name="descanso_diurno_trabalhado[]" placeholder="Descanso Diurno">
            </td>
            <td>
              <input type="text" name="descanso_noturno_trabalhado[]" placeholder="Descanso Noturno">
            </td>
            <td>
              <select class="form-control" name="situacao">
                <option value="atividade">Em Atividade</option>
                <option value="feriadoT">Feriado Trabalhado</option>
                <option value="repousoT">Repouso Trabalhado</option>
                <option value="ferias">Férias</option>
              </select>
            </td>
            <td>
              <input type="text" name="hora_extra_diurna[]" placeholder="Hora Extra Diurna">
            </td>
            <td>
              <input type="text" name="hora_extra_diurna2[]" placeholder="Hora Extra Diurna 2">
            </td>
            <td>
              <input type="text" name="hora_extra_diurna3[]" placeholder="Hora Extra Diurna 3">
            </td>
            <td>
              <input type="text" name="hora_extra_noturna[]" placeholder="Hora Extra Noturna">
            </td>
            <td>
              <input type="text" name="hora_extra_noturna2[]" placeholder="Hora Extra Noturna 2">
            </td>
            <td>
              <input type="text" name="hora_extra_noturna3[]" placeholder="Hora Extra Noturna 3">
            </td>
            <td>
              <input type="text" name="hora_diaria_total[]" placeholder="Total de Horas Diárias">
            </td>
          </tr>
          <?php }; ?>
        </tbody>
      </table>
      <!--<button type="button" class="form-control" name="cadastrar">Cadastrar Valores</button>-->

      <input type="submit" class="form-control" name="cadastrar" value="Cadastrar Valores" >
      <button type="button" class="form-control" name="atualizar">Atualizar Valores</button>

    </form>
  </body>


           <!-- DataTables JavaScript -->
  <script src="../js/jquery.js"></script>
           <script src="../js/jquery.dataTables.min.js"></script>

           <script src="../js/dataTables.bootstrap.min.js"></script>


           <!-- Page-Level Demo Scripts - Tables - Use for reference -->
           <script>
           $(document).ready(function() {
               $('#dataTables-example').DataTable({
                       responsive: true
               });
           });
           </script>


</html>
