<?php
    include 'config.php';

    if(isset($_POST['email']) && $_POST['password']){
        $password = $_POST['password'];
        $email = $_POST['email'];
    }

        $sql = $conn->prepare('select * from admin');
        $sql->execute();
        $admin = $sql->fetchAll(PDO::FETCH_ASSOC);
        $data=$admin[0];

        if ($email == $data['email'] && $password == $data['password']) {
            header("Location: consultIndex.php");
            exit;

        }
        else {
            print "<script>alert('Usuario ou senha incorretos');</script>";
            ob_start();
            include 'index.php';
            $returnView = ob_get_clean();
            echo $returnView;
        }

?>



