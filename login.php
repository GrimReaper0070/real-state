<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
    // $pass= sha1($pass);
    
	
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			   
				$_SESSION['uid']=$row['uid'];
				$_SESSION['uemail']=$email;
				header("location:index.php");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Login Not Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
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
    <link rel="stylesheet" href="css/loginn.css">
    <script src="js/indexx.js"></script>
</head>

<body>
    <section>
        <div class="box">

            <div class="form">
                <img src="images/_user2.png" class="user" alt="">
                <h2>Welcome Back</h2>
                <form method="post" enctype="multipart/form-data">
                    <!-- {% csrf_token %} -->
                    <div class="inputBx">
                    <input type="email"  name="email" class="form-control" placeholder="email-address" >
                    <img src="images/user.png" alt="">
                    </div>
                    <div class="inputBx">
                    <input type="password" name="pass"  class="form-control" placeholder="password" >
                        <img src="images/lock.png" alt="">
                    </div>
                    
                    <div class="inputBx">
                    <button class="button" name="login" value="Login" type="submit">Login</button>
                    <div class="text-center dont-have">Don't have an account? <a href="register.php">Register</a></div>
                    </div>

                </form>
               

            </div>

        </div>

      
    </section>

  

</body>

</html>