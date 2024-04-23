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
	// $pass= sha1($pass);
	
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
			
			$sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage) VALUES ('$name','$email','$phone','$pass','$utype','$uimage')";
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
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/logo.png">
    <title>HomeHarbor</title>

    <link rel="stylesheet" href="css/loginnn.css">
    <script src="js/indexx.js"></script>
</head>

<body>
    <section>
        <div class="box">

            <div class="form">
                <img src="images/_user2.png" class="user" alt="">
                <h2>Register</h2>
                <form method="post" enctype="multipart/form-data">
                    <!-- {% csrf_token %} -->
                    <div class="inputBx">
                    <input type="text"  name="name" class="form-control" placeholder="name" >
                    <img src="images/user.png" alt="">
                    </div>
                    <div class="inputBx">
                    <input type="email"  name="email" class="form-control" placeholder="email-address" >
                    <img src="images/user.png" alt="">
                    </div>
                    <div class="inputBx">
                    <input type="number"  name="phone" class="form-control" placeholder="phone" >
                    <img src="images/user.png" alt="">
                    </div>
                    <div class="inputBx">
                    <input type="password" name="pass"  class="form-control" placeholder="password" >
                        <img src="images/lock.png" alt="">
                    </div>

                    <div class="inputBx">
                    <input type="password" name="Re-pass"  class="form-control" placeholder="Re-password" >
                        <img src="images/lock.png" alt="">
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
									<div class="form-check-inline">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="builder">Builder
									  </label>
									</div> 
									
									<div class="form-group">
										<label class="col-form-label"><b>User Image</b></label>
										<input class="form-control" class="nn" name="uimage" type="file">
									</div>
                    
                                    <button class="button" name="reg" value="Register" type="submit">Register</button>
									<div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
                </form>
               

            </div>

        </div>

    

      
    </section>

  

</body>

</html>