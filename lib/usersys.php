<?php
$uid = 0;
$username = "";
$email = "";
require_once "main_conf.php";
require_once G_SITE_ROOT."lib/rc4.php";
require_once G_SITE_ROOT."lib/uc_conf.php";
require_once G_SITE_ROOT."uc_client/client.php";
//用户Token - 取得用户信息
if(isset($_COOKIE[G_CookiePrefix."jwt"])){
	$c_jwt = $_COOKIE[G_CookiePrefix."jwt"];
	$p_jwt = json_decode(rc4(G_TokenSecret,Base32::decode($c_jwt)),true);
	if($p_jwt != null && isset($p_jwt["uid"]) && isset($p_jwt["expire"]) && $p_jwt["expire"] > time()){
		$uid = (int)($p_jwt["uid"]);
	}
}
if($uid != 0){
	
	if($ucdata = uc_get_user($uid,1)) {
		list($uid, $username, $email) = $ucdata;
	} else {
		$uid = 0;
	}
}

define("G_USER_ID",$uid);
define("G_USER_NAME",$username);
define("G_USER_EMAIL",$email);

function PtSyncLogin(){
	if(G_USER_ID > 0){
		return uc_user_synlogin(G_USER_ID);
	} else {
		return uc_user_synlogout();
	}
}
?>