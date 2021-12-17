<?php 
include "functions.php";
if (isset($_POST['create'])) {
	include "../connection.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$location = validate($_POST['location']);

	$user_data = 'name='.$name. '&location='.$location;

	if (empty($name)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($location)) {
		header("Location: ../index.php?error=location is required&$user_data");
	}else {

    $sql = "INSERT INTO tke_lists(name, location) 
            VALUES('$name', '".encrypt($location)."')";
    $result = mysqli_query($con, $sql);
    if ($result) {
    header("Location: ../read.php?success=successfully created");
    }else {
        header("Location: ../index.php?error=unknown error occurred&$user_data");
    }
	}

}


function encrypt($location, $key=5) {
	$result = '';
	for($i=0, $k= strlen($location); $i<$k; $i++) {
		$char = substr($location, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result .= $char;
	}
	return base64_encode($result);
}


