<?php
include_once("access.php");

if (isset($_POST['uname']) && isset($_POST['pin'])) {
    $username = $_POST['uname'];
    $password = $_POST['pin'];

    $query = "SELECT * FROM your_table_name WHERE uname = '$username' AND pin = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        
    } else {
        header("Location: login1.php?error=Invalid username or password");
    }
}
?>
