<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>学生管理</title>
<style>
	*{
		padding: 0px;
		margin: 0px;
	}
	input{
		margin-bottom: 15px;
		margin-left: 5px;
	}
	button{
		margin-bottom: 15px;
	}
	body{
		width: 1200px;
		display: flex;
		justify-content: center;
	}
	.middle{
		box-sizing: border-box;
		border-radius: 10px;
		width: 300px;
		min-height: 600px;
		background:BurlyWood;
	}
	.right{
		box-sizing: border-box;
		margin-left: 10px;
		border-radius: 10px;
		width: 900px;
		min-height: 600px;
		background: BurlyWood;
	}
</style>
</head>
<body>
	<div class="middle">
		<form action="studentAction.php" target="data" method="post" style="float: left; margin: 15px;">
			姓名:<input type="text" name="xm"><br>
			性别:<input type="radio" name="xb" value="1">男<input type="radio" name="xb" value="0">女<br>
			出生日期:<input type="date" name="cssj"><br>
			课程数:<input type="number" name="kcs"><br>
			<button type="submit" name="查询">查询</button>
			<button type="submit" name="录入">录入</button>
			<button type="submit" name="删除">删除</button>
			<button type="submit" name="更新">更新</button>
			
		</form>
	</div>
	<iframe name="data" class="right" scrolling="auto"></iframe>
</body>
</html>