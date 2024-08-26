<?php
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"parking_lot")or die("Failed to connect to database");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
    
}
mysqli_set_charset( $conn, 'utf8');
?>