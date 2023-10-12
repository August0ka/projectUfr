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

  $expertise = $_POST['expertise'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $CRM = $_POST['CRM'];

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
    <form action="editDoctors.php?id=<?php echo $doctors['id']; ?>" method="post"  style="padding: 15%; padding-top:6%;  padding-bottom:1%; max-width: 100%;" class="row g-3">
    <div style="background-color: rgba(0, 0, 0, 0.2);padding-left:10%; padding-right: 10%; padding-bottom:4%; padding-top:4%; border-radius: 10px; ">
    

    <legend style="padding-left:35%; padding-bottom:2%">CADASTRO DE MÉDICOS</legend>
      <div class="col-8">
        <label for="inputAddress" class="form-label">Nome</label>
        <input name="name" type="text" class="form-control" id="inputName" value="<?php echo htmlspecialchars($doctors['name']); ?>" />
      </div>
      <div class="col-md-4">
        <label for="inputPassword4" class="form-label">CRM</label>
        <input name="CRM" placeholder="0000000" type="text" class="form-control crm" id="inputCRM" value="<?php echo htmlspecialchars($doctors['CRM']); ?>" />
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Email</label>
        <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" value="<?php echo htmlspecialchars($doctors['email']); ?>" />
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Telefone</label>
        <input name="phone" placeholder="(00) 00000-0000" type="text" class="form-control phone_with_ddd" id="inputPhone4" value="<?php echo htmlspecialchars($doctors['phone']); ?>" />
      </div>
      <div class="col-md-8">
        <label for="inputEmail4" class="form-label">Especialidade</label>
        <input name="expertise" type="text" class="form-control" id="inputExpertise4" value="<?php echo htmlspecialchars($doctors['expertise']); ?>" />
      </div>
      <div class="col-12">
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Salvar</button>
      </div>
    </div>
    </form>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"> </script>

<script>

  $(document).ready(function() {

      $('.phone_with_ddd').mask('(00) 00000-0000');

      $('.crm').mask('0000000');

  });

</script>



