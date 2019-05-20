<?php

require_once '../config.php';
unset($_SESSION['access_token']);
//unset($_SESSION['username']);
//unset($_SESSION['password']);
unset($_SESSION['givenname']);
unset($_SESSION['familyname']);
unset($_SESSION['email']);
$g_client->revokeToken();

//session_destroy();

//WHEN LOGGED OUT USER WILL BE REDIRECTED TO INDEX PAGE AGAIN
header("Location:../includes/login.php");

?>
