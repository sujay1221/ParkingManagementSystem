<?php
    session_start()

?>

<!DOCTYPE html>
<html>
<head>
  <title> Complaint History </title>
</head>

<body>
  <table>
  <tr>
    <th> <center> Owner Id </center> </th>
    <th> <center> First Name </center></th> 
    <th> <center> Last Name </center> </th> 
    <th> <center> Mobile No </center> </th> 
    <th> <center> Complaints </center> </th> 
  </tr>

<?php

  include("database.php");
    
  $sql = "SELECT a.owner_id,o.owner_fname,o.owner_lname,o.owner_phno,complaint FROM user_complaint a,owner_table o where a.owner_id=o.owner_id and a.owner_id=".$_SESSION['log_name'].""; 
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc()) 
    {
      echo "<tr><td>" . $row["owner_id"]. "</td><td>" . $row["owner_fname"] .  "</td><td>" . $row["owner_lname"]. "</td><td>" . $row["owner_phno"]. "</td><td><textarea disabled style=\"height:200px;width:500px;font-size:20px\">" . $row["complaint"]. "</textarea></td></tr>";
    }

    echo "</table>";
  }
  else 
    { 
      echo "<tr><td></td><td></td><td> No Complaints.</td><td></td></tr></table>";
    }

  $conn->close();
?>
  </table>
  <center> <a href="user_home.php"> Go Back </a> </center>
    
</body>
</html>