<?php
if(!file_exists("lib/main_conf.php") || !file_exists("lib/uc_conf.php")){
	die("<html><head><meta charset=\"utf-8\"><title>错误</title></head><body style=\"color:red\">错误：网站未安装。</body></html>");
}

require_once "lib/main_conf.php";
require_once G_SITE_ROOT."lib/usersys.php";

if(G_USER_ID == 0){
	include G_SITE_ROOT."templates/login.html";
} else {
	$mod = isset($_REQUEST["mod"])?$_REQUEST["mod"]:"index";
	switch($mod){
		case "index":
			include G_SITE_ROOT."templates/main.php";
		break;
		case "v-iframe":
			uc_pm_location(G_USER_ID);
		break;
		case "account":
			include G_SITE_ROOT."templates/account.php";
		break;
		default:
			http_response_code(404);
			die();
	}
}
?>