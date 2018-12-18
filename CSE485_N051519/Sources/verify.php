<?php
// core configuration
include_once('config/core.php');
include_once('models/m_user.php');

$m_user = new M_user();
 
// set access code
$access_code = isset($_GET['access_code']) ? $_GET['access_code'] : "";
// verify if access code exists
if(!$m_user->accessCodeExists($access_code)){
    die("ERROR: Access code not found.");
}
// redirect to login
else{
    // update status
    $m_user->updateStatusByAccessCode($access_code);
     
    // and the redirect
    header("Location: {$home_url}login.php?action=email_verified");
}
?>