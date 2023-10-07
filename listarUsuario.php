<?php 
$sql = "SELECT * FROM usuarios";
$res = $conn-> query($sql);
$qtd = $res->num_rows;

//if para testar se tem usuarios
if($qtd > 0){

    print "<table class= 'table table-striped table-hover table-bordered'>";
    
    print "<tr>";
    print "<th> # </th>";
    print "<th> NOME </th>";
    print "<th> EMAIL</th>";
    print "<th>DATA NASCIMENTO</th>";
    print "<th>AÇÕES</th>";
    print "</tr>";
    
    
    
    
    
    
    //variavel row = array que carrega os dados da tabela
    while($row = $res->fetch_object()){
    print "<tr>";
    print "<td>" .$row-> id. "</td>";
    print "<td>" .$row-> nome. "</td>";
    print "<td>" .$row-> email. "</td>";
    print "<td>"  .$row-> data_nasc. "</td>";
    //botao excluir leva pro arquivo salvarusuario.php e executa um comando sql de exclusão
    print "<td>  <button onclick= \"if(confirm('tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}\"class='btn btn-danger'>EXCLUIR</button> </td>";
    print "</tr>";
}   

    print"</table>";
}else{
    print "<p class= 'alert alert-danger'> NÃO ECONTROU RESULTADO! </P>";
}



?>