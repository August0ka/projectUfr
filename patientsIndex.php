<?php 
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from patient');
$sql->execute();
$patients = $sql->fetchAll(PDO::FETCH_ASSOC);
  

if(count($patients) > 0){

    echo "<table class='table table-striped table-hover table-bordered' style='margin-top: 400px'>";
    
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
        echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row['id'] . "';}\" class='btn btn-danger'>EXCLUIR</button></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
} else {
    echo "<p style='margin-top: 400px'>Nenhum registro encontrado</p>";
}
?>
