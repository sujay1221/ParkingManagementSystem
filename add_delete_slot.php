<?php 
   include("database.php");

//    $rs=mysqli_query($conn,"select * from lot_table t,car_table c,owner_table o where t.occupied=1");

$occupied_query="select
l.lot_id,c.car_license_plate,o.owner_license_no,l.allotted_time, l.car_id,o.owner_fname,o.owner_lname,o.owner_phno,o.owner_id from lot_table l,car_table c,owner_table o where l.occupied=1 and c.owner_id = o.owner_id and l.car_id = c.car_id";
 
$rs=mysqli_query($conn,$occupied_query);

$free_query = "select lot_id from lot_table where occupied=0";

$rs1=mysqli_query($conn,$free_query);

    
   
    


?>
<?php
include("database.php");
 if(isset($_POST["enter"])){
     
     

$entry_car_id=$_POST["entry_car_id"];
     

$entry_lot_id=$_POST["entry_lot_id"];
     


$query6 = "
 select occupied from lot_table where lot_id =".$entry_lot_id."
";
     
     $rs6=mysqli_query($conn,$query6);
    
    $row6=$rs6->fetch_assoc();



if($row6["occupied"]==0)
{
    
    
    
    $query = "update lot_table set occupied=1,car_id=".$entry_car_id." where lot_id=".$entry_lot_id."";
    
    mysqli_query($conn,$query);
    
    $query_fetch="select l.lot_id,c.car_license_plate,o.owner_license_no, l.car_id,o.owner_fname,o.owner_lname,o.owner_phno,o.owner_id from lot_table l,car_table c,owner_table o where c.owner_id = o.owner_id and l.car_id =".$entry_car_id." and l.lot_id=".$entry_lot_id." and l.car_id = c.car_id";
    
    $rs7=mysqli_query($conn,$query_fetch)or die("1234567890");
    
    $row7=$rs7->fetch_assoc();
    
    $lot_id=$row7["lot_id"];
            $car_id=$row7["car_id"];
    
        $owner_id=$row7["owner_id"];
            $owner_fname=$row7["owner_fname"];
            $owner_lname = $row7["owner_lname"];
            
            $owner_license_no=$row7["owner_license_no"];
            $owner_phno=$row7["owner_phno"];
            $car_license_plate=$row7["car_license_plate"];
        
            $query7="insert into parking_history values(".$lot_id.",".$car_id.",".$owner_id.",'".$owner_fname."','".$owner_lname."','".$owner_phno."',CURRENT_TIMESTAMP,0)";
        
            mysqli_query($conn,$query7)or die("8754577"); 
            
    
    
            $query11="delete from request where car_id=".$car_id."";
            mysqli_query($conn,$query11);
            unset($_POST["enter"]);
    
    
    
    
    
     header("Location: add_delete_slot.php");
     
 }
     
     else{
         
         echo "<br> <div class=\"alert alert-warning alert-dismissible\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Error!</strong> Lot is already used or Car has been alloted space.
      </div>";
     }
     

 }


if(isset($_POST["delete"])){
 $leave_car_id=$_POST["entry_car_id"];

$leave_lot_id=$_POST["entry_lot_id"];


$query5 = "
 select occupied from lot_table where lot_id =".$leave_lot_id."
";

    $rs5=mysqli_query($conn,$query5);
    
    $row5=$rs5->fetch_assoc();
    
    




if($row5["occupied"]==1)
{   
    $query1 = "
 update lot_table set occupied=0,car_id=NULL,allotted_time=null where lot_id = ".$leave_lot_id." and car_id=".$leave_car_id."
";
    mysqli_query($conn,$query1);
    
    
    
    $query_fetch="select in_time from parking_history where lot_id=".$leave_lot_id." and car_id=".$leave_car_id." and out_time='0000-00-00 00:00:00'
";
    
    $rs8=mysqli_query($conn,$query_fetch)or die("del567890");
    
    $row8=$rs8->fetch_assoc();
    
    $in_time=$row8["in_time"];
           
            $query8="update parking_history set out_time=current_timestamp where in_time='".$in_time."'";
        
            mysqli_query($conn,$query8)or die("del9989"); 
     
    header("Location: add_delete_slot.php");

     
 }

    
    
    
   else{
       
       
       echo "<br> <div class=\"alert alert-warning alert-dismissible\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Error!</strong> Lot is already free or Car has not been allotted a slot .
      </div>";
       
     
   }


}

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Enter/Delete Slot</title>
    <link  rel="stylesheet" href="css/table.css">
  </head>
  <body background="img/3.jpg">
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
      <script>
        
      
      </script>
      <div class="container-fluid">
        <br>
        <br>
        <div class="row">
    <div class="col">
       <center>
         <img class="img-thumbnail" width="120px" src="img/park1.jpeg">
</center>
    </div>
    <div class="col-4">
          <center>
          <h1 class="wt title">PARKING DASHBOARD</h1>
          <br>
          </center>
    </div>
    <div class="col">
    <center>
         <img class="img-thumbnail" width="120px" src="img/park2.png">
</center>
    
    </div>
  </div>
        <center>
          <br>
          <h4 class="wt title">Enter car details to add or remove car from the parking slot</h4>
        </center>
    <div class="details my-2 mx-2">
        <form id="entry_form" class="entry_delete"  method="post" action="add_delete_slot.php">
            <label class="wt form-label" for="entry_car_id">Enter Car ID:</label>
            <input class="form-control" type="text" 
            id="entry_car_id"
            name="entry_car_id" class="car_id" placeholder="Enter Car Id" required>
            
            <label class="wt form-label" for="slot_id">Enter the Lot Id:</label>
            <input class="form-control" type="number" name="entry_lot_id" 
            id="entry_lot_id" max="6" min="0" class="lot_id" placeholder="Enter Lot Id" required>
            <br>
            <button type="submit" id="enter" class="btn btn-primary" name="enter" >Enter</button>
            
            <button type="submit" class="btn btn-primary" name="delete">Delete</button>
            
            <button class="btn btn-primary" name="request"><a href="request_table.php" style="text-decoration:none;color:white">See Requests</a></button>
            

            
           
             
            
         </form>
         <br>
         <br>
       
        <center>
        <h3 class="wt title">Occupied Slots</h3>
        <div class="table">
          <table id="occupied_table" class="content-table">
              <thead>
                <tr>
                  <th >Lot Number</th>
                  <th >Car ID</th>
                    
                    <th >Car License Plate</th>
                  <th >First Name</th>
                    <th>Last Name</th>
                     <th >License Number</th>
                  <th >Phone Number</th>
                    <th >Alloted Time</th>
                </tr>
              </thead>
              
              <tbody id=table_data>
              <?php 
                if (mysqli_num_rows($rs)> 0){
        while ($row = $rs->fetch_assoc()){
            $allotted_time=$row["allotted_time"];
            $lot_id=$row["lot_id"];
            $car_id=$row["car_id"];
            
        $owner_id=$row["owner_id"];
            $owner_fname=$row["owner_fname"];
            $owner_lname = $row["owner_lname"];
            
            $owner_license_no=$row["owner_license_no"];
            $owner_phno=$row["owner_phno"];
            $car_license_plate=$row["car_license_plate"];
            
            echo '
            <tr>
                <td>'.$lot_id.'</td>
                <td>'.$car_id.'</td>
                
                <td>'.$car_license_plate.'</td>
                <td>'.$owner_fname.'</td>
                <td>'.$owner_lname.'</td>
                <td>'.$owner_license_no.'</td>
                <td>'.$owner_phno.'</td>
                
                <td>'.$allotted_time.'</td>
            </tr>';
            
        
        }
    
    }
    else{
        echo '
            <tr>
                <td>Empty</td>
                <td>Empty</td>
                <td>Empty</td>
                <td>Empty</td>
                <td>Empty</td>
                <td>Empty</td>
                <td>Empty</td>
                
            <td>Empty</td>
            </tr>';
    }

            
            ?>
                  
              </tbody>      
          </table>
            <script></script>        
        </div>
  </center>
        <br>
        <br>
        <br>
        <center>
        <h3 class="wt title">Free slots</h3>
        <div class="table">
          <table class="content-table">
              <thead>
                <tr>
                  <th scope="col">Lot Number</th>
                </tr>
                  </thead>
                  
                <?php
                  if(mysqli_num_rows($rs1)>0){
                      
                      while($row1 = $rs1->fetch_assoc()){
                          $lot_id=$row1["lot_id"];
                          echo '<tr>
                          <td>'.$lot_id.'</td>
                          
                          </tr>';
                          
                          
                      }
                      
                      
                  }
              else{
                  echo '
            <tr>
                <td>Empty</td>
                
            </tr>';
              }
                  
                  
                  
                  
                  ?>
                  
              
          </table>
                    
        </div>
            <br>
            <br>
            <center>
              <a class="btn btn-success" href="admin_home.html">GO BACK</a>
            </center>
            <br>
            <br>
    
    </div>
  </div>
            </center>
  </body>
</html>


<!--<script src="allot_lot.js">

</script>-->