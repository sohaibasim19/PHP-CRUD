<?php
    include "config.php";  

    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
    
        $sql = "SELECT * FROM user WHERE id = $id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $age = $row['age'];
        } }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        $sql = "UPDATE user SET firstname='$firstname', lastname='$lastname', age='$age' WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: index.php");  
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
    <h1>Edit Record</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" required><br><br>
        
        <label for="age">Age:</label>
        <input type="text" name="age" value="<?php echo htmlspecialchars($age); ?>" required><br><br>
        
        <input type="submit" value="Update Record">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
