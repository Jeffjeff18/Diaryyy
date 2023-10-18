<?php
include_once("access.php");

if (isset($_POST['uname']) && isset($_POST['pin'])) {
    $username = $_POST['uname'];
    $password = $_POST['pin'];

    $query = "SELECT * FROM your_table_name WHERE uname = '$username' AND pin = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        
        header("Location: page2.html");
        exit();
    } else {
        header("Location: login.php?error=Invalid username or password");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <br><br><br><br><br><br>
        <div class="login">
            <fieldset>
                <label for="uname">Username:</label>
                <input type="text" id="uname" name="uname"><br><br><br>
                <label for="pin">Password:</label>
                <input type="password" id="pin" name="pin"><br><br><br>
                <button type="submit">Login</button>
            </fieldset>
            <?php if(isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        </div>
    </form>
</body>
<style>
    .error {
        color: red;
    }
</style>
</html>
