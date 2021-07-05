<?php
session_start();

require "Util.php";
$util = new Util();


if (isset($_SESSION["staffid"])){
	session_unset();
	session_destroy();
	header('Location: mainpage.php');
	return;
}

if (isset($_SESSION["studentid"])){
	session_unset();
	session_destroy();
	header('Location: mainpage.php');
	return;
}


// clear cookies
$util->clearAuthCookie();

header('Location: mainpage.php');
return;
?>
