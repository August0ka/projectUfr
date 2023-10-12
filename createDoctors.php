<?php
include 'config.php';

if (    
    isset($_POST['expertise']) &&
    isset($_POST['phone']) &&
    isset($_POST['email']) &&
    isset($_POST['name']) &&
    isset($_POST['CRM'])
    )
    {
        $expertise = $_POST['expertise'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];   
        $name = $_POST['name'];
        $CRM = $_POST['CRM'];

        try {
            $query = $conn->prepare('INSERT INTO doctors(CRM, name, email, phone, expertise) VALUES (?, ?, ?, ?, ?)');
            $query->bindParam(1, $CRM, PDO::PARAM_INT);
            $query->bindParam(2, $name, PDO::PARAM_STR);
            $query->bindParam(3, $email, PDO::PARAM_STR);
            $query->bindParam(4, $phone, PDO::PARAM_STR); 
            $query->bindParam(5, $expertise, PDO::PARAM_STR);
            $execute = $query->execute();

            if ($execute) {
                echo "<script>alert('Consulta marcada com sucesso!');</script>";
                header("Location: doctorsIndex.php");
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
        
        $sql = $conn->prepare('UPDATE doctors SET active = 0 WHERE id = :id');
        $sql->bindParam(':id', $id);
        
        if ($sql->execute()) {
            echo "Exclusão bem-sucedida";
        } else {
            echo "Erro na exclusão";
        }
    }
    
?>