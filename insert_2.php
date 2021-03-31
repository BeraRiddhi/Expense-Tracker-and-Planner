<?php 
session_start();
include('dbconn.php');
ob_start();
$uid = $_SESSION['uid'];
?>
<html>
    <head>
        <link rel="stylesheet" href="style_pro2.css">
    
        

    </head>
    
    <body style="background-image: url('images/work1.jpg');background-size: 1560px 1000px;background-repeat: no-repeat;">
    <div class="sidebar">
    <h3>Actions</h3>
    <a href="Dashboard.php"><button>Dashboard</button></a><br><br>
    <a href="insert_2.php"><button>Add Expense</button></a><br><br>
  <a href="planner.php"><button>Add Plan</button></a><br><br>
  <a href="Exp_analyse.php"><button>Analyse Expense</button></a><br><br>
  <a href="plan_analyse.php"><button>Analyse Plan</button></a><br><br>
  <a href="Exp_update.php"><button>Update Expense</button></a><br><br>
  <a href="plan_update.php"><button>Update Plan</button></a><br><br>
  <a href="expense_list.php"><button>View Expenses</button></a><br><br>
  <a href="plan_list.php"><button>View Plans</button></a><br><br>
  <a href="Delete_Expense.php"><button>Delete Expense</button></a><br><br>
  <a href="Delete_Planner.php"><button>Delete Plan</button></a><br><br>
  
</div>
    <center>
        <h2>Add Expense</h2>
    <form action="" method="POST" class="form3">
            <h1>Name</h1><br>
            <input type="text" name="name">
            <h1>Amount</h1><br>
            <input type="text" name="amount">
            <h1>Date</h1><br>
            <input type="date" name="date"><br><br>
            <button class="button1" type="submit" name="submit">Submit</button>
        </form>
</center>
    </body>
</html>
<?php
echo $uid;
if(isset($_POST['submit']))
{
    
    $name = $_POST['name'];
    
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $uid = $_SESSION['uid'];
if($name=="" || $amount=="" || $date=="")
{
    echo '<script>alert("Please fill all the details");</script>';
}
else {
$query = mysqli_query($conn,"INSERT INTO  `expense`( `username`, `Name`, `Amount`, `Dates`) VALUES ('$uid','$name','$amount','$date');");

if($query)
{
    header('location:Dashboard.php');
}
    
else
{
    echo '<script>alert("Please fill the correct details");</script>';
}

}
}
?>
