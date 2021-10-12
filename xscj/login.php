<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登录</title>  
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
	<div id="login-box">
		<h1>登录页面</h1>
		<div class="form">
        <form action="login1.php" method="post" class="form">
			<div class="item">
			   <i class="fa fa-github-alt" style="font-size:24px"></i>
			   <input name="username" type="text" placeholder="username">
               	   
			</div>
			<div class="item">
			   <i class="fa fa-search" style="font-size:24px"></i>
			   <input name="password" type="password" placeholder="password">
           	   
			</div>
		</div>
		<button name="submit" type="submit">Login</button>
	</div>

</body>
</html>