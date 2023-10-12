<?php
include 'header.php';
include 'config.php';

if (isset($_GET['id'])) {
    $consultId = $_GET['id'];
    $id = $consultId;

    $sql = $conn->prepare('select id, name from doctors where active = 1');
    $sql->execute();
    $doctors = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $sql = $conn->prepare('select id, name from patient where active = 1');
    $sql->execute();
    $patients = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $conn->prepare('SELECT * FROM consult WHERE id = :id');
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $consult = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$consult) {
        echo "<p style='font-weight: bold; color: red; font-style: italic; display: flex; justify-content: center;'>Paciente não encontrado!</p>";
        exit;
    }
} else {
    echo "<p style='font-weight: bold; color: red; font-style: italic; display: flex; justify-content: center;'>ID do paciente não especificado!</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo '<pre style="padding-top: 9%;>';
    // var_dump($_POST);
    // echo '</pre>';

    // Processar o formulário de edição aqui
    $doctors_id = $_POST['doctors_id'];
    $patient_id = $_POST['patient_id'];
    $description = $_POST['description'];
    $data = $_POST['data'];
    $hour = $_POST['hour'];

    $sql = $conn->prepare('UPDATE consult SET doctors_id = :doctors_id, patient_id = :patient_id, description = :description, data = :data, hour = :hour WHERE id = :id');
    $sql->bindParam(':doctors_id', $doctors_id, PDO::PARAM_STR);
    $sql->bindParam(':patient_id', $patient_id, PDO::PARAM_STR);
    $sql->bindParam(':description', $description, PDO::PARAM_STR);
    $sql->bindParam(':data',$data, PDO::PARAM_STR);
    $sql->bindParam(':hour',$hour, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);

    if ($sql->execute()) {

        header('Location: consultIndex.php');
        exit;

    } else {
        echo "Erro ao atualizar o médico.";
    }
}

?>


<main>

  <form method="post" action="editconsult.php?id=<?php echo $consult['id']; ?>" style=" padding: 10%;  padding-bottom:1%; padding-top:5%;" class="row g-3">
  <div style=" background-color: rgba(0, 0, 0, 0.2); padding-left:10%; padding-bottom:1%; padding-top:1%; border-radius: 10px;">

    <legend style="padding-left:30%; padding-bottom:2%">AGENDAMENTO DE CONSULTA</legend>
    <div class="col-6">
        <label for="inputDoctor" class="form-label">Médico</label>
        <select name="doctors_id" class="form-select" aria-label="Default select example">
            <option value="">Selecione..</option>
            <?php foreach ($doctors as $doctor): ?>
                <option value="<?=$doctor['id'];?>" <?php if ($doctor['id'] == $consult['doctors_id']) echo 'selected'; ?>>
                    <?=$doctor['name'];?>
                </option>
            <?php endforeach ?>
        </select>

        <label for="inputPatients" class="form-label">Paciente</label>
        <select name="patient_id" class="form-select" aria-label="Default select example">
            <option value="">Selecione..</option>
            <?php foreach ($patients as $patient): ?>
                <option value="<?=$patient['id'];?>" <?php if ($patient['id'] == $consult['patient_id']) echo 'selected'; ?>>
                    <?=$patient['name'];?>
                </option>
            <?php endforeach ?>
        </select>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Data</label>
            <input name="data" placeholder="DD/MM/AAAA" type="date" class="form-control" id="inputdoctors_id" value="<?php echo date('Y-m-d', strtotime($consult['data'])); ?>" />
        </div>  

        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Hora</label>
            <input name="hour" placeholder="00:00" type="time" class="form-control" id="inputdoctors_id" value="<?php echo date('H:i', strtotime($consult['hour'])); ?>" />
        </div>

        <div class="col-6">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $consult['description']; ?></textarea>
        </div>

    <div class="col-12">
          <input type="hidden" name="confirme" id="confirme"> 
          <button style="margin-top: 2%;" type="submit" class="btn btn-success">Salvar</button>
        </div>
  </div>
  </form>
</main>




