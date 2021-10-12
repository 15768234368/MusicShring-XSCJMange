<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<html>
<head>
<title>成绩管理</title>
	<style>
	*{
		padding: 0px;
		margin: 0px;
	}
	input,select{
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
		<form action="scoreAction.php" target="data" method="post" style="float: left; margin: 15px;">
			姓名:<br><input type="text" name="xm">
			<br>课程名：<br><input type="text" name="kcm">
			<br>成绩:<br><input type="number" name="cj">
			<br>
			<button class="button" type="submit" name="录入">录入</button>
			<button class="button" type="submit" name="查询">查询</button>
			<button class="button" type="submit" name="删除">删除</button>
			<button class="button" type="submit" name="更新">更新</button>
		</form>
        
	</div>
    <iframe name="data" class="right" scrolling="auto"></iframe>
</body>
</html>