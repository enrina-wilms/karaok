<?php
session_start();
require_once 'vendor/autoload.php';

//GOOGLE CLIENT AUTHENTICATION GOT FROM GOOGLE CLOUD CONSOLE
$g_client = new Google_Client();
$g_client->setCLientId("326567012580-s9r1t6j9608big2eg7fapoa22n60k9u8.apps.googleusercontent.com");
$g_client->setClientSecret("vD96ZuPibBQfOsu4OKx1l1rh");
$g_client->setApplicationName("karaok");

//AUTHORIZED REDIRECT URI
$g_client->setRedirectUri("http://karaok.enrinawilms.com/includes/gcallback.php");

//SCOPE GOOGLE PLUS
$g_client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

//CONFIG FILES FOR FILEPATH OF MY PAGES
define ("INCLUDES_PATH", realpath('../includes/'));
define ("INCLUDES_CSS", realpath('../css/'));
define ("MODELS_PATH", realpath('../models/'));
$csspath = INCLUDES_CSS. "style.css";

define('DEVELOPER_KEY', 'AIzaSyC-x9OBwI8RA5u1ewO7ThRMQb-uxUWqdjY');

function getYTList($api_url = '') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $arr_result = json_decode($response);
    if (isset($arr_result->items)) {
        return $arr_result;
    } elseif (isset($arr_result->error)) {
        echo "Invalid channel id";
    }
}