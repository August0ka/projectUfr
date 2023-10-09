<?php 
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from patient where active = 1');
$sql->execute();
$patients = $sql->fetchAll(PDO::FETCH_ASSOC);

echo '<a class="btn btn-info" href="patientsForm.php" role="button" style="margin-top: 8%; margin-left:2%; margin-bottom: 4%;">Cadastrar</a>';

if(count($patients) > 0){

    echo "<table class='table table-striped table-hover table-bordered'>";
    
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>CPF</th>";
    echo "<th>NOME</th>";
    echo "<th>EMAIl</th>";
    echo "<th>TELEFONE</th>";
    echo "<th>ENDEREÇO</th>";
    echo "</tr>";
    
    foreach ($patients as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['CPF'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td><a href='editPatient.php?id=" . $row['id'] . "' class='btn btn-primary'>EDITAR</a></td>";
        echo "<td><button data-id='" . $row['id'] . "' class='btn btn-danger delete-btn'>EXCLUIR</button></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
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

