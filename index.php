<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	
	/* if (!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    die();
} */
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">
		<form action="php/create.php" 
    method="post">
		<h4 class="display-4 text-center">Create</h4><hr><br>
		<?php if (isset($_GET['error'])) { ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $_GET['error']; ?>
		</div>
		<?php } ?>
		<div class="form-group">
    <label for="name">Name</label>
    <input type="name" 
        class="form-control" 
        id="name" 
        name="name" 
        value="<?php if(isset($_GET['name']))
        echo($_GET['name']); ?>" 
        placeholder="Enter name">
		</div>

		<div class="form-group">
		<label for="location">location</label>
		<input type="location" 
		class="form-control" 
		id="location" 
		name="location" 
		value="<?php if(isset($_GET['location']))
			echo($_GET['location']); ?>"
		placeholder="Enter location">
		</div>

	<button type="submit" 
	class="btn btn-primary"
	name="create">Create</button>
	<a href="read.php" class="link-primary">View</a>
	</form>
	
	</div>
	
	<h1>Welcome to <?php echo $_SESSION ['user_id']; ?> <a href="logout.php">Logout</a> <----- Here!</h1>
</body>
</html>