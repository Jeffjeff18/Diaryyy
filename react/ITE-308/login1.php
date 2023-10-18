<?php
session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "exam";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['uname']) && isset($_POST['pin'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pin = validate($_POST['pin']);

    if (empty($uname) || empty($pin)) {
        header("Location: login2.php?error=Username and password are required");
        exit();
    } else {
        $sql = "SELECT * FROM register WHERE userName = '$uname' AND password = '$pin' LIMIT 1"; // Changed 'pin' to 'password'
        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            die("Query error: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) === 1) {
            header("Location: page2.html");
            exit();
        } else {
            header("Location: login2.php?error=Incorrect Username and Password, Please Try Again");
            exit();
        }
    }
} else {
    header("Location: login2.php");
}
