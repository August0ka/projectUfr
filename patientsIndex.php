<?php 
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from patient where active = 1');
$sql->execute();
$patients = $sql->fetchAll(PDO::FETCH_ASSOC);

echo '<a class="btn btn-success" href="patientsForm.php" role="button" style="margin-top: 8%; margin-left:2%; margin-bottom: 4%;">Cadastrar</a>';

if(count($patients) > 0){

    
    echo "<legend style='padding-left:15%; padding-bottom:2%'>PACIENTES</legend>";

    echo "<div class='container-fluid' style='display:grid; justify-content: center; align-items: center;'>";
    echo "<table class='table table-success table-striped ' style='margin:0 auto; max-width: 100%;'>";
    
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>CPF</th>";
    echo "<th>NOME</th>";
    echo "<th>EMAIl</th>";
    echo "<th>TELEFONE</th>";
    echo "<th>ENDEREÇO</th>";
    echo "<th></th>";
    echo "</tr>";
    
    foreach ($patients as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['CPF'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td style='word-wrap:  break-word'>" . $row['address'] . "</td>";
        echo "<td style='border-left: 5px solid gainsboro;'>
                <a href='editPatient.php?id=" . $row['id'] . "' class='btn btn-primary'>EDITAR</a>
                <button data-id='" . $row['id'] . "' class='btn btn-danger delete-btn'>EXCLUIR</button></td>";
                echo "</tr>";    
    }
    
    echo "</table>";
    echo "</div>";
} else {
    echo "<p style='font-weight: bold;  color: red; font-style: italic; display: flex; justify-content: center;'>Nenhum registro encontrado !</p>";
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".delete-btn").click(function() {
        var id = $(this).data("id");
        
        if (confirm('Tem certeza que deseja excluir?')) {
            $.ajax({
                
                type: "POST",
                url: "createPatients.php",
                data: { action: "delete", id: id },

                success: function(response) {
                    location.reload();
                },

                error: function() { 
                    alert("Erro ao excluir o paciente.");
                }
            });
        }
    });
});
</script>

