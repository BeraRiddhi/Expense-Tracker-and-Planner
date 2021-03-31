<?php
session_start();
include('dbconn.php');
$uid = $_SESSION['uid'];
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
<?php

if(isset($_POST['submit']))
{
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    if($d1=="" || $d2=="")
    {
    echo '<script>alert("Please fill all the details");</script>';
    }
    else{
    $query = mysqli_query($conn,"SELECT * FROM expense WHERE Dates BETWEEN '$d1' AND '$d2' and username = '$uid';");

    if($query)
    {
    $numrow = mysqli_num_rows($query);
    }
    else
    {
        $numrow=0;
    }

    
    if($numrow==0)
    {
        echo "<script>alert( 'No Expenses');</script>";
    }

    else
    {
?>
<center>

<?php
$sum=0;
        echo '<table border="1" style="font-style:sans-serif;font-size:20px;text-align:center; border:3px solid black; border-collapse:collapse; width:500px; background-color:white;"><tr><td style="font-size:30px;"><b>Name</b></td><td style="font-size:30px;"><b>Amount</b></td><td style="font-size:30px;"><b>Dates</b></td></tr>';
        while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
        {
            $sum=$sum+$row['Amount'];
            

            echo '<tr><td>'.$row['Name'],'</td>
            <td>'.$row['Amount'],'</td>
            <td>'.$row['Dates'].'</td></tr>'; 
        }
        echo '<tr><td><h3>Total Amount</h3></td><td colspan="2"><h3>'.$sum.'</h3></td></tr>';
        
        
    }
}
}




?>

<?php

//echo '<table border="1" style="font-style:sans-serif;font-size:20px;text-align:center;border:3px solid black; border-collapse:collapse:collapse;width:500px; background-color:white;><tr><td>Total Sum</td><td>'.$sum.'</td></tr></table>';


?>
</center>
<center>
<h2>Analyse Expense</h2>
<div class="form2">
        <form action="" method="POST">
            <h1>Date 1</h1><br>
            <input type="date" name="d1">
            <h1>Date 2</h1><br>
            <input type="date" name="d2"><br><br>
            <button type="submit" class="button1" name="submit">Submit</button>
        </form>
</div>

<br><br>

        </center>
    </body>
</html>

