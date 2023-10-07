<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ( '{$nome}','{$email}','{$senha}','{$data_nasc}')";
        //conecta no servidor sql pelo arquivo config.php
        $res = $conn ->query($sql);

        if($res==true ){
            print "<script>alert('Cadastro com sucesso');</script>";
        }
        else{
            print "<script>alert('Não foi possivel cadastrar');</script>";

        }
        break;


   
    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

        $res = $conn ->query($sql);

        if($res==true){
            print"<script>alert('Excluido com sucesso');>/script";
            print"<script>location.href='?page=listar';/script";
        }


            break;



}


?>



