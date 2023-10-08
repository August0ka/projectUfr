<?php
include 'header.php';
include 'configs.php';

$sql = $conn->prepare('select * from consult');
$sql->execute();
$consults = $sql->fetchAll(PDO::FETCH_ASSOC);


if(count($consults) > 0){
    
    echo "<table class='table table-striped table-hover table-bordered' style='margin-top: 400px'>";
        
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
            echo "<p style='margin-top: 400px'>Nenhum registro encontrado</p>";
        }
        
?>
