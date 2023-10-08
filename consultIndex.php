<?php
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from consult');
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
                echo "<td>" . $row['doctors_id'] . "</td>";
                echo "<td>" . $row['patient_id'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['data'] . "</td>";
                echo "<td>" . $row['hour'] . "</td>";
                echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row['id'] . "';}\" class='btn btn-danger'>EXCLUIR</button></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
        } else {
            echo "<p style='font-weight: bold;  color: red; font-style: italic; display: flex; justify-content: center;'>Nenhum registro encontrado !</p>";
        }
        
?>
