<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/user.php';
//session_start();
//USERS THAT ALREADY LOGGED IN


if(isset($_SESSION['access_token'])){
	$g_client->setAccessToken($_SESSION['access_token']);
}

else if(isset($_GET['code'])){
	$token = $g_client->fetchAccessTokenWithAuthCode($_GET['code']);
	$_SESSION['access_token']= $token;
	
}else{
	//USERS THAT ARE NOT AUTHORIZED
	header("Location:login.php");
}

$oAuth = new Google_Service_Oauth2($g_client);
$userdata = $oAuth->userinfo_v2_me->get();

//USERDATA THAT WILL BE IN GATHERED FROM GOOGLE ADN STORED AS SESSION
$_SESSION['email'] = $userdata['email'];
$_SESSION['givenname'] = $userdata['givenName'];
$_SESSION['familyname'] = $userdata['familyName'];
$_SESSION['username'] = $userdata['givenName'] . " " . $userdata['familyName'];

//GETTING SESSION VARIABLES TO GET DATA AND STORE IT ON THE DATABASE FOR USERS TABLES
$fname = $_SESSION['givenname'];
$lname = $_SESSION['familyname'];
$email = $_SESSION['email'];
//THIS PASSWORD IS A DEFAULT PASSWORD FOR NOW IF USER CHOOSE GOOGLE SIGNIN
$password = md5("KaraokeTest1234");
		
$db = Database::getDb();
$statusObj = new User();
$add = $statusObj->addUser($fname, $lname, $email, $password, $db);

//ONCE LOGGED IN IT WILL REDIRECT TO THIS PAGE
header("Location:../includes/homepage.php");
exit();
?>
