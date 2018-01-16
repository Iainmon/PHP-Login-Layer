<?php
/**
 * Created by PhpStorm.
 * User: iainmoncrief
 * Date: 12/19/17
 * Time: 5:05 AM
 */

setcookie("login", false, time() + 60 * 60 * 24 * 30, '/', 'app.nexal.net', true, true);
setcookie("username", '', time() + 60 * 60 * 24 * 30, '/', 'app.nexal.net', true, true);
setcookie("password", '', time() + 60 * 60 * 24 * 30, '/', 'app.nexal.net', true, true);
session_start();
$_SESSION = array();
session_destroy();
header("location: index.php");