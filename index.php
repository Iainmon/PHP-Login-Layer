<?php
/**
 * Created by Iain Moncrief.
 * User: iainmoncrief
 * Date: 12/12/17
 * Time: 1:32 PM
 */
//include_once "user_checker.php";
include_once("functions.php");
mail('iain@nexal.net', '', 'hi');
$sesh = $_COOKIE["login"];
$user = $_POST["user"];
$pass = $_POST["pass"];
if ($sesh == true) {
    $user = $_COOKIE["username"];
    $pass = $_COOKIE["password"];
    $valid = validateUser($user, $pass);
    if ($valid) {
        granted($user, $pass);
    }
}

if (isset($user)) {
    $valid = validateUser($user, $pass);
    if ($valid) {
        granted($user, $pass);
        echo "Logging in...";
    } else if ($valid == false) {
        $den = denied();
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
    <style></style>
</head>
<body>
<!-- Add your site or application content here -->
<div id="debug"></div>
<div id="web-app">
    <div class="centered">
        <div align="center" id="body">
            <h1>Login to Nexal!</h1>
            <?php printOut($den, '<div class="alert alert-warning"><div align="center"><strong>Error!</strong> Incorrect username or password.</div></div>'); ?>
            <form action="#" method="post">
                <input type="text" class="form-control" placeholder="Username" name="user">
                <br>
                <input type="password" class="form-control" placeholder="Password" name="pass">
                <br>
                <!--<div class="g-recaptcha" data-sitekey="6LdI8jwUAAAAAHxTqg4S_vIg4Vpc_gwpfE7hDb1C"></div>
                <br>-->
                <button type="submit" class="btn btn-info">Login</button>
            </form>
        </div>
    </div>
</div>



<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/main.js"></script>
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;d
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>