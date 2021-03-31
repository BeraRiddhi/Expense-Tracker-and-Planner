<?php
session_start();
include('dbconn.php');
$uid = $_SESSION['uid'];


if(isset($_POST['sub']))
{
$name=$_POST['name1'];
$amount=$_POST['amount1'];
$date=$_POST['date1'];
    if($name=="" || $amount=="" || $date=="")
    {
    echo '<script>alert("Please fill all the details");</script>';
    }
    else{
    $sql=mysqli_query($conn,"UPDATE `expense` SET `Name`='$name',`Amount`='$amount',`Dates`='$date' WHERE username='$uid' and Name='$name';");
    }
}   


?>
<html>
    <head>
    <script>
    function del(name)
    {
        alert(name);
    }
    
</script>
    <link rel="stylesheet" href="style_pro2.css">
    </head>
<body style=" background-image: url('images/work3.jpg');
                background-size: 1560px 1000px;
                background-repeat: no-repeat;">
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

    <?php
$query = mysqli_query($conn,"SELECT * FROM Expense where username = '$uid';");
?>
<center>
<div class="tab" >
<h2>Update Expense </h2>
<?php

echo '<table border="1" style="font-size:20px;text-align:center; border:3px solid black; border-collapse:collapse; width:500px"><tr><td style="font-size:30px;"><b>Name</b></td><td style="font-size:30px;"><b>Amount</b></td><td style="font-size:30px;"><b>Date</b></td></tr>';

while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    
    $n=$row['Name'];
    echo '<tr><td>'.$row['Name'],'</td>
     <td>'.$row['Amount'],'</td>
     <td>'.$row['Dates'].'</td>';
}



?>


</div>

<div class="del">
<form action="" method="POST">
    <h3>Enter the Name  </h3>
    <input type="text" name="name1" id="name1"><br><br>
    <h3>Enter the Amount  </h3>
    <input type="text" name="amount1" id="amount1"><br><br>
    <h3>Enter the Date </h3>
    <input type="date" name="date1" id="date1"><br><br>
    <button type="submit" class="button1" name="sub">Update</button>

</form>
<br><br><br>
</div>
</center>
</body>
</html>