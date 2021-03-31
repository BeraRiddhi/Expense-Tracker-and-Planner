<html>
<body style="font-family: sans-serif;">
<?php 
$username = "root"; 
$password = "kacchu01"; 
$database = "Project"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM expense";


echo '<table border="3" cellspacing="2" cellpadding="2" style="text-align:center"> 
      <tr> 
          <td> <font face="sans-serif">Expense</font> </td> 
          <td> <font face="sans-serif">Amount</font> </td> 
          <td> <font face="sans-serif">Date</font> </td> 
          
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        
        $field1name = $row["Name"];
        $field2name = $row["Amount"];
        $field3name = $row["Dates"];
       

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td><button></button></td>
                
              </tr>';
    }
    $result->free();
} 
?>
<a href="Dashboard.php"><button>Click</button></a>
</body>
</html>