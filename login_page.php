<?php
	include('connect.php');
	session_start();
?>

<?php
	$mysql=new mysqli("localhost","root","","test");
	if(!$mysql)
	{
    	die("Connection Error..!");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<link  rel="stylesheet" href="css/style_home.css">
</head>
<body background="img/3.jpg">
<!--
	<form method="post">
		<input type="text" name="usname" id="usname" placeholder="Username"><br><br>
		<input type="password" name="pwd" id="pwd" placeholder="Password"><br><br>
		<input type="checkbox" name="chkbox" value="Admin"> Admin <br><br>
		<input type="submit" name="submit" value="submit">
	</form>

-->
<br>
<br>
<center><h1 id="heading" class="text-center text-white pt-5">Welcome to HomePark</h1></center>
<br>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
							<h3 class="text-center text-info">Login</h3>
							<br>
                            <div class="form-group">
                                <label for="usname" class="text-info">Username:</label><br>
                                <input type="text" name="usname" id="usname" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pwd" class="text-info">Password:</label><br>
                                <input type="password" name="pwd" id="pwd" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="chkbox" class="text-info">
								<span><strong>Admin </strong></span>
								<br>
								<input id="chkbox" type="checkbox" name="chkbox" value="Admin">
								</label><br>
                            </div>
                            <div id="register-link" class="text-right">
								<input type="submit"class="btn btn-primary" name="submit" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<br>
<br>
<center>
	<a class="btn btn-success" href="Developer.html">Contact Developers</a>
	<br>
	<br>
    <a class="btn btn-success" href="Contact.html">Email Us </a>
    <br>
</center>
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		if(isset($_POST['chkbox']))
		{ 
                	$log_name=$_POST["usname"];
			$log_password=($_POST["pwd"]);
			if($log_name=="admin" && $log_password=="admin")
			{
                        	$_SESSION['log_name']=$log_name;
				header("location:admin_home.html");
			}
			else
			{
				echo"<script>alert('PLEASE CHECK YOUR USER ID AND PASSWORD THEN TRY AGAIN')</script>";
				$log_name=NULL;
				$log_password=NULL;
			}
		}		
		else
		{
            $log_name=$_POST["usname"];
            
			$log_password=($_POST["pwd"]);
            
	
			if($log_name!=NULL or $log_name!="" and $log_password!=NULL or $log_password!="")
			{ 
				$q=$conn->prepare("SELECT * FROM login_details WHERE owner_id =".$log_name." AND  owner_password='".$log_password."'");
				$q->execute();
				$res=$q->FetchAll(PDO::FETCH_OBJ);
				if($res)
				{
	 		$_SESSION['log_name']=$log_name;
					header("location:user_home.html");
			        }
				else
				{
					echo"<script>alert('PLEASE CHECK YOUR USER ID AND PASSWORD THEN TRY AGAIN')</script>";
					$log_name=NULL;
					$log_password=NULL;
				}
			}
                }
	}
?>