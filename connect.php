<?php
	$conn1 = new mysqli("localhost","root","","test");
	$conn = new PDO('mysql:host=localhost;dbname=parking_lot','root','');
	if(!$conn1)
	{
		die("There is a error in connection..!");
	}
	else
	{
 		echo"";
	}
?>