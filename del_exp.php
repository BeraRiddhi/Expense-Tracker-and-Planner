<?php
session_start();
include('dbconn.php');
$uid = $_SESSION['uid'];


    $name=$_GET['id'];
    $sql=mysqli_query($conn,"DELETE FROM expense WHERE Name ='$name' and username='$uid';");
    header('Location:Delete_Expense.php');

?>