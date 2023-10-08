<?php
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from doctors');
$sql->execute();
$doctors = $sql->fetchAll(PDO::FETCH_ASSOC);


if(count($doctors) > 0){
    
    echo "<table class='table table-striped table-hover table-bordered' style='margin-top: 400px'>";
        
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
                echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row['id'] . "';}\" class='btn btn-danger'>EXCLUIR</button></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
        } else {
            echo "<p style='margin-top: 400px'>Nenhum registro encontrado</p>";
        }
        
?>