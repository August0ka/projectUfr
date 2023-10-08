<?php
include 'config.php';

/*if (isset ($_REQUEST)) {
    // Get the form data
    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    var_dump($_REQUEST);

    // Prepare the SQL statement
    $sql = $conn->prepare("INSERT INTO consult (doctors_id, patient_id, description, data, hour) VALUES ($doctor_id, $patient_id , $description, $date, $time)");

    // Bind the parameters


    // Execute the statement
    if ($sql->execute()) {
        // Consult saved successfully
        echo "Consult saved successfully!";
    } else {
        // Error saving consult
        echo "Error saving consult: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
*/

    $consulta = $conn->prepare('select * from consult');
    $consulta->execute();
    $disciplinas = $consulta->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['confirme'])) {
    if (isset($_POST['doctors_id']) && isset($_POST['patien_id']) && isset($_POST['description']) && isset($_POST['data']) && isset($_POST['time'])) {
        $doctors_id = $_POST['doctors_id'];
        $patien_id = $_POST['patien_id'];
        $description = $_POST['description'];
        $data = $_POST['data'];
        $time = $_POST['time'];
        

        try {
            $query = $conn->prepare('INSERT INTO alunos (doctors_id, patien_id, description, data, time) VALUES (?, ?, ?, ?, ?)');
            $query->bindParam(1, $doctors_id, PDO::PARAM_INT);
            $query->bindParam(2, $patien_id, PDO::PARAM_INT);
            $query->bindParam(3, $description, PDO::PARAM_STR);
            $query->bindParam(4, $data, PDO::PARAM_STR); // Use PDO::PARAM_STR para data
            $query->bindParam(5, $time, PDO::PARAM_STR); // Use PDO::PARAM_STR para hora
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
      var_dump($doctors_id, $patien_id, $description, $data, $time);
        //echo "<script>alert('Preencha todos os campos corretamente: doctors_id, patien_id, description, data e time!');</script>";
    }
}
?>