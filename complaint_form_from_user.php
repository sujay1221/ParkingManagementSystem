<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compliant</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
    <br>
    <center><h2 class="title" >Send Us Your Complain</h2></center>
    <br>
    <br>
    <form class="form" method="POST">
        <div class="form-group">
          <label for="complaint">Enter Complain:</label>
          <textarea id="complaint" 
        name="complaint"id="complaint"   class="form-control" rows="10" cols="50"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your complain with anyone else.</small>
        </div>
        <!--
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
    -->
    <br>
    <br>
        <button type="submit" id="user_sub"
    name="user_sub" class="btn btn-primary">Submit</button>
      </form>
      <br>
      <br>
    </div>
</body>
</html>

<?php

    
    
if(isset($_POST['user_sub'])){
    include("database.php");
    
    
    $owner_id = $_SESSION["log_name"];

    $complaint = $_POST["complaint"];

    $query="insert into user_complaint values(".$owner_id.",'".$complaint."');";

    if(mysqli_query($conn,$query)){
        
        echo"<br><div class=\"alert alert-success alert-dismissible\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Success!</strong> Complaint Reported to Admin</div>";
        
    }
    else{
        echo "<br> <div class=\"alert alert-warning alert-dismissible\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Error!</strong> Failed to Report
      </div>";
    }
}


?>