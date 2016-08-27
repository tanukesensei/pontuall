<?php

    include '../class/Carrega.class.php';
    session_start();
    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }

    $id_perito               = $_SESSION['id'];
    $_SESSION['id_processo'] = $_GET['id'];
    $id_processo             = $_SESSION['id_processo'];
    $objProcesso             = new Processo();
    $quantidadeDias          = $objProcesso->quantidade_dias($id_processo);
    $xablau = $quantidadeDias;

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
<!-- <link href="../css/dataTables.bootstrap.css" rel="stylesheet"> -->

     <!-- DataTables Responsive CSS -->
    <!-- <link href="../css/jquery.dataTables.min.css" rel="stylesheet"> -->


  </head>
  <body>
    <?php
          // tentativa fazer um resgate de valores no banco e alteração de botões no front.

    $objCp = new CartaoPonto();
    $resultado = $objCp->buscarCartaoPonto($id_processo); //Retorna se existe um cartão ponto para este processo.
    $num_linhas=pg_num_rows($resultado); //Transforma o resultado em um numero de linhas.

    if(pg_num_rows($resultado)>0){
      /* Caso exista o cartão ponto, o status do processo muda para atualizar, caso contrario muda para cadastrar.*/
      $status_processo="atualizar";
      $linhas=pg_fetch_all($resultado); // O resultado transformado em um array chamado linhas.
      $data_banco=array(); // É criado um novo array chamado data_banco.

        foreach($linhas as $linha)
        {
           $data_banco[] = $linha['date_day']; //data_banco recebe as datas dos dias que estão cadastradas no banco.
        }
    }
    else {
            $status_processo="cadastrar";
    }

    if ($status_processo == "cadastrar") {
      $action = "cp_cad.php";
    } else {
      $action = "cp_atualiza.php";
    }

       ?>
    <form class="form-control" action="<?php echo $action; ?>" method="post">
      <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
        <thead>
          <tr class="gradeX">
            <th>
              <label for="data_dia">data dia:</label>
            </th>
            <th>
               <label for="entrada_manha">Entrada Manhã:</label>
            </th>
            <th>
              <label for="saida_manha">Saída Manhã:</label>
            </th>
            <th>
              <label for="entrada_tarde">Entrada Tarde:</label>
            </th>
            <th>
              <label for="saida_tarde">Saída Tarde:</label>
            </th>
            <th>
              <label for="entrada_noite">Entrada Noite:</label>
            </th>
            <th>
              <label for="saida_noite">Saída Noite:</label>
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
          <tr class="gradeY">
            <?php for ($i=0; $i < $quantidadeDias; $i++) { /*Valor Original há ser utilizado no projeto*/ /*for ($i=0; $i < 1826; $i++) */

              if($status_processo=='atualizar'){
              /*caso o status do processo esteja para atualizar,será feito uma busco no banco comparando os valores
              já gerados e salvos através do $data_banco, e serão guardados na $key. */
                  $key = array_search($dataInicial->format('d/m/Y l'),$data_banco);
                  if ($key==$i)
                  {
                  /*Caso a $key comparada seja igual, os valores do banco serão exibidos. */
                       $entrada_manha=$linhas[$i]['morning_entry'];
                       $saida_manha = $linhas[$i]['morning_departure'];
                       $entrada_tarde=$linhas[$i]['late_entry'];
                       $saida_tarde=$linhas[$i]['afternoon_departure'];
                       $entrada_noite = $linhas[$i]['night_entry'];
                       $saida_noite = $linhas[$i]['night_departure'];
                  }
               }

              ?>
                <input type="hidden" name="id_processo[]" value="<?php echo $id_processo; ?>">

                <input type="hidden" name="id_perito[]" value="<?php echo $id_perito; ?>">

                <input type="hidden" name="num" value="<?php echo $xablau; ?>">

            <td>
              <input type="text" name="data_dia[]" value="<?php echo $dataInicial->format('d/m/Y l'); ?>" >
            </td>
            <?php $dataInicial->add(new DateInterval('P1D')); ?>
            <td>
              <input type="text" name="entrada_manha[]" value="<?php echo (isset($entrada_manha) ?$entrada_manha:""); ?>" placeholder="Entrada Manhã">
            </td>
            <td>
              <input type="text" name="saida_manha[]" value="<?php echo (isset($saida_manha) ?$saida_manha:""); ?>" placeholder="Saída Manhã">
            </td>
            <td>
              <input type="text" name="entrada_tarde[]" value="<?php echo (isset($entrada_tarde) ?$entrada_tarde:""); ?>" placeholder="Entrada Tarde">
            </td>
            <td>
              <input type="text" name="saida_tarde[]" value="<?php echo (isset($saida_tarde) ?$saida_tarde:""); ?>" placeholder="Saída Tarde">
            </td>
            <td>
              <input type="text" name="entrada_noite[]" value="<?php echo (isset($entrada_noite) ?$entrada_noite:""); ?>" placeholder="Entrada Noite">
            </td>
            <td>
              <input type="text" name="saida_noite[]" value="<?php echo (isset($saida_noite) ?$saida_noite:""); ?>" placeholder="Saída Noite">
            </td>
            <td>
              <input type="text" name="descanso_diurno_trabalhado[]" placeholder="Descanso Diurno">
            </td>
            <td>
              <input type="text" name="descanso_noturno_trabalhado[]" placeholder="Descanso Noturno">
            </td>
            <td>
              <select class="form-control" name="situacao[]">
                <option value="atividade">Em Atividade</option>
                <option value="feriadoT">Feriado Trabalhado</option>
                <option value="repousoT">Repouso Trabalhado</option>
                <option value="atestadoM">Atestado Médico</option>
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
<?php
  if($status_processo=='cadastrar')
  {
    ?>
      <input type="submit" class="form-control" name="cadastrar" value="Cadastrar Valores" >
    <?php
  } else {
     ?>
      <button type="submit" class="form-control" name="atualizar">Atualizar Valores</button>
    <?php
   }
    ?>
      <button type="button" class="form-control"><a href="cp_calculos.php?id=<?php echo $id_processo; ?>">Cálcular</a></button>
      <button type="button" class="form-control"><a href="user_process.php">Voltar</a></button>
    </form>
  </body>

           <!-- DataTables JavaScript -->
          <!-- <script src="../js/jquery.js"></script>
           <script src="../js/jquery.dataTables.min.js"></script>
           <script src="../js/dataTables.bootstrap.min.js"></script> -->

           <!-- Page-Level Demo Scripts - Tables - Use for reference -->
      <!--     <script>
           $(document).ready(function() {
               $('#dataTables-example').DataTable({
                       responsive: true
               });
           });
         </script> -->
</html>
