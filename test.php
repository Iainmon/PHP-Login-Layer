<?php
/**
 * Created by PhpStorm.
 * User: iainmoncrief
 * Date: 12/13/17
 * Time: 12:03 PM
 */
/*$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
*/
?>
<html>
<body>

<?php
$cookie_name = "user";
//if(!isset($_COOKIE[$cookie_name])) {

    echo "Value is: " . $_COOKIE["gay"];
//}
?>

</body>
</html>