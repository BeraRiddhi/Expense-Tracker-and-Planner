<html>
    <head>
        <style>
            table{
                background-color: pink;
            }
        </style>
    </head>
<body style="font-family: sans-serif;">
<?php 
$username = "root"; 
$password = "kacchu01"; 
$database = "project"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

$d1=$_POST['d1'];
$d2=$_POST['d2'];

$query = "SELECT * FROM expense WHERE Dates BETWEEN '$d1' AND '$d2';";


echo '<table border="3" cellspacing="2" cellpadding="2" style="text-align:center"> 
      <tr> 
          <td> <font face="sans-serif">Expense</font> </td> 
          <td> <font face="sans-serif">Amount</font> </td> 
          <td> <font face="sans-serif">Date</font> </td> 
          
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Expense"];
        $field2name = $row["Amount"];
        $field3name = $row["Date"];
       

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                
              </tr>';
    }
    $result->free();
} 
?>

</body>
</html>