<?php
include 'config.php';

if (    
    isset($_POST['name']) &&
    isset($_POST['CPF']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['address']))
    {
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];   
        $name = $_POST['name'];
        $CPF = $_POST['CPF'];

        try {
            $query = $conn->prepare('INSERT INTO patient(CPF, name, email, phone, address) VALUES (?, ?, ?, ?, ?)');
            $query->bindParam(1, $CPF, PDO::PARAM_INT);
            $query->bindParam(2, $name, PDO::PARAM_STR);
            $query->bindParam(3, $email, PDO::PARAM_STR);
            $query->bindParam(4, $phone, PDO::PARAM_STR); 
            $query->bindParam(5, $address, PDO::PARAM_STR);
            $execute = $query->execute();

            if ($execute) { 
                echo "<script>alert('Consulta marcada com sucesso!');</script>";
                header("Location: patientsIndex.php");
                exit;
            } else {
                echo "<script>alert('Erro ao inserir dados no banco de dados!');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Erro no banco de dados: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos corretamente');</script>";
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