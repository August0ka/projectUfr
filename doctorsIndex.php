<?php
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from doctors where active = 1');
$sql->execute();
$doctors = $sql->fetchAll(PDO::FETCH_ASSOC);

echo '<a class="btn btn-info" href="doctorsForm.php" role="button" style="margin-top: 8%; margin-left:2%; margin-bottom: 4% ">Cadastrar</a>';

if(count($doctors) > 0){
    
    echo "<table class='table table-striped table-hover table-bordered'>";
        
    echo "<tr>";
        echo "<th>#</th>";
        echo "<th>CRM</th>";
        echo "<th>NOME</th>";
        echo "<th>EMAIl</th>";
        echo "<th>TELEFONE</th>";
        echo "<th>ESPECIALIDADE</th>";
        echo "</tr>";
        
        foreach ($doctors as $row) {
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['CRM'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['expertise'] . "</td>";
                echo "<td><button data-id='" . $row['id'] . "' class='btn btn-danger delete-btn'>EXCLUIR</button></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
        } else {
            echo "<p style='font-weight: bold;  color: red; font-style: italic; display: flex; justify-content: center;'>Nenhum registro encontrado !</p>";
        }

            if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id'])) {
        $id = $_POST['id'];
        
        $sql = $conn->prepare('UPDATE patient SET active = 0 WHERE id = :id');
        $sql->bindParam(':id', $id);
        
        if ($sql->execute()) {
            echo "Exclusão bem-sucedida";
        } else {
            echo "Erro na exclusão";
        }
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
                url: "createDoctors.php",
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