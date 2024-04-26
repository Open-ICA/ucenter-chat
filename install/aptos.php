<?php
define('SITE_ROOT', substr(dirname(__FILE__), 0, -7));

if(!isset($_REQUEST["site-name"])){
	die();
}
$site_name = $_REQUEST["site-name"];

if(!isset($_REQUEST["site-url"])){
	die();
}
$site_url = $_REQUEST["site-url"];

if(!isset($_REQUEST["site-user-page"])){
	die();
}
$site_user_page = $_REQUEST["site-user-page"];

if(!isset($_REQUEST["folder"])){
	die();
}
$site_folder = $_REQUEST["folder"];

if(!isset($_REQUEST["ucenter-config"])){
	die();
}
$ucenter_config = $_REQUEST["ucenter-config"];
$token_secret = "";
for($i=1; $i<=rand(0,16)+21; $i++){
	$token_secret .= chr(rand(0,255));
}
$token_secret = base64_encode($token_secret);

$changivle = array("{discuz-name}","{discuz-url}","{discuz-user-url}","{site-folder}","{prefix}","{token-secret}");
$vendoble = array($site_name,$site_url,$site_user_page,$site_folder,"aGd".rand(0,65535),$token_secret);

file_put_contents(SITE_ROOT."lib/main_conf.php",str_replace($changivle,$vendoble,file_get_contents(SITE_ROOT."install/template/main_conf.php.txt")));

file_put_contents(SITE_ROOT."lib/uc_conf.php","<?php\n".$ucenter_config."\n?>")

?>网站安装完毕。