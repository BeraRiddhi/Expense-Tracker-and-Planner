<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
//$stmt = $conn->prepare("INSERT INTO expense (ename, amount, date) VALUES ($ename, $amount, $date)");
//$stmt->bind_param("sss", $ename, $amount, $date);

// set parameters and execute
$pname = $_POST['plan'];
$deadline = $_POST['date'];

//$stmt->execute();



$stmt = $conn->prepare("INSERT INTO planner (Name,Deadline) VALUES (?,?)");
$stmt->bind_param("ss", $pname,$deadline);
$stmt->execute();

echo "New records created successfully";


if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 




$stmt->close();
$conn->close();
?>
<html>
    <body>
        <a href="Expense.html"><button>Add</button></a>
        <a href="Expense_Records.php"><button>Records</button></a>
    </body>
</html>