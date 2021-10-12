<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<?php
session_start();

include("fun.php");

$name = $_POST['xm'];
$sex = $_POST['xb'];
$birthday = $_POST['cssj'];
$kcs = $_POST['kcs'];

	if(isset($_POST['录入']))
	{
		if(!strlen($name))
		{
			echo "<script>alert(\"姓名不能为空\");</script>";
			exit();
		}
		$sql = "select xm from xs where xm = '$name'";
		$result = mysqli_query($db,$sql);
		if(mysqli_num_rows($result))
		{
			echo "<script>alert(\"该学生已存在\");</script>";
			exit();
		}
		
		$sql = "insert into xs(xm,xb,cssj,kcs) values('$name','$sex','$birthday','$kcs')";
		$result = mysqli_query($db,$sql);
		
		if($result)
		{
			echo "<script>alert(\"录入成功\")</script>";
			$result = mysqli_query($db,"select xm,xb,cssj,kcs from xs where xm = '$name'");
			$row = mysqli_fetch_array($result);
			echo "<table border=1><tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
			echo "<tr><th width=200px>".$row['姓名']."</th>";
			echo "<th width=200px>";
			if($row['性别'] == 1) echo "男";
			else echo "女";
			echo "</th>";
			echo "<th width=300px>".$row['出生日期']."</th>";
			echo "<th width=200px>".$row['已修课程数']."</th>";
			echo "</table>";	
		}
		else
		{
			echo "<script>alert(\"录入失败\");</script>";
		}
	}
	if(isset($_POST['查询']))
	{
		if(strlen($name)&&!strlen($sex)&&!strlen($kcs))
		{
			$sql = "select xm from xs where xm = '$name'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"学生不存在\");</script>";
				exit();
			}
			
			$sql = "select xm,xb,cssj,kcs from xs where xm = '$name'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>";
					echo "<th width= 200px>";
					if($row['xb']==1)echo"男";
					else echo"女";
					echo "</th>";
					echo "<th width =300px>".$row['cssj']."</th>";
					echo "<th width =200px>".$row['kcs']."</th></tr>";
				}
				echo "</table>";
			}
			
		}
		else if(strlen($sex)&&!strlen($kcs)&&!strlen($name))
		{
			$sql = "select xm,xb,cssj,kcs from xs where xb = '$sex'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>";
					echo "<th width= 200px>";
					if($row['xb']==1)echo"男";
					else echo"女";
					echo "</th>";
					echo "<th width =300px>".$row['cssj']."</th>";
					echo "<th width =200px>".$row['kcs']."</th></tr>";
				}
				echo "</table>";
			}
				else
				{
					echo "<script>alert(\"不存在满足条件的同学\")</script>";
					exit();
				}
		}
		else if(strlen($kcs)&&!strlen($name)&&!strlen($sex))
		{
			$sql = "select xm,xb,cssj,kcs from xs where kcs = '$kcs'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>";
					echo "<th width= 200px>";
					if($row['xb']==1)echo"男";
					else echo"女";
					echo "</th>";
					echo "<th width =300px>".$row['cssj']."</th>";
					echo "<th width =200px>".$row['kcs']."</th></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<script>alert(\"暂无该课程数的学生数据\")</script>";
				exit();
			}
		}
		else if(!strlen($name)&&strlen($sex)&&strlen($kcs))
		{
			$sql = "select xm,xb,cssj,kcs from xs where kcs = '$kcs' and xb = '$sex'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>";
					echo "<th width= 200px>";
					if($row['xb']==1)echo"男";
					else echo"女";
					echo "</th>";
					echo "<th width =300px>".$row['cssj']."</th>";
					echo "<th width =200px>".$row['kcs']."</th></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<script>alert(\"暂无符合条件的学生数据\")</script>";
				exit();
			}
		}
		else if(strlen($name)&&!strlen($sex)&&strlen($kcs))
		{
			$sql = "select xm,xb,cssj,kcs from xs where kcs = '$kcs' and xb = '$sex'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>";
					echo "<th width= 200px>";
					if($row['xb']==1)echo"男";
					else echo"女";
					echo "</th>";
					echo "<th width =300px>".$row['cssj']."</th>";
					echo "<th width =200px>".$row['kcs']."</th></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<script>alert(\"暂无符合条件的学生数据\")</script>";
				exit();
			}
		}
		else if(strlen($name)&&strlen($sex)&&!strlen($kcs))
		{
			$sql = "select xm,xb,cssj,kcs from xs where kcs = '$kcs' and xb = '$sex'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>";
					echo "<th width= 200px>";
					if($row['xb']==1)echo"男";
					else echo"女";
					echo "</th>";
					echo "<th width =300px>".$row['cssj']."</th>";
					echo "<th width =200px>".$row['kcs']."</th></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<script>alert(\"暂无符合条件的学生数据\")</script>";
				exit();
			}
		}
		else
		{
			$sql = "select xm,xb,cssj,kcs from xs";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>";
					echo "<th width= 200px>";
					if($row['xb']==1)echo"男";
					else echo"女";
					echo "</th>";
					echo "<th width =300px>".$row['cssj']."</th>";
					echo "<th width =200px>".$row['kcs']."</th></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<script>alert(\"数据库中暂无学生信息\")</script>";
				exit();
			}
		}
}

if(isset($_POST['删除']))
{
	if(!strlen($name))
	{
		echo "<script>alert(\"请输入学生姓名\");</script>";
		exit();	
	}
	
	$sql = "select xm from xs where xm = '$name'";
	$result = mysqli_query($db,$sql);
	
	if(!mysqli_num_rows($result))
	{
		echo "<script>alert(\"无该学生信息\");</script>";
		exit();
	}
	
	$sql = "delete from xs where xm = '$name'";
	$result = mysqli_query($db,$sql);
	if($result)
	{
		echo "<script>alert(\"删除成功\");</script>";
	}
	else
	{
		echo "<script>alert(\"删除失败，请重试一遍\");</script>";
	}
	
}
if(isset($_POST['更新']))
{
	if(!strlen($name))
	{
		echo "<script>alert(\"请输入学生姓名\");</script>";
		exit();
	}
	if(!strlen($sex) || !strlen($birthday) || !strlen($kcs))
	{
		echo "<script>alert(\"请填写修改项内容\");</script>";
		exit();
	}
	$sql = "select xm from xs where xm = '$name'";
	$result = mysqli_query($db,$sql);
	if(!mysqli_num_rows($result))
	{
		echo "<script>alert(\"无学生信息\");</script>";
		exit();
	}
	
	$sql = "update xs set xb = '$sex', cssj = '$birthday', kcs = '$kcs' where xm = '$name'";
	$result = mysqli_query($db,$sql);
	if($result)
	{
		echo "<script>alert(\"更新成功\");</script>";
		$result = mysqli_query($db,"select xm,xb,cssj,kcs from xs where xm = '$name'");
		$row = mysqli_fetch_array($result);
		echo "<table border=1> <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
		echo "<tr><th width =200px>".$row['xm']."</th>";
		echo "<th width= 200px>";
		if($row['xb']==1)echo"男";
		else echo"女";
		echo "</th>";
		echo "<th width =300px>".$row['cssj']."</th>";
		echo "<th width =200px>".$row['kcs']."</th></tr>";
		echo "</table>";
	}
	else
	{
		echo "<script>alert(\"更新失败，请重试一遍\");</script>";
		exit();
	}
}

?>