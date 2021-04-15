<?php

$dbhost = "134.209.231.83";
$dbuser = "playground_user";
$dbpass = "fU5Jib9MF6";
$dbname = "playground_db";
/* whats used in tutorial */
/* $db = new PDO('mysql:dbname=playground_db;host=134.209.231.83', 'playground_user', 'fU5Jib9MF6'); */
if(!$con = mysqli_connect(
	$dbhost,
	$dbuser,
	$dbpass,
	$dbname))
{

	die("failed to connect!");
}
