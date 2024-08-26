<!DOCTYPE html>
<html>
<head>
  <title> Parking History </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add vechile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/table.css">
</head>

<body background="img/3.jpg">
<br>
<div class="row">
    <div class="col">
      <center>
        <img class="img-thumbnail" width="150px" src="img/park1.jpeg">
</center>
    </div>
    <div class="col-4">
    <center>
    <br>
    <br>
    <h1 class="wt title"  >PARKING HISTORY</h1>
</center>
    </div>
    <div class="col">
    <center>
        <img class="img-thumbnail" width="200px" src="img/history.jpg">
</center>
    </div>
  </div>
  <br>
  <center>
  <table class="content-table">
    <thead>
  <tr>
    <th scope="col"> <center> Lot Id </center> </th>
    <th scope="col"> <center> Car Id </center> </th>
    <th scope="col"> <center> Owner Id </center> </th>
    <th scope="col"> <center> First Name </center></th> 
    <th scope="col"> <center> Last Name </center> </th> 
    <th scope="col"> <center> Mobile No </center> </th> 
    <th scope="col"> <center> In-Time </center> </th> 
    <th scope="col"> <center> Out Time </center> </th>
  </tr>
</thead>
<tbody>

<?php

  include("database.php");

  $sql = "SELECT * FROM parking_history";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc()) 
    {  
        
        if($row["out_time"]==0){
      echo "<tr><td>" . $row["lot_id"]. "</td><td>" . $row["car_id"]. "</td><td>" . $row["owner_id"]. "</td><td>" . $row["owner_fname"] .  "</td><td>" . $row["owner_lname"]. "</td><td>" . $row["owner_phno"]. "</td><td>" . $row["in_time"]. "</td><td>Currently Parked</td></tr>";
    }
        else{
            echo "<tr><td>" . $row["lot_id"]. "</td><td>" . $row["car_id"]. "</td><td>" . $row["owner_id"]. "</td><td>" . $row["owner_fname"] .  "</td><td>" . $row["owner_lname"]. "</td><td>" . $row["owner_phno"]. "</td><td>" . $row["in_time"]. "</td><td>".$row["out_time"]."</td></tr>";
            
        }
    }

    echo "</tbody></table>";
  }
  else 
    { 
      echo "<tr><td></td><td></td><td> NO RECORD OF PARKING.</td><td></td></tr></tbody></table>";
    }

  $conn->close();
?>
  </tbody>
  </table>
  <center>
  <br>
  <br>
  <center> <a class="btn btn-success" href="admin_home.html"> GO BACK </a> </center>
</body>
</html>