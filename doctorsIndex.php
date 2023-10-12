<?php
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from doctors where active = 1');
$sql->execute();
$doctors = $sql->fetchAll(PDO::FETCH_ASSOC);

echo '<a class="btn btn-success" href="doctorsForm.php" role="button" style="margin-top: 8%; margin-left:2%; margin-bottom: 2% ">Cadastrar</a>';

if(count($doctors) > 0){
    
    echo "<legend style= 'padding-left:15%; padding-bottom:2%'>MÉDICOS</legend> ";
    
    echo "<div class='container-fluid' style='display:grid; justify-content: center; align-items: center;'>";
    echo "<table class='table table-success table-striped ' style='margin:auto; margin-right: 10%;max-width: 100%;'>";
    
    echo "<tr>";
        echo "<th>#</th>";
        echo "<th>CRM</th>";
        echo "<th>NOME</th>";
        echo "<th>EMAIl</th>";
        echo "<th>TELEFONE</th>";
        echo "<th>ESPECIALIDADE</th>";
        echo "<th></th>";
        echo "</tr>";
        
        foreach ($doctors as $row) {
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['CRM'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['expertise'] . "</td>";
                echo "<td style='border-left: 5px solid gainsboro;'>
                <a href='editDoctors.php?id=" . $row['id'] . "' class='btn btn-primary'>EDITAR</a>
                <button data-id='" . $row['id'] . "' class='btn btn-danger delete-btn'>EXCLUIR</button></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
            echo "</div>";

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