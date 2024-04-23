<?php 
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['reg']))
{
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$pass=$_REQUEST['pass'];
	$utype=$_REQUEST['utype'];

	
	
	$uimage=$_FILES['uimage']['name'];
	$temp_name1 = $_FILES['uimage']['tmp_name'];
	
	$query = "SELECT * FROM user where uemail='$email'";
	$res=mysqli_query($con, $query);
	$num=mysqli_num_rows($res);
	
	if($num == 1)
	{
		$error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
	}
	else
	{
		
		if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage))
		{
			
			$sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage) VALUES ('$name','$email','$phone','" . md5($password) . "','$utype','$uimage')";
			$result=mysqli_query($con, $sql);
			move_uploaded_file($temp_name1,"admin/user/$uimage");
			   if($result){
				   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
				   header("Location: login.php");
				   exit(); 
			   }
			   else{
				   $error = "<p class='alert alert-warning'>Register Not Successfully</p> ";
			   }
		}else{
			$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/logo.png">
    <title>Login Form</title>
  
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">



<link rel="stylesheet" href="style1.css">

</head>

<body>

 
    <section>
	
	<form method="post" enctype="multipart/form-data">
	<h1>Register</h1>
									<div class="inputbox">
									
										<input type="text"  name="name" class="form-control" placeholder="Name">
									</div>
									<div class="inputbox">
										<input type="email"  name="email" class="form-control" placeholder="Your Email*">
									</div>
									<div class="inputbox">
										<input type="text"  name="phone" class="form-control" placeholder="Your Phone*" maxlength="10">
									</div>
									<div class="inputbox">
										<input type="text" name="pass"  class="form-control" placeholder="Your Password*">
									</div>

									<div class="inputbox">
										<input type="text" name="pass"  class="form-control" placeholder="Re-Password*">
									</div>

									 <div class="form-check-inline">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="user" checked>User
									  </label>
									</div>
									<div class="form-check-inline">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="agent">Agent
									  </label>
									</div>
									<div class="form-check-inline disabled">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="builder">Builder
									  </label>
									</div> 
									
									<div class="form-group">
										<label class="col-form-label"><b>User Image</b></label>
										<input class="form-control" class="nn" name="uimage" type="file">
									</div>
									
									<button class="button" name="reg" value="Register" type="submit">Register</button>
									
								</form>
    </section>
 
	<div class="message-container">
    <p class="error"><?php echo $error; ?></p>
    <p class="success"><?php echo $msg; ?></p>
</div>
   
</body>

</html>