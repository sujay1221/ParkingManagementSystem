<?php 
session_start(); ?>


<!DOCTYPE html>
<html>
<head>
    <title> User Home </title>
    <link href="css/style_home.css" rel="stylesheet">
</head>
<body background="img/3.jpg">
    <ul>

    <li> <a> PARKING </a>
        <ul>
               <li> <a href="request_parking.php"> REQUEST PARKING </a> </li> 
            <li> <a href="request_status.php"> REQUEST STATUS </a> </li> 
        </ul>
    </li>
    <li> <a> HISTORY </a>
        <ul>
            <li> <a href="user_parking_history.php"> PARKING HISTORY </a> </li>        
        </ul>
    </li>
    <li> <a> WARNING </a>
        <ul>
            <li> <a href="user_recieved_complaint.php"> VIEW WARNING </a> </li>        
        </ul>
    </li>
    <li> <a> COMPLAINT </a>
        <ul>
            <li> <a href="complaint_form_from_user.php"> REPORT COMPLAINT </a> </li>      
	    <li> <a href="user_sent_compliants.php"> VIEW COMPLAINTS </a> </li>   
        </ul>
    </li>
    

    <li> <a href="logout.php"> LOGOUT </a> </li>
    </ul>
    
    <?php 
    include("database.php");
     $query14="select owner_fname,owner_lname from owner_table where owner_id=".$_SESSION['log_name']." ";
    
    $rs14=mysqli_query($conn,$query14);
    
    if(mysqli_num_rows($rs14)>0){
        
        $row14=$rs14->fetch_assoc();
        
        echo "<h2>Hello ".ucwords($row14['owner_fname'])." ".ucwords($row14['owner_lname'])."</h2";
        
    }
    
    
    
    ?>
    
    <h1>Welcome To HomePark</h1>

</body>
</html>