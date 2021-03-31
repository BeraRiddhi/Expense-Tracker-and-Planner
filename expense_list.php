<?php
session_start();
include('dbconn.php');
$uid = $_SESSION['uid'];
?>
<html>
    <head>
        <link rel="stylesheet" href="style_pro2.css">
    </head>
<body style="background-image: url('images/work1.jpg');
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
<h4>List of Expenses </h4>
<?php

echo '<table border="1" style="font-size:20px;text-align:center; border:3px solid black; border-collapse:collapse; width:500px"><tr><td style="font-size:30px;"><b>Name</b></td><td style="font-size:30px;"><b>Amount</b></td><td style="font-size:30px;"><b>Dates</b></td></tr>';

while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    

    echo '<tr><td>'.$row['Name'],'</td>
     <td>'.$row['Amount'],'</td>
     <td>'.$row['Dates'].'</td></tr>'; 
}

?>
</div>
</center>
</body>
</html>