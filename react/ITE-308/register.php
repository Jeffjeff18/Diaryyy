<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "exam";

// Create a connection to the MySQL database
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Insert user data into the "register" table without hashing the password
    $sql = "INSERT INTO register (userName, password, email) VALUES ('$userName', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful, so redirect to index.html
        header("Location: index.html");
        exit(); // Ensure that no further PHP code is executed
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
