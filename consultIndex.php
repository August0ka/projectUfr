<?php
include 'header.php';
include 'config.php';

$sql = $conn->prepare('SELECT consult.*,
    doctors.name AS doctor_name,
    patient.name AS patient_name
    FROM consult
    JOIN doctors ON consult.doctors_id = doctors.id
    JOIN patient ON consult.patient_id = patient.id
    WHERE consult.active = 1');


$sql->execute();
$consults = $sql->fetchAll(PDO::FETCH_ASSOC);

echo '<a class="btn btn-info" href="consultForm.php" role="button" style="margin-top: 8%; margin-left:2%; margin-bottom: 4% ">Cadastrar</a>';
if(count($consults) > 0){
    
    echo "<table class='table table-striped table-hover table-bordered' >";
        
    echo "<tr>";
        echo "<th>#</th>";
        echo "<th>MÉDICO</th>";
        echo "<th>PACIENTE</th>";
        echo "<th>DESCRIÇÃO</th>";
        echo "<th>DATA</th>";
        echo "<th>HORA</th>";
        echo "</tr>";
        
        foreach ($consults as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['doctor_name'] . "</td>";
            echo "<td>" . $row['patient_name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['data'] . "</td>";
            echo "<td>" . $row['hour'] . "</td>";
            echo "<td><a href='editConsult.php?id=" . $row['id'] . "' class='btn btn-primary'>EDITAR</a></td>";
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
                url: "createConsults.php",
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
