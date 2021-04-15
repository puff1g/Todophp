<?php
/* mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) */

    session_start();

    $_SESSION['user_id'] = 1;

    $db = new PDO('mysql:dbname=playground_db;host=134.209.231.83', 'playground_user', 'fU5Jib9MF6');

    if(!isset($_SESSION['user_id'])){
        die('u no allowed');
    }
?>