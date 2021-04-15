<?php 
session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

/* Prevent SQL injection!! */
	$itemsQuery = $con->prepare("SELECT id, name, done, FROM tke_lists WHERE user = :user");

	$itemsQuery->execute(['user' => $_SESSION['user_id']]);

	foreach($items as $item) {
		echo $item['name'], '<br>';
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>
	Hello, <?php echo $user_data['user_name']; ?>
	<a href="logout.php">Logout</a>

	<div class="list">
		<h1 class="header"> To do</h1>
		<?php if(!empty($items)): ?>
		<ul class="items">
			<?php foreach($items as $item): ?>
				<li>
					<span class="item<?php echo $item['done'] ? 'done':'' ?>"><?php echo $item['name']; ?></span>
					<?php if(!$item['done']): ?>
					<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as donzo</a>
						<?php endif; ?>
				</li>
			<?php endforeach; ?>
			<li>
				
		</li>
		</ul>
		<?php else: ?>
			<p>u have no items</p>
			<?php endif; ?>
		<form action="add.php" mothod="post">
			<input type="text" name="name" placeholder="Type something" class="input" autocomplete="off" required>
			<input type="submit" value="Add" class="submit">
		</form>
	</div>
</body>
</html>