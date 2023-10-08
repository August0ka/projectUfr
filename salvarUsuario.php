<?php
    include 'config.php';

    if(isset($_POST['email']) && $_POST['password']){
        $email = $_POST['email'];
        $password = $_POST['password'];
      }

        $sql = $conn->prepare('select * from admin');
        $sql->execute();
        $admin = $sql->fetchAll(PDO::FETCH_ASSOC);
        $data=$admin[0];
        


        if ($email == $data['email'] && $password == $data['password']) {
            ob_start();
            include 'app/consult/index.php'; // Substitua 'minha_view.php' pelo nome do seu arquivo de view
            $returnView = ob_get_clean();
            echo $returnView;
        }
        else{
            print "<script>alert('Usuario ou senha incorretos');</script>";
            ob_start();
            include 'index.php'; // Substitua 'minha_view.php' pelo nome do seu arquivo de view
            $returnView = ob_get_clean();
            echo $returnView;
        }


?>



