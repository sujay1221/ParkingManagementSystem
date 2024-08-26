<?php  
  session_start();
    include("database.php");
$query9 = "select r.owner_id,r.car_id,c.car_license_plate,o.owner_fname,o.owner_lname,o.owner_license_no,o.owner_phno from request r,owner_table o,car_table c where r.owner_id=o.owner_id and r.car_id=c.car_id and r.owner_id=".$_SESSION['log_name']."";

$rs9=mysqli_query($conn,$query9);

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Request/s Status</title>
      
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

      <script>
        
      
      </script>
      <div class="container-fluid">
        <br>
        <br>
        <center>
          <h1 class="title">Request/s Status</h1>
          <br>
          <br>
          
        
    <div class="details my-2 mx-2">
        
        
         
          <table id="occupied_table" class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th scope="col">Owner ID</th>
                  <th scope="col">Car ID</th>
                    
                    <th scope="col">Car License Plate</th>
                  <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                     <th scope="col">License Number</th>
                  <th scope="col">Phone Number</th>
                
                </tr>
              </thead>
              
              <tbody id=table_data>
                  
                  <?php 
                    if(mysqli_num_rows($rs9)>0){
                        while($row9=$rs9->fetch_assoc()){
                            
                            $owner_id=$row9["owner_id"];
                            $car_id=$row9["car_id"];
                            $car_license_plate=$row9["car_license_plate"];
                            $owner_fname=$row9["owner_fname"];
                            $owner_lname=$row9["owner_lname"];
                            $owner_license_no=$row9["owner_license_no"];
                            $owner_phno=$row9["owner_phno"];
                            
                            
                            echo "<tr>
                                <th>".$owner_id."</th>
                                <th>".$car_id."</th>
                                <th>".$car_license_plate."</th>
                                <th>".$owner_fname."</th>
                                <th>".$owner_lname."</th>
                                <th>".$owner_license_no."</th>
                                <th>".$owner_phno."</th>
                                
                                
                                </tr>
                            ";
                            
                            
                            
                            
                            
                            
                            
                            
                        }
                        
                        
                    }
                  
                  else{
                      echo "<tr><th>Empty</th></tr>";
                  }
                  
                  
                  
                  ?>
    
              
                  
              </tbody>
              
              
              
          </table>
        
        
        
        <h4>Allotted Slots</h4>
        <div class="table">
          <table id="occupied_table" class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th scope="col">Lot Number</th>
                  <th scope="col">Car ID</th>
                    
                    <th scope="col">Car License Plate</th>
                  <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                     <th scope="col">License Number</th>
                  <th scope="col">Phone Number</th>
                    <th scope="col">Alloted Time</th>
                </tr>
              </thead>
              
              <tbody id=table_data>
              <?php 
                  include("database.php");
                  
                  $occupied1_query="select
l.lot_id,c.car_license_plate,o.owner_license_no,l.allotted_time, l.car_id,o.owner_fname,o.owner_lname,o.owner_phno,o.owner_id from lot_table l,car_table c,owner_table o where l.occupied=1 and c.owner_id = o.owner_id and l.car_id = c.car_id and o.owner_id=".$_SESSION['log_name']."";
 
$rs=mysqli_query($conn,$occupied1_query);
                  
                  
                  
                  
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
                    
        </div>
    
        <button name="ret"><a href="admin_home.html">Go Back</a></button>
                  
       
       
          
                  
                
                  
              
          
                    
        </div>

    </center>
    </div>

  </body>
</html>