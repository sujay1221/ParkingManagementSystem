<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add vechile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/table.css">
</head>
<body background="img/3.jpg">
<div class="container-fluid">
    <!--
    <center><h2 class="title">Add / Delete Vehicle</h2></center>
    <br>
    <br>
    <div class="row">  
    <div class="col-sm-8">
    <h3 class="title">Enter Info.</h3>
    <br>
    <form action="add_remove_vehicle.php" method="post">
        <div class="form-group">
          <label for="ownerid">Enter Owner-id:</label>
          <input type="text" class="form-control" id="ownerid" name="ownerid" >
        </div>
        <br>
        <div class="form-group">
            <label for="carinfo">Enter Car Plate Number:</label>
            <input type="text" class="form-control" id="carplate" name="carplate">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" id="add_btn" name="add_btn">Add</button>
        <button type="submit" class="btn btn-primary" id="rem_btn" name="rem_btn">Remove</button>
    </form>
    </div>
    <div class="col-sm-4">
        <br>
        <br>
        <br>
        <img class="img-rounded" width="140px" href="img/car.png" alt="car image loading" >
    </div>
    </div>  
</div>-->
<br>
    <br>
    <div class="row">
    <div class="col">
        <center>
      <img class="img-rounded" width="70px" src="img/add.png">
</center>
    </div>
    <div class="col-2">
    <center><h1 class="wt title">Add/Delete Vehicle</h1></center>
    </div>
    <div class="col">
        <center>
      <img class="img-rounded" width="70px" src="img/subtract.png">
</center>
    </div>
  </div>
    
    <br>
    <div class="row">  
    <div class="col-sm-8">
    <h3 class="wt title">Enter Vehicle Information.</h3>
    <br>
    <form action="add_remove_vehicle.php" method="post">
        <div class="form-group">
          <label class="wt" for="ownerid">Enter Owner-id:</label>
          <input type="text" class="form-control" id="ownerid" name="ownerid" >
        </div>
        <br>
        <div class="form-group">
            <label class="wt" for="carinfo">Enter Car Plate Number:</label>
            <input type="text" class="form-control" id="carplate" name="carplate">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" id="add_btn" name="add_btn">Add</button>
        <button type="submit" class="btn btn-primary" id="rem_btn" name="rem_btn">Remove</button>
    </form>
    </div>
    <div class="col-sm-4">
        <br>
        <br>
        <br>
        <center>
        <img class="img-rounded" width="400px" src="img/car.png" alt="car image loading" >
</center>
    </div>
    </div>  
</div>
<br>
<br>
<br>
<center>
<div>
    <br>
    <br>
    <a class="btn btn-success" href="admin_home.html">GO BACK!</a>
    <br>
    <br>
</div>
<center>

</body>
</html>


<?php 
if(isset($_POST['add_btn'])){
    
    include("database.php");
 $owner_id = $_POST['ownerid'];
$car_plate = $_POST['carplate'];


$query = "insert into car_table(car_license_plate,owner_id) values('".$car_plate."',".$owner_id.")";
    
    if(mysqli_query($conn,$query)){
    
    echo"<br> <div class=\"alert alert-success alert-dismissible\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Success!</strong> Vehicle Added..</div>";
    unset($_POST['add_btn']);
        
    }
    
    else{
        echo "<br> <div class=\"alert alert-warning alert-dismissible\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Error!</strong> Couldn't add the car
      </div>";
        
    }
    
    


}
if(isset($_POST['rem_btn'])){
    
    include("database.php");
 $owner_id = $_POST['ownerid'];
$car_plate = $_POST['carplate'];
    
$query="select lot_id from lot_table where car_id = (select car_id from car_table where car_license_plate = '".$car_plate."')";    
    
$rs = mysqli_query($conn,$query);
If(mysqli_num_rows($rs)>0){
    $row=$rs->fetch_assoc();
    
    $rem_lot = $row["lot_id"];
}
    
    


$query = "delete from car_table where car_license_plate = '".$car_plate."'";
    
    if(mysqli_query($conn,$query)){
     If(mysqli_num_rows($rs)>0){
    $row=$rs->fetch_assoc();
    
    $rem_lot = $row["lot_id"];
  
    $query="update lot_table set occupied = 0 where lot_id=".$rem_lot."";
    mysqli_query($conn,$query);   
     }
    
    echo"<br><div class=\"alert alert-success alert-dismissible\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Success!</strong> Vehicle Removed..</div>";
        
    
    unset($_POST['rem_btn']);
    }
    else{
        
        echo "<br> <div class=\"alert alert-warning alert-dismissible\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Error!</strong> Couldn't remove the car
      </div>";
    }
    
    


}


?>