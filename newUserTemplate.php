<?php
/**
 * Created by PhpStorm.
 * User: iainmoncrief
 * Date: 12/21/17
 * Time: 5:58 PM
 */
include_once "functions.php";
function newUser($user, $pass, $email, $fname, $lname) {
    mkdir("users/$user");
    mkdir("users/$user/pics");
    $date = date("d/m/y");
    $dataTemplate =
        "<?xml version='1.0' standalone='yes'?>
<user>
    <username>$user</username>
    <password>$pass</password>
    <firstname>$fname</firstname>
    <lastname>$lname</lastname>
    <email>$email</email>
    <datecreated>$date</datecreated>
    <profile>
        <pic></pic>
    </profile>
    <data></data>
    <lastlogin>
        <minute></minute>
        <hour></hour>
        <day></day>
        <month></month>
        <year></year>
    </lastlogin>
</user>";
    writeFile("users/$user/data.xml", $dataTemplate, false);
}