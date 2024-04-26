<?php
require_once "../lib/main_conf.php";
require_once G_SITE_ROOT."lib/rc4.php";
require_once G_SITE_ROOT."lib/uc_conf.php";
require_once G_SITE_ROOT."uc_client/client.php";

if(isset($_REQUEST["deflush"]) && $_REQUEST["deflush"] == "true"){
	setcookie(G_CookiePrefix."jwt","",1,"/");
	die("<script>location.assign('".G_SiteFolder."')</script>");
}

if(!isset($_REQUEST["username"]) || !isset($_REQUEST["password"])){
	die("<script>location.assign('".G_SiteFolder."')</script>");
}

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
if(str_replace("@","",$username) != $username){
	list($uid, $username, $password, $email) = uc_user_login($username, $password, 2);
} else {
	list($uid, $username, $password, $email) = uc_user_login($username, $password);
}

if($uid > 0) {
	$jwt = array("uid"=>$uid,"expire"=>time()+24*3600);
	setcookie(G_CookiePrefix."jwt",Base32::encode(rc4(G_TokenSecret,json_encode($jwt))),time()+3600*24,"/");
}

die("<script>location.assign('".G_SiteFolder."')</script>");
?>