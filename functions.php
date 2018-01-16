<?php

/**
 * @param $path
 * @param $element
 * @return SimpleXMLElement[]
 */
function readXML($path, $element) {
    $dump = file_get_contents($path);
    $encodedDump = <<<XML
$dump
XML;
    $XML = new SimpleXMLElement($encodedDump);
    return $XML->$element;
}

/**
 * @param $path
 * @param $element
 * @param $content
 */
function writeXML($path, $element, $content) {
    $dump = file_get_contents($path);
    $encodedDump = <<<XML
$dump
XML;
    $XML = new SimpleXMLElement($encodedDump);
    $XML->$element = $content;
}

/**
 * @param $user
 * @param $pass
 * @return bool
 */
function validateUser($user, $pass) {
    $user = strtolower($user);
    $userPath = "users/$user/data.xml";
    if (file_exists($userPath)) {
        $userString = file_get_contents($userPath);
        $userString2 = <<<XML
$userString
XML;
        $userInfo = new SimpleXMLElement($userString2);
        if ((string)$userInfo->password[0] == $pass) {
            return true;
        } else if ((string)$userInfo->password[0] != $pass) {
            return false;
        }
    } else {
        return false;
    }
    return false;
}

/**
 * @param $user
 * @param $pass
 */
function granted($user, $pass) {
    setcookie("login", true, time() + 60 * 60 * 24 * 30, '/', 'app.nexal.net', true, true);
    setcookie("username", $user, time() + 60 * 60 * 24 * 30, '/', 'app.nexal.net', true, true);
    setcookie("password", $pass, time() + 60 * 60 * 24 * 30, '/', 'app.nexal.net', true, true);
    session_start();
    $_SESSION["login"] = true;
    $_SESSION["user"] = $user;
    $_SESSION["pass"] = $pass;
}

/**
 *
 */
function denied() {
    setcookie("login", false, time() + 60 * 60 * 24 * 30, '/', '', true, true);
    return true;
}

/**
 * @param $file
 * @param $content
 * @param $overwrite
 */
function writeFile($file, $content, $overwrite) {
    $OGTXT = file_get_contents($file);
    $file = fopen($file, "w") or die("Unable to open file!");
    if ($overwrite == true) {
        fwrite($file, $content);
        fclose($file);
    } else {$OGTXT = $OGTXT . '\n';
        fwrite($file, $OGTXT);
        fwrite($file, $content);
        fclose($file);
    }
}

function printOut($var, $text) {
    global $var;
    if ($var == true) {
        echo $text;
    }
}