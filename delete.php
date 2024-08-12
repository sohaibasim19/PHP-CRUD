<?php
    include "config.php";  

    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

       
        $sql = "DELETE FROM user WHERE id=$id";
        $result = $conn->query($sql);
    }
      
?>
