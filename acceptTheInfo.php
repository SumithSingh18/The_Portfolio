<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userQuery"; // Provide the name of your database

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    } else {
        echo "Connection successful";
    }
    
    // Creating database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";    
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating database: " . $conn->error;
    } else {
        echo "Database created successfully";
    }

    // Creating table
    $sql = "CREATE TABLE IF NOT EXISTS info (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(40),
        email VARCHAR(40),
        messages VARCHAR(200)
    )";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    } else {
        echo "Table created successfully";
    }

    $sql = "INSERT INTO info (name, email, messages) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Query executed successfully
        echo "Data inserted successfully.";
    } else {
        // Error occurred during query execution
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
