<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="style_pro.css"/>


    </head>
<?php

include('dbconn.php');

$uid = $_SESSION['uid'];
//$query="SELECT SUM(Amount) FROM EXPENSE;";


$query1=mysqli_query($conn,"SELECT SUM(Amount) AS totalexp FROM expense WHERE( (username) = '$uid' );");
$result=mysqli_fetch_array($query1);
$sum_total_expense=$result['totalexp'];


$query2=mysqli_query($conn,"SELECT SUM(Amount) AS totalexp1 FROM expense WHERE( (username) = '$uid' ) AND Dates=CURDATE();");
$result2=mysqli_fetch_array($query2);
$sum_total_expense_tod=$result2['totalexp1'];

$query3=mysqli_query($conn,"SELECT SUM(Amount) as mon from Expense  Where Month(Dates)= Month(CURDATE()) and username = '$uid'; ");
$result3=mysqli_fetch_array($query3);
$exp_m=$result3['mon'];

$query4=mysqli_query($conn,"SELECT SUM(Amount) as yea from Expense  Where Year(Dates)= Year(CURDATE()) and username = '$uid'; ");
$result4=mysqli_fetch_array($query4);
$exp_y=$result4['yea'];


if(isset($_POST['submit']))
{
    $lim=$_POST['lim'];
    $q1 = mysqli_query($conn,"UPDATE `limit_t` SET `limit_expense`='$lim' WHERE username='$uid';");

}
$q15 = mysqli_query($conn,"SELECT `limit_expense` as le FROM `limit_t` WHERE  username='$uid';");
$r15 = mysqli_fetch_array($q15);
if($q15!=NULL)
{
    $lime = $r15['le'];
}

if($exp_m>=$lime)
{
echo '<script>alert("You have reached your Expense Limit")</script>';
}




?>


<?php


//echo $uid;
$ctr=0;


    $query = mysqli_query($conn,"SELECT * FROM Planner where username = '$uid' and (Deadline-CURDATE())<=10 and (Deadline-CURDATE())>=0 ;");

    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
    {

        $ctr=$ctr+1;
    }

?>
<div class="sidebar">
    <h3>Actions</h3>
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
<br>
<center>
    <div class="head">
<?php

echo "<b>Expense Tracker and Planner</b>";
echo '<br><br>';
?>
</div>
<?php


echo '<center><table style="block-size:190px"><tr><td><div class="Dash"><h1>Total Expense (Rs)</h1><h2>'.$sum_total_expense.'</h2></div></td><td><div class="Dash"><h1>Number of Upcoming Plans</h1><h2>'.$ctr.'</h2></div></td></tr></table></center>';

echo '<center><table style="block-size:190px"> <tr><td><div class="Dash"><h1>Today\'s Expense (Rs)</h1><h2>'.$sum_total_expense_tod.'</h2></div></td><td><div class="Dash"><h1>Monthly Expense (Rs)</h1><h2>'.$exp_m.'</h2></div></td><td><div class="Dash"><h1>Yearly Expense</h1><h2>'.$exp_y.'</h2></div></td></tr></table></center>';

?>
<div class="plan">
<?php

    $query = mysqli_query($conn,"SELECT * FROM Planner where username = '$uid' and (Deadline-CURDATE())<=10 and (Deadline-CURDATE())>=0 ;");

    echo '<b style="text-shadow: 1px 1px black">Upcoming Deadlines</b><br>';

    echo '<br>';

    echo '<table border="1px solid black " style="border-style:solid; border-color:black;style="block-size:190px""><tr><td><b>Name</b></td><td><b>Deadline</b></td></tr>';
    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
    {

        $ctr=$ctr+1;

        echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Deadline'].'</td</tr>';
    }

?>
</div>
<div class="right">
    <?php
    echo "Welcome $uid";


    ?>
   <!--  <form action="index_2.php" method="POST">
    <br><br><button type="submit" name="sub">Logout</button>

    </form>-->
    <br><br>
    <a href="logout.php"><button>Logout</button></a><br><br>
    <form action="" method="POST">
        <input  type="number" name="lim" placeholder="Expense Limit">
    <br><br><button type="submit" name="submit">Add Expense Limit</button>
    </form>
</div>
</center>
<?php
/*if(isset($_POST['sub']))
{
    unset($_SESSION['uid']);
}*/
?>





</html>
