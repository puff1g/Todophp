<?php include "php/read.php"; ?>
<?php include "functions.php"; ?>

<?php

	function decrypt($location, $key=5) {
		$result = '';
		$location = base64_decode($location);
		for($i=0,$k=strlen($location); $i< $k ; $i++) {
			$char = substr($location, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}

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
		<div class="box">
			<h4 class="display-4 text-center">Read</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success" role="alert">
			<?php echo $_GET['success']; ?>
		</div>
		<?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">location</th>
			<th scope="col">Action</th>
			</tr>
			</thead>
			<tbody>
		<?php 
			$i = 0;
			while($rows = mysqli_fetch_assoc($result)){
			$i++;
		?>
		<tr>
			<th scope="row"><?=$i?></th>
			<td><?=$rows['name']?></td>
			<td><?php echo decrypt($rows['location']); ?></td>
			<td><a href="update.php?id=<?=$rows['id']?>" 
			class="btn btn-success">Update</a>

			<a href="php/delete.php?id=<?=$rows['id']?>" 
			class="btn btn-danger">Delete</a>
		</td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			<?php } ?>
			<div class="link-right">
				<a href="index.php" class="link-primary">Create</a>
			</div>
		</div>
	</div>
</body>
</html>