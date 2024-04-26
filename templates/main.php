<?php
if(!defined('G_InApp')) {
	exit('Access Denied');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>UCenter Chat Application</title>
		<style>
			.mct{
				color:black;
				text-decoration:none;
				display:block;
			}
			.mct:hover{
				background-color:skyblue;
				padding:3px;
				margin:2px;
				border-radius:4px;
			}
		</style>
		<script>
			function exit(){
				location.assign("api/login.php?deflush=true");
			}
		</script>
		<?php echo PtSyncLogin();?>
	</head>
	<body>
		<div style="position:fixed;top:50px;left:200px;height:calc(100% - 50px);width:calc(100% - 200px);">
			<iframe name="cwt1" id="cwt1" style="border:0px;margin:0px;padding:0px;height:100%;width:100%;" src="?mod=v-iframe"></iframe>
		</div>
		<div style="background-color:skyblue;position:fixed;top:0px;left:0px;height:49px;width:100%;border-bottom:1px solid black;">
			<div style="margin:3px;">
				<span style="font-size:35px;user-select:none;">
					UCenter Chat
				</span>
			</div>
		</div>
		<div style="background-color:white;position:fixed;top:50px;left:0px;height:calc(100% - 56px);width:calc(200px - 7px);padding:3px;border-right:1px solid black;">
			<a href="?mod=v-iframe" class="mct" target="cwt1">✨ 消息中心</a>
			<a href="?mod=account" class="mct" target="cwt1">👑 账户管理</a>
			<a onclick="if(confirm('是否退出登录？')){exit();}" class="mct">🌚 退出登录</a>
		</div>
	</body>
</html>