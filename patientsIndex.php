<?php 
include 'header.php';
include 'config.php';

$sql = $conn->prepare('select * from patient');
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
        echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row['id'] . "';}\" class='btn btn-danger'>EXCLUIR</button></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
} else {
    echo "<p style='font-weight: bold;  color: red; font-style: italic; display: flex; justify-content: center;'>Nenhum registro encontrado !</p>";
}
?>
