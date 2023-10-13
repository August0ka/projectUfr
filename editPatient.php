<?php
include 'header.php';
include 'config.php';

if (isset($_GET['id'])) {
    $patientId = $_GET['id'];
    $id = $patientId;


    $sql = $conn->prepare('SELECT * FROM patient WHERE id = :id');
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $patient = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$patient) {
        echo "<p style='font-weight: bold; color: red; font-style: italic; display: flex; justify-content: center;'>Paciente não encontrado!</p>";
        exit;
    }
} else {
    echo "<p style='font-weight: bold; color: red; font-style: italic; display: flex; justify-content: center;'>ID do paciente não especificado!</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $CPF = $_POST['CPF'];

    $sql = $conn->prepare('UPDATE patient SET CPF = :CPF, name = :name, email = :email, phone = :phone, address = :address WHERE id = :id');
    $sql->bindParam(':CPF', $CPF, PDO::PARAM_STR);
    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':phone', $phone, PDO::PARAM_STR);
    $sql->bindParam(':address',$address, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);

    if ($sql->execute()) {

        header('Location: patientsIndex.php');
        exit;

    } else {
        echo "Erro ao atualizar o paciente.";
    }
}

?>

<main>

    <form action="editPatient.php?id=<?php echo $patient['id']; ?>" method="post" style=" padding:15%; padding-top: 6%; padding-bottom:1%; max-width: 100%;" class="row g-3">
    <div style=" background-color: rgba(0, 0, 0, 0.2); padding:10%; padding-bottom:4%; padding-top:4%; border-radius: 10px;">

    <legend style="padding-left:35%; padding-bottom:2%">CADASTRO DE PACIENTE</legend>
        <div class="col-md-8">
            <label for="inputName4" class="form-label">Nome</label>
            <input name="name" type="text" class="form-control" id="inputExpertise4" value="<?php echo htmlspecialchars($patient['name']); ?>" />
        </div>
        <div class="col-md-4">
            <label for="inputCPF" class="form-label">CPF</label>
            <input name="CPF" placeholder="000.000.000-00" type="text" class="form-control cpf" id="inputCPF" value="<?php echo htmlspecialchars($patient['CPF']); ?>" />
        </div>
        <div class="col-md-8">
            <label for="inputEmail4" class="form-label">Email</label>
            <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" value="<?php echo htmlspecialchars($patient['email']); ?>" />
        </div>
        <div class="col-md-4">
            <label for="inputPhone4" class="form-label">Telefone</label>
            <input name="phone" placeholder="(00) 0000-0000" type="text" class="form-control phone_with_ddd" id="inputPhone4" value="<?php echo htmlspecialchars($patient['phone']); ?>" />
        </div>

        <div class="col-8">
            <label for="inputAddress" class="form-label">Endereço</label>
            <input name="address" type="text" class="form-control" id="inputAddress" value="<?php echo htmlspecialchars($patient['address']); ?>" />
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
        $('.cpf').mask('000.000.000-00');

        $('.phone_with_ddd').mask('(00) 00000-0000');

    });

</script>



