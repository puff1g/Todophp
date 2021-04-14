<?php
session_start();

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
$conn = mysqli_connect("localhost", "root", "root", "projekt"); // den er god nok, det mere funkionen


if (mysqli_connect_errno()) { // udskriver den her ingenting så er der forbindelse
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}


if(!$conn):
die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
endif;


if(isset($_POST['registeruser'])){
  init_checks();
}

function init_checks(){
  
  $username = $_POST['username'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  if(isset($username) && !empty($username) && isset($password_1) && !empty($password_1)){
    
    if($password_1 != $password_2){
      print("Passwords does not match");
    }
    else{
      if(init_check_if_exists($username)){
        
        create_user_ok($username, $password_1);

      }
      else{
        // User DOES exist and we do not want to duplicate
        print("The given username already exists");
      }
    }
  }
}

function create_user_ok($username, $password){

  $query = "INSERT INTO tke_user (username, password) VALUES('".$username."', '".md5($password)."')"; // confirmed works
  $results = mysqli_query($conn, $query); // TODO: Den her bliver ikke executed
  
  if(mysqli_num_rows($results)){
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
  }
  else{
    print("unable to create");
  }

  
}



function init_check_if_exists($username){
  $user_check_query = "SELECT * FROM tke_user WHERE username='".$username."'"; // ok
  
  $result = mysqli_query($conn, $user_check_query); // tom

  if (mysqli_num_rows($result) > 0) {  // TODO: Tjek om der blev returneret data. Bliver den fundet skal den ikke oprette
    
    return false; // this should deny creating because it exists
  } 
  else{
    printf("error: %s\n", mysqli_error($conn));
    return true; // this should be true because it does not exist and we allow to create
  }
}

  
/////////////////////////////////////////////////////////////////////////
// LOGIN
/////////////////////////////////////////////////////////////////////////


if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        // $password = md5($password);
        $query = "SELECT * FROM tke_user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  
  ?>