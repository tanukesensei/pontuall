<?php
    include '../class/Carrega.class.php';
    session_start();
    if (isset($_SESSION["username"]))
    {
         $login = $_SESSION["username"]->username;
    } else {
        header("Location:../index.php");
    }
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
     <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="css/creative.css" type="text/css">

  </head>
  <body>
<?php
  /*
  $objProcesso = new Processo();
  $complemento = "ORDER BY id";
  $lista = $objProcesso->($complemento);
*/
 ?>

 <form class="" action="index.html" method="post">
   <table border="1" class="table table-hover table-condensed">
     <tr>
       <!--<td>
         <input type="hidden" name="id_perito" value="">
       </td>
       <td>
         <input type="hidden" name="id_processo" value="">
       </td>-->
       <td>
         <label for="data_dia">data do dia:</label>
       </td>
       <td>
          <label for="entrada_manha">Entrada da Manhã:</label>
       </td>
       <td>
         <label for="entrada_tarde">Entrada da Tarde:</label>
       </td>
       <td>
         <label for="entrada_noite">Entrada da Noite:</label>
       </td>
       <td>
         <label for="descanso_diurno_trabalhado">Descanso Diurno:</label>
       </td>
       <td>
         <label for="saida_manha">Saída da Manhã:</label>
       </td>
       <td>
         <label for="saida_tarde">Saída da Tarde:</label>
       </td>
       <td>
         <label for="saida_noite">Saída da Noite:</label>
       </td>
       <td>
         <label for="descanso_noturno_trabalhado">Descanso Noturno:</label>
       </td>
       <td>
         <label for="hora_extra_diurna">Hora Extra Diurna:</label>
       </td>
       <td>
         <label for="hora_extra_diurna2">Hora Extra Diurna 2:</label>
       </td>
       <td>
         <label for="hora_extra_diurna3">Hora Extra Diurna 3:</label>
       </td>
       <td>
         <label for="hora_extra_noturna">Hora Extra Noturna:</label>
       </td>
       <td>
         <label for="hora_extra_noturna2">Hora Extra Noturna 2:</label>
       </td>
       <td>
         <label for="hora_extra_noturna3">Hora Extra Noturna 3:</label>
       </td>
       <td>
         <label for="hora_diaria_total">Total de Horas Diárias:</label>
       </td>
       <td>
         <label for="situacao">Situação:</label>
       </td>
     </tr>

     <tr>
       <td>
         <input type="text" name="data_dia" value="<?php  ?>"><br>
       </td>
       <td>
         <input type="text" name="entrada_manha" placeholder="Entrada da Manhã">
       </td>
       <td>
         <input type="text" name="entrada_tarde" placeholder="Entrada da Tarde">
       </td>
       <td>
         <input type="text" name="entrada_noite" placeholder="Entrada Noite">
       </td>
       <td>
         <input type="text" name="descanso_diurno_trabalhado" placeholder="Descanso Diurno">
       </td>
       <td>
         <input type="text" name="saida_manha" placeholder="Saída da Manhã">
       </td>
       <td>
         <input type="text" name="saida_tarde" placeholder="Saída da Tarde">
       </td>
       <td>
         <input type="text" name="saida_noite" placeholder="Saída da Noite">
       </td>
       <td>
         <input type="text" name="descanso_noturno_trabalhado" placeholder="Descanso Noturno">
       </td>
       <td>
         <input type="text" name="hora_extra_diurna" placeholder="Hora Extra Diurna">
       </td>
       <td>
         <input type="text" name="hora_extra_diurna2" placeholder="Hora Extra Diurna 2">
       </td>
       <td>
         <input type="text" name="hora_extra_diurna3" placeholder="Hora Extra Diurna 3">
       </td>
       <td>
         <input type="text" name="hora_extra_noturna" placeholder="Hora Extra Noturna">
       </td>
       <td>
         <input type="text" name="hora_extra_noturna2" placeholder="Hora Extra Noturna 2">
       </td>
       <td>
         <input type="text" name="hora_extra_noturna3" placeholder="Hora Extra Noturna 3">
       </td>
       <td>
         <input type="text" name="hora_diaria_total" placeholder="Total de Horas Diárias">
       </td>
       <td>
         <input type="text" name="situacao" placeholder="Situação">
       </td>
     </tr>
   </table>
 </form>

  </body>
</html>
