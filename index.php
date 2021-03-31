

<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: LoginPage.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: LoginPage.php");
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    
  $uid=$_POST['username'];
  }
  
?>




<html>
    <head>
        <style>
            .Des{
                background-color: yellow;
                font-family: monospace;
                width: 500px;
                height: 250px;
            }
        </style>
    </head>
<?php


$username = "root"; 
$password = "kacchu01"; 
$database = "Project"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 


$query="SELECT SUM(Amount) FROM EXPENSE;";

$query5=mysqli_query($mysqli,"SELECT SUM(Amount) AS totalexp FROM EXPENSE where username = '".$uid."'");
$result5=mysqli_fetch_array($query5);
$sum_total_expense=$result5['totalexp'];
?>

<div class="Des">

<?php
echo "Total Expense:";
echo $sum_total_expense;

?>





</html>