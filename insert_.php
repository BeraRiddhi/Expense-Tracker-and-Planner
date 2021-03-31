<?php
session_start();


// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect("localhost",$username,$password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
//$stmt = $conn->prepare("INSERT INTO expense (ename, amount, date) VALUES ($ename, $amount, $date)");
//$stmt->bind_param("sss", $ename, $amount, $date);

// set parameters and execute
$ename = $_POST['ename'];
$amount = $_POST['amount'];
$date = $_POST['date'];
//$stmt->execute();



//$stmt = $conn->prepare("INSERT INTO expense (Expense, Amount, Dates) VALUES (?,?,?)");
//$stmt->bind_param("sis", $ename, $amount, $date);
//$stmt->execute();

$sql="INSERT INTO expense (Name, Amount, Dates) VALUES ($ename,$amount,$date)";
$result = mysqli_query($conn, $sql);


echo "New records created successfully";


if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 


/*

// Attempt select query execution
$sql = "SELECT * FROM expense";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Expense</th>";
                echo "<th>Amount</th>";
                echo "<th>Date</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['ename'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}*/


//$stmt->close();
//$conn->close();
?>
<html>
    <body>
        <a href="Expense.html"><button>Add</button></a>
        <a href="Expense_Records.php"><button>Records</button></a>
    </body>
</html>