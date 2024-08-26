<?php 
   include("database.php");

//    

$occupied_query="select o.owner_license_no,o.owner_fname,o.owner_lname,o.owner_phno,o.owner_id,o.owner_addrs from car_table c,owner_table o where  c.owner_id = o.owner_id ";
 
$rs=mysqli_query($conn,$occupied_query);

$free_query = "select lot_id from lot_table where occupied=0";

$rs1=mysqli_query($conn,$free_query);

    
    
    


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/table.css">
    <title>HomePark</title>
      <script src="js/jquery.js"></script>
  </head>
  <body background="img/3.jpg">
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

   
      <div class="container-fluid">
        <br>
        <br>
        <div class="row">
    <div class="col">
      <center>
        <img class="img-thumbnail" width="120px" src="img/user.webp">
</center>
    </div>
    <div class="col-4">
      <center>
    <h1 class="wt title">OWNER DETAILS</h1>
</center>
    </div>
    <div class="col">
    <center>
        <img class="img-thumbnail" width="120px" src="img/info.png">
</center>
    </div>
  </div>
        <center>
         
          
    
          <br>
          <br>
        
        <div class="table">
          <table id="occupied_table" class="content-table ">
              <thead>
                <tr>
                  
                  <th scope="col">Owner ID</th>
                    
                  <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                     <th scope="col">License Number</th>
                  <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                </tr>
              </thead>
              
              <tbody id=table_data>
              <?php 
                if (mysqli_num_rows($rs)> 0){
        while ($row = $rs->fetch_assoc()){
            
            
        $owner_id=$row["owner_id"];
            $owner_fname=$row["owner_fname"];
            $owner_lname = $row["owner_lname"];
            
            $owner_license_no=$row["owner_license_no"];
            $owner_phno=$row["owner_phno"];
           
            
            $owner_address=$row["owner_addrs"];
            
            echo '
            <tr>
                <td>'.$owner_id.'</td>
                <td>'.$owner_fname.'</td>
                <td>'.$owner_lname.'</td>
                <td>'.$owner_license_no.'</td>
                <td>'.$owner_phno.'</td>
                
                <td>'.$owner_address.'</td>
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
        
        

    
          </center>
      </div>
      <br>
      <br>
      <center>
              <a class="btn btn-success" href="admin_home.html">GO BACK</a>
      </center>
      <br>
      <br>
  
  </body>
</html>


