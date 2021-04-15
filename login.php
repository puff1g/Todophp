<?php 

session_start();

include("connection.php");
include("functions.php");
if(true)
{

/* 	echo '<pre>';
var_dump($_SESSION);
echo '</pre>'; */
		
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			
			//read from database
			echo $user_name;
			echo $password;
			
			$query = "SELECT * FROM tke_user WHERE user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
			
				if($result && mysqli_num_rows($result) > 0)
				{
					
					$user_data = mysqli_fetch_assoc($result);
					echo $user_data;
					
					if($user_data['password'] === hash('sha256', $password))
					{

						$_SESSION['user_id'] = $user_data['id'];
					}
					// echo "Password correct";
					header("Location: index.php");
					die;
				}
				else{
					
					echo "Password false";
				}
			
			
		}else
		{
			// echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
	<h2>Login</h2>
	</div>

	<form method="post" action="login.php">
	<?php include('errors.php'); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="user_name" >
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" value="Login">Login</button>
	</div>
	<p>
		Not yet a member? <a href="signup.php">Sign up</a>
	</p>
	</form>
</body>
</html>

