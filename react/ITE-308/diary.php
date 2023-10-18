<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "exam";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $database);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted (for adding new entries)
if (isset($_POST['top']) && isset($_POST['cat']) && isset($_POST['con']) && isset($_POST['date'])) {
    // Retrieve data from the form
    $top = $_POST['top'];
    $cat = $_POST['cat'];
    $con = $_POST['con'];
    $date = $_POST['date'];

    // Create an SQL INSERT query to add the data to the "diary" table
    $sql = "INSERT INTO diary (top, cat, con, date) VALUES ('$top', '$cat', '$con', '$date')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Diary entry added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch and display existing diary entries
$sql = "SELECT * FROM diary";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add CSS styles to format the table */
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .topnav {
            background-color: none;
            overflow: hidden;
        }

        .topnav a {
            float: left;
            color: white;
            text-align: center;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 15px;
        }

        .topnav a:hover {
            background-color: lightgray;
            color: black;
        }

        .topnav a.active {
            background-color: teal;
            color: white;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <header class="topnav">
        <a class="active" href="page2.html">Back</a>
    </header>

    <h1>Diary Entries</h1>
    <table>
        <tr>
            <th>Topic</th>
            <th>Category</th>
            <th>Content</th>
            <th>Date</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["top"] . "</td>";
            echo "<td>" . $row["cat"] . "</td>";
            echo "<td>" . $row["con"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
