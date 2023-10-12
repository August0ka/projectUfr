<?php
include 'header.php';
include 'config.php';

if (isset($_GET['id'])) {
    $doctorId = $_GET['id'];
    $id = $doctorId;


    $sql = $conn->prepare('SELECT * FROM doctors WHERE id = :id');
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $doctors = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$doctors) {
        echo "<p style='font-weight: bold; color: red; font-style: italic; display: flex; justify-content: center;'>Paciente não encontrado!</p>";
        exit;
    }
} else {
    echo "<p style='font-weight: bold; color: red; font-style: italic; display: flex; justify-content: center;'>ID do paciente não especificado!</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de edição aqui
    $CRM = $_POST['CRM'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $expertise = $_POST['expertise'];

    $sql = $conn->prepare('UPDATE doctors SET CRM = :CRM, name = :name, email = :email, phone = :phone, expertise = :expertise WHERE id = :id');
    $sql->bindParam(':CRM', $CRM, PDO::PARAM_STR);
    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':phone', $phone, PDO::PARAM_STR);
    $sql->bindParam(':expertise',$expertise, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);

    if ($sql->execute()) {

        header('Location: doctorsIndex.php');
        exit;

    } else {
        echo "Erro ao atualizar o médico.";
    }
}

?>

<main>
    <form action="editDoctors.php?id=<?php echo $doctors['id']; ?>" method="post"  style="padding: 9%; max-width: 100%;"  class="row g-3">
        <legend style="padding-left:25%; padding-bottom:2%">CADASTRO DE MÉDICOS</legend>
      <div class="col-8">
        <label for="inputAddress" class="form-label">Nome</label>
        <input name="name" type="text" class="form-control" id="inputName" value="<?php echo htmlspecialchars($doctors['name']); ?>" />
      </div>
      <div class="col-md-4">
        <label for="inputPassword4" class="form-label">CRM</label>
        <input name="CRM" placeholder="00000" type="text" class="form-control" id="inputCRM" value="<?php echo htmlspecialchars($doctors['CRM']); ?>" />
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Email</label>
        <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" value="<?php echo htmlspecialchars($doctors['email']); ?>" />
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Telefone</label>
        <input name="phone" placeholder="(00) 0000-0000" type="text" class="form-control" id="inputPhone4" value="<?php echo htmlspecialchars($doctors['phone']); ?>" />
      </div>
      <div class="col-md-8">
        <label for="inputEmail4" class="form-label">Especialidade</label>
        <input name="expertise" type="text" class="form-control" id="inputExpertise4" value="<?php echo htmlspecialchars($doctors['expertise']); ?>" />
      </div>
      <div class="col-12">
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</main>



