<?php
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select id, name from doctors where active = 1');
$sql->execute();
$doctors = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $conn->prepare('select id, name from patient where active = 1');
$sql->execute();
$patients = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<main>

  <form method="post" action="createConsults.php" style=" padding: 10%;  padding-bottom:1%; padding-top:5%;" class="row g-3">
  <div style=" background-color: rgba(0, 0, 0, 0.2); padding-left:10%; padding-bottom:1%; padding-top:1%; border-radius: 10px;">

    <legend style="padding-left:30%; padding-bottom:2%">AGENDAMENTO DE CONSULTA</legend>

      <div class="col-6">
        <label for="inputDoctor" class="form-label">Médico</label>
        <select name="doctor_id" class="form-select" aria-label="Default select example">
          <option value="">Selecione..</option>
                <?php foreach ($doctors as $doctor): ?>
                  <option value="<?=$doctor['id'];?>" >
                    <?=$doctor['name'];?>
                  </option>
                <?php endforeach ?>
        </select>
      </div>
      <div class="col-6">
        <label for="inputPatients" class="form-label">Paciente</label>
        <select name="patient_id" class="form-select" aria-label="Default select example">
          <option value="">Selecione..</option>
                <?php foreach ($patients as $patient): ?>
                  <option value="<?=$patient['id'];?>" >
                      <?=$patient['name'];?>
                  </option>
                <?php endforeach ?>
        </select>
      </div>
      <div class="col-md-4">
              <label for="inputPassword4" class="form-label">Data</label>
              <input name="date" placeholder="DD/MM/AAAA" type="date" class="form-control" id="inputCRM" />
      </div>  
      <div class="col-md-4">
              <label for="inputPassword4" class="form-label">Hora</label>
              <input name="hour" placeholder="00:00" type="time" class="form-control" id="inputCRM" />
      </div>  
      <div class="col-6">
        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
      </div>
      <div class="col-12">
        <input type="hidden" name="confirme" id="confirme"> 
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Salvar</button>
      </div>
  </div>
  </form>
</main>