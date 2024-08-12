<?php 
    include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    
    <form action="" method="POST">
        <label for="">First Name:</label>
        <input type="text" name="firstname"><br><br>
        <label for="">Last Name:</label>
        <input type="text" name="lastname"><br><br>
        <label for="">Age:</label>
        <input type="text" name="age"><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php

    if(isset($_POST['submit'])){

 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];

    $sql = "INSERT INTO `user` (`firstname`,`lastname`,`age`) VALUES ('$firstname', '$lastname', '$age')";
    if($conn->query($sql) == true){
        echo"data insert successfully";
    }
}
?>