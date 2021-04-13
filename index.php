<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./css/javascript/functions.js"></script>


    <title>TODO</title>
</head>
<body>
<?php
            require_once('components/dbcon.php');
            $DBcon = new DBcon();
            $connectionStatus = $DBcon->get_connection();
        ?>

        <?php if($connectionStatus == true) :  ?>
            <div id="back">
    <canvas id="canvas" class="canvas-back"></canvas>
    <div class="backRight">    
    </div>
    <div class="backLeft">
    </div>
</div>

<div id="slideBox">
    <div class="topLayer">
    <div class="left">
        <div class="content">
        <h2>Sign Up</h2>
        <form id="form-signup" method="post" onsubmit="return false;">
            <div class="form-element form-stack">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email">
        </div>
        <div class="form-element form-stack">
            <label for="username-signup" class="form-label">Username</label>
            <input id="username-signup" type="text" name="username">
        </div>
        <div class="form-element form-stack">
            <label for="password-signup" class="form-label">Password</label>
            <input id="password-signup" type="password" name="password">
        </div>
        <div class="form-element form-checkbox">
            <input id="confirm-terms" type="checkbox" name="confirm" value="yes" class="checkbox">
            <label for="confirm-terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-element form-submit">
            <button id="signUp" class="signup" type="submit" name="signup">Sign up</button>
            <button id="goLeft" class="signup off">Log In</button> 
        </div>
        </form>
        </div>
    </div>
    <div class="right">
        <div class="content">
        <h2>Login</h2>
        <form id="form-login" method="post" onsubmit="return false;">
            <div class="form-element form-stack">
            <label for="username-login" class="form-label">Username</label>
            <input id="username-login" type="text" name="username">
            </div>
            <div class="form-element form-stack">
            <label for="password-login" class="form-label">Password</label>
            <input id="password-login" type="password" name="password">
            </div>
            <div class="form-element form-submit">
            <button id="logIn" class="login" type="submit" name="login">Log In</button>
            <button id="goRight" class="login off" name="signup">Sign Up</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

        <?php else : ?>

            <h1>nah fam...</h1>
            <h2><?php echo $connectionStatus; ?></h2>
            <?php endif; ?> 

</body>
</html>