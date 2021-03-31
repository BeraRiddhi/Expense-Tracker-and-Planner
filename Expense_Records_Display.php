<html>
<head>
<script>
   function update()
   {
        document.getElementById('up').innerHTML.style.visibilty="visible";
   }
</script>
</head>

<?php 
$username = "root"; 
$password = ""; 
$database = "mydb"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM expense";


echo '<table border="3" cellspacing="2" cellpadding="2" style="text-align:center"> 
      <tr> 
      <td> <font face="sans-serif">ID</font> </td>
          <td> <font face="sans-serif">Expense</font> </td> 
          <td> <font face="sans-serif">Amount</font> </td> 
          <td> <font face="sans-serif">Date</font> </td> 
          
          
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Expense"];
        $field2name = $row["Amount"];
        $field3name = $row["Dates"];
       

        echo '<tr> 
        <td>'.$row['id'].'</td> 
                  <td>'.$row['Expense'].'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  
                
              </tr>';
    }
    $result->free();
} 
?>
<body style="font-family: sans-serif;">
<a href="Dashboard.php"><button>Click</button></a>

<h1>Delete</h1>
<form action="Delete_Expense.php" method="POST" style="visibility: hidden;">
    <input type="text" id="del" name="id">
    <button type="submit">Delete</button>
</form>
<h1>Update</h1>
<button onclick="update">Update</button>

<h1>Update</h1>
<form action="Update_Expense.php" method="POST" style="visibility: hidden;" id="up">
<input type="text" id="del" name="id">
    <input type="text" id="del" name="Expense">
    <input type="text" id="del" name="Amount">
    <input type="text" id="del" name="Date">
    <button type="submit">Update</button>
</form>
</body>
</html>