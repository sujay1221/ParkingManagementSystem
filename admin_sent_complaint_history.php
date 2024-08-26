<!DOCTYPE html>
<html>
<head>
  <title> Complaint History </title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link  rel="stylesheet" href="css/table.css">
</head>

<body background="img/3.jpg">
  <div class="container-fluid">
  <div class="row">
    <div class="col">
      <center>
        <img class="img-thumbnail" width="150px" src="img/admin.webp">
</center>
    </div>
    <div class="col-4">
    <center>
      <br>
      <br>
    <h1 class="title"  >Compaint history</h1>
</center>
    </div>
    <div class="col">
    <center>
        <img class="img-thumbnail" width="200px" src="img/complaints1.jpg">
</center>
    </div>
  </div>
  <br>
  <br>
  <center>
  <table class="content-table">
    <thead>
  <tr>
    <th > <center> Owner Id </center> </th>
    <th > <center> First Name </center></th> 
    <th > <center> Last Name </center> </th> 
    <th > <center> Mobile No </center> </th> 
    <th > <center> Complaints </center> </th> 
  </tr>
</thead>
<tbody>
<?php

  include("database.php");

  $sql = "SELECT a.owner_id,o.owner_fname,o.owner_lname,o.owner_phno,complaint FROM admin_complaint a,owner_table o where a.owner_id=o.owner_id ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc()) 
    {
      echo "<tr><td>" . $row["owner_id"]. "</td><td>" . $row["owner_fname"] .  "</td><td>" . $row["owner_lname"]. "</td><td>" . $row["owner_phno"]. "</td><td><textarea disabled style=\"height:200px;width:500px;font-size:20px\">" . $row["complaint"]. "</textarea></td></tr>";
    }

    echo "</tbody></table>";
  }
  else 
    { 
      echo "<tr><td></td><td></td><td> No Complaints.</td><td></td></tr></tbody></table>";
    }

  $conn->close();
?>
  </tbody>
  </table>
  </center>
  <center> 
    <br>
    <br>
    <a class="btn btn-success" href="admin_home.html"> GO BACK </a> </center>
  </div>
</body>
</html>