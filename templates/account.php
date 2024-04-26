<?php
if(!defined('G_InApp')) {
	exit('Access Denied');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
			.mitare{
				color:black;
				text-decoration:none;
			}
			.mitare:hover{
				text-decoration:underline;
			}
		</style>
		<?php echo PtSyncLogin();?>
	</head>
	<body style="margin:0px;padding:3px;">
		<div style="border:1px solid black;border-radius:3px;padding:4px;">
			<img style="border:1px solid black;width:120px;height:120px;border-radius:3px;" src="<?php echo UC_API.'/avatar.php?uid='.G_USER_ID.'&type=vitural&size=middle';?>"/>
			<div style="position:absolute;top:7px;left:140px;">
				<h2 style="display:inline;">欢迎您，<a class="mitare" href="<?php echo str_replace('{uid}',G_USER_ID,G_UserProfileURI);?>"><?php echo G_USER_NAME;?></a></h2><br/>
				平台:<a class="mitare" href="<?php echo G_SiteURI;?>"><?php echo G_SiteName;?></a> | UID:<?php echo G_USER_ID;?> | 权限:普通用户
			</div>
		</div>
		<div style="border:1px solid black;border-radius:3px;padding:4px;margin-top:3px;">
			本站基于UCenter Chat开源项目（Copyright © 2024 碧蓝航线官方百合站）
		</div>
	</body>
</html>