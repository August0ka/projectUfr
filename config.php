<?php
   try {
       $conn = new PDO('mysql:host=localhost;dbname=clinic', 'root', '');
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch(PDOException $e) {
       echo 'ERROR: ' . $e->getMessage();
   }
?>
