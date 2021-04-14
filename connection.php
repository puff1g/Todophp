<?php

$dbhost = "134.209.231.83";
$dbuser = "playground_user";
$dbpass = "fU5Jib9MF6";
$dbname = "playground_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
