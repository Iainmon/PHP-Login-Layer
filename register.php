<?php
/**
 * Created by Iain Moncrief.
 * User: iainmoncrief
 * Date: 12/12/17
 * Time: 10:39 PM
 */

include_once "user_checker.php";
include_once "functions.php";
include_once "newUserTemplate.php";
$user = $_POST["user"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$capt = $_POST["g-recaptcha-response"];
if (isset($user)) {
    echo $capt;
    $user = strtolower($user);
    if ($pass1 != $pass2) {
        $unpass = true;
    } else if ($pass1 == $pass2) {
        $pass = $pass1 = $pass2 or die("The server made a bad calculation. Please close the app and open it again!");
        if (file_exists("users/$user")) {
            $unuser = true;
        } else {
            newUser($user, $pass, $email, $fname, $lname);
            $acc = true;
            //user created
        }
    }
}

?>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://dev.nexal.net/web/main.css">
    <link rel="stylesheet" href="functions.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<!-- Add your site or application content here -->

<div id="debug"></div>
<div id="web-app">
    <div class="centered">
        <div align="center" id="body">
            <div id="sign-up">
                <h1>Create a Nexal account!</h1>
                <?php printOut($unuser, '<div class="alert alert-warning"><div align="center"><strong>Error!</strong> This username is already taken!</div></div>'); ?>
                <?php printOut($unpass, '<div class="alert alert-warning"><div align="center"><strong>Error!</strong> The passwords do not match!</div></div>'); ?>
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="First Name" name="fname">
                    <br>
                    <input type="text" class="form-control" placeholder="Last Name" name="lname">
                    <br>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <br>
                    <input type="text" class="form-control" placeholder="Username" name="user">
                    <br>
                    <input type="password" class="form-control" placeholder="Password" name="pass1">
                    <br>
                    <input type="password" class="form-control" placeholder="Re-Enter password" name="pass2">
                    <br>
                    <div class="g-recaptcha" data-sitekey="6LdI8jwUAAAAAHxTqg4S_vIg4Vpc_gwpfE7hDb1C"></div>
                    <br>
                    <button type="submit" class="btn btn-info">Register</button>
                </form>
            </div>
            <?php
            if ($acc) {
                echo '<div id="yay">
                <h1>Account created!</h1>
                <br>
                <h4>Click to login.</h4>
                <br>
                <button type="button" onclick="goToLogin();" class="btn btn-info">Login</button>
            </div>';
            } ?>
        </div>
    </div>
</div>








<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/main.js"></script>
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>