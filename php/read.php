<?php  

include "connection.php";

$sql = "SELECT * FROM tke_lists ORDER BY id DESC";
$result = mysqli_query($con, $sql);