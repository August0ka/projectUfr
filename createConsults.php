<?php
include 'config.php';

if (    
    isset($_POST['doctor_id']) &&
    isset($_POST['patient_id']) &&
    isset($_POST['description']) &&
    isset($_POST['date']) &&
    isset($_POST['hour']))
    {
        $description = $_POST['description'];
        $patient_id = $_POST['patient_id'];
        $doctors_id = $_POST['doctor_id'];
        $data = $_POST['date'];
        $hour = $_POST['hour'];

        try {
            $query = $conn->prepare('INSERT INTO consult(doctors_id, patient_id, description, data, hour) VALUES (?, ?, ?, ?, ?)');
            $query->bindParam(1, $doctors_id, PDO::PARAM_INT);
            $query->bindParam(2, $patient_id, PDO::PARAM_INT);
            $query->bindParam(3, $description, PDO::PARAM_STR);
            $query->bindParam(4, $data, PDO::PARAM_STR); 
            $query->bindParam(5, $hour, PDO::PARAM_STR);
            $execute = $query->execute();

            if ($execute) {
                echo "<script>alert('Consulta marcada com sucesso!');</script>";
                header("Location: consultIndex.php");
                exit;
            } else {
                echo "<script>alert('Erro ao inserir dados no banco de dados!');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Erro no banco de dados: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos corretamente: doctors_id, patien_id, description, data e time!');</script>";
    }

    if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id'])) {
        $id = $_POST['id'];
        
        $sql = $conn->prepare('UPDATE consult SET active = 0 WHERE id = :id');
        $sql->bindParam(':id', $id);
        
        if ($sql->execute()) {
            echo "Exclusão bem-sucedida";
        } else {
            echo "Erro na exclusão";
        }
    }

?>