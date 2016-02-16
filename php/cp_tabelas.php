<form class="" action="index.html" method="post">
  <table border="1" class="table table-hover table-condensed">
    <thead>
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
    </thead>
<?php for ($i=0; $i < 30; $i++) { ?>

    <tbody>
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

    </tbody>
<?php }; ?>
  </table>
</form>
