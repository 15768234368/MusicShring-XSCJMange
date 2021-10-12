<?php
	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
<title>学生管理系统</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* body 样式 */
.body{
    width: 100%;
    min-height: 75vh;
    background-color: Coral;
	background-color:rgba(220,38,38,0.2);
	opacity: 0.75;
}

/* 标题 */
.header {
    padding: 10px;
	height: 100px;
    text-align: center;
    background:#CFF;
    color: blcak;
}

/* 标题字体加大 */
.header h1 {
    font-size: 20px;
}

/* 导航 */
.navbar {
    overflow: hidden;
    background-color: #333;
}

/* 导航栏样式 */
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}
.left{
			float: left;
			box-sizing: border-box;
			border-radius: 10px;
			width: 200px;
			min-height: 600px;
			background: BurlyWood;
		}
.middle{
			float: left;
			margin-left: 10px;
			border-radius: 10px;
			width: 1200px;
			min-height: 600px;
			background: BurlyWood;
		}
.button{
			margin-left: 40px;
			margin-right: 40px;
			margin-top: 50px;
			width: 100px;
			height: 40px;
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 5px;
			background: rgab
}
a:link { text-decoration: none;color: blue};

/* 底部 */
.footer {
	width: 100%;
	height: 87px;
	position: absolute;
	left: 59px;
	bottom: 232px;
	background:#F00;
            }


/* 响应式布局 - 在屏幕设备宽度尺寸小于 700px 时, 让两栏上下堆叠显示 */
@media screen and (max-width: 700px) {
    .row {   
        flex-direction: column;
    }
}

/* 响应式布局 - 在屏幕设备宽度尺寸小于 400px 时, 让导航栏目上下堆叠显示 */
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width: 100%;
    }
}
</style>
</head>
<body background="images/20.jpg">

<div class="header">
	<h1>学生管理系统</h1>
</div>


<div class="body">
<div style="width: 100%; min-height: 450px; display: flex; justify-content: center; margin-top: 20px;">
	<div class="left">
				<a href="student_manage.php" target="main"><div class="button">学生管理</div></a>
				<a href="score_manage.php" target="main"><div class="button">成绩管理</div></a>
				<a href="course_manage.php" target="main"><div class="button">课程管理</div></a>
			</div>
			<div class="middle">
				<iframe name="main" frameborder="0" width="100%" height="100%" scrolling="no"></iframe>
			</div>
	</div>
</div>
<div class="footer">
<div style="width: 100%; margin-left: 0px; background:#CFF">
<h2>系别：计算机科学与工程学院
班级：19软件工程2班
</h2><h2>姓名：张美锋
联系方式：18320524725@163.com
</h2>
</div>
</div>

</body>
</html>