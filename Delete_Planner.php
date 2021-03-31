<?php
session_start();
include('dbconn.php');
$uid = $_SESSION['uid'];

if(isset($_POST['sub']))
{
    $name=$_POST['name1'];
    if($name=="")
    {
    echo '<script>alert("Please fill all the details");</script>';
    }
    else{
    $sql=mysqli_query($conn,"DELETE FROM Planner WHERE Name ='$name' and username='$uid';");
    $query1 = mysqli_query($conn,"SELECT * FROM Planner Name='$name' and where username = '$uid';");
    if(!$sql)
    {
        echo "<script>alert( 'No such Plan Exists');</script>";
    
    }
}
}


$uid = $_SESSION['uid'];

$sql=mysqli_query($conn,"SELECT * FROM Planner where username='$uid';");
echo '<center><table border="1" class="tab" style="font-size:20px;text-align:center; border:3px solid black; border-collapse:collapse; width:500px; background-color:white;"><tr><td style="font-size:30px;"><b>Name</b></td><td style="font-size:30px;"><b>Deadline</b></td></tr>';

while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    
    $n=$row['Name'];
    echo '<tr><td>'.$row['Name'],'</td>
     <td>'.$row['Deadline'],'</td></tr>';
}




?>
<html>
    <head>
    <link rel="stylesheet" href="style_pro2.css">

    </head>
    <body style="background-image: url('images/plan3.png');
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
        <h2>Delete Plans</h2>
        <div class="del2"> 
    <form action="" method="POST" >
        <h3>Enter the Name of Plan</h3>
    <input type="text" name="name1" id="name1"><br><br>
    <button type="submit" class="button1" name="sub">Delete</button>

</form><br><br>
        </div>
    </body>
</html>