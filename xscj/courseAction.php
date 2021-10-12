<?php
header('Content-Type: text/html; charset=UTF-8');
?>

<!doctype html>
<html>
<body>
	<?php
	
	include("fun.php");
	session_start();
	
	$kcm = $_POST['kcm'];
	$xs = $_POST['xs'];
	$xf = $_POST['xf'];
	
	if(isset($_POST['录入']))
	{
		if(!strlen($kcm)||!strlen($xs)||!strlen($xf))
		{
			echo "<script>alert(\"请填写课程名，学时和学分\")</script>";
			exit();
		}
		
		$sql = "select kcm from kc where kcm = '$kcm'";
		$result = mysqli_query($db,$sql);
		if(mysqli_num_rows($result)>0)
		{
			echo "<script>alert(\"该课程已存在\")</script>";
			exit();
		}
	    
		$sql = "insert into kc(kcm,xs,xf) values('$kcm','$xs','$xf')";
		$result = mysqli_query($db,$sql);
		if($result)
		{
			echo "<script>alert(\"录入成功\")</script>";
			
			$result = mysqli_query($db,"select * from kc where kcm = '$kcm'");
			$row = mysqli_fetch_array($result);
			
			echo "<table border = 1>
			<tr>
			<th>课程名</th>
			<th>学时</th>
			<th>学分</th>
			</tr>";
			echo "<tr><th width = 300px>".$row['kcm'],"</th>";
			echo "<th width= 200px>".$row['xs'],"</th>";
			echo "<th width= 200x>".$row['xf'],"</th></tr>";
			echo "</table>";
		}
		else{
			echo "<script>alert(\"录入失败\")<script>";
		}
	
	}
	
	if(isset($_POST['查询']))
	{
		if(strlen($kcm))
		{
			$sql = "select kcm from kc where kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"该课程不存在，请重试！\")</script>";
				exit();
			}
			
			$sql = "select kcm,xs,xf from kc where kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				$row = mysqli_fetch_array($result);
				echo "<table border = 1><tr>
				<th>课程名</th>
				<th>学时</th>
				<th>学分</th>
				</tr>";
				echo "<tr><th width = 200px>".$row['kcm']."</th>";
				echo "<th width=200px>".$row['xs']."</th>";
				echo "<th width=200px>".$row['xf']."</th></tr>";
				echo "</table>";
			}
		}
		else if(strlen($xs)&&!strlen($kcm)&&!strlen($xf))
		{
			$sql = "select kcm,xs,xf from kc where xs = '$xs'";
			$result = mysqli_query($db,$sql);
			
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无符合条件的课程不存在，请重试！\")</script>";
				exit();
			}
			if($result)
			{
				echo "<table border = 1><tr><th>学时</th><th>课程名</th><th>学分</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width = 200px>".$row['xs']."</th>".
						 "<th width= 200px>".$row['kcm']."</th>".
						 "<th width= 200px>".$row['xf']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
	    }
		else if(strlen($xf) && !strlen($xs) && !strlen($kcm))
		{
			$sql = "select xf,kcm,xs from kc where xf = '$xf'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无符合条件的课程不存在，请重试！\")</script>";
				exit();
			}
			if($result)
			{
				echo "<table border = 1><tr>
				<th>学分</th>
				<th>课程名</th>
				<th>学时</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width=200px>".$row['xf']."</th>".
						 "<th width=200px>".$row['kcm']."</th>".
						 "<th width=200px>".$row['xs']."</th>".
						 "</tr>";
				}
				echo "</table>";
				
			}
		}
		else if(strlen($xs)&&!strlen($kcm)&&strlen($xf))
		{
			$sql = "select kcm,xs,xf from kc where xs = '$xs' and xf = '$xf'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无符合条件的课程不存在，请重试！\")</script>";
				exit();
			}
			if($result)
			{
				echo "<table border = 1><tr><th>学时</th><th>课程名</th><th>学分</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width = 200px>".$row['xs']."</th>".
						 "<th width= 200px>".$row['kcm']."</th>".
						 "<th width= 200px>".$row['xf']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
	    }
		else{
			$sql = "select kcm,xs,xf from kc ";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无符合条件的课程不存在，请重试！\")</script>";
				exit();
			}
			if($result)
			{
			    echo "<table border = 1><tr><th>课程名</th><th>学分</th><th>学时</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr><th width=200px>".$row['kcm']."</th>".
						 "<th width=200px>".$row['xf']."</th>".
						 "<th width=200px>".$row['xs']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
  		}
	}
	
	if(isset($_POST['删除']))
	{
		if(!strlen($kcm)&&!strlen($xs)&&!strlen($xf))
		{
			echo "<script>alert(\"请输入课程名或学时或学分项\")</script>";
			exit();
		}
		
		$sql = "select kcm from kc where kcm = '$kcm'";
		$result = mysqli_query($db,$sql);
		if(!mysqli_num_rows($result))
		{
			echo "<script>alert(\"课程不存在\")</script>";
			exit();
		}
		if(strlen($kcm))
		{
			
			$sql = "delete from kc where kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
	
			if($result)
			{
				echo "<script>alert(\"删除成功\")</script>";
				exit();
			}
			else
			{
				echo "<script>alert(\"删除失败，请重试\")</script>";
				exit();
			}
		
		}
		if(!strlen($kcm)&&strlen($xs)&&!strlen($xf))
		{
			$sql="delete from kc where xs = '$xs'";
			$result = mysqli_query($db,$sql);
			
			if($result)
			{
				echo "<script>alert(\"已删除符合该学时的所有课程\")</script>";
				exit();
			}
			else
			{
				echo "<script>alert(\"删除失败，请重试\")</script>";
				exit();
			}
		}
		if(!strlen($kcm)&&!strlen($xs)&&strlen($xf))
		{
			$sql="delete from kc where xf = '$xf'";
			$result = mysqli_query($db,$sql);
			
			if($result)
			{
				echo "<script>alert(\"已删除符合该学分的所有课程\")</script>";
				exit();
			}
			else
			{
				echo "<script>alert(\"删除失败，请重试\")</script>";
				exit();
			}
		}
		if(!strlen($kcm)&&strlen($xs)&&strlen($xf))
		{
			$sql="delete from kc where xs = '$xs' and xf = '$xf'";
			$result = mysqli_query($db,$sql);
			
			if($result)
			{
				echo "<script>alert(\"已删除符合学分,学时条件的所有课程\")</script>";
				exit();
			}
			else
			{
				echo "<script>alert(\"删除失败，请重试\")</script>";
				exit();
			}
		}
	}
	
	if(isset($_POST['更新']))
	{
		if(!strlen($kcm)||!strlen($xs)||!strlen($xf))
		{
			echo "<script>alert(\"请输入课程名和需修改项\")</script>";
			exit();
		}
		
		$sql = "update kc set xs= '$xs',xf = '$xf' where kcm = '$kcm'";
		$result = mysqli_query($db,$sql);
		if($result)
		{
			echo "<script>alert(\"更新成功\")</script>";
			$result = mysqli_query($db,"select kcm,xs,xf from kc where kcm = '$kcm'");
			$row = mysqli_fetch_array($result);
			echo "<table border = 1>
			<tr><th>课程名</th>
			<th>学时</th>
			<th>学分</th></tr>";
			echo "<tr><th width = 200px>".$row['kcm'],"</th>";
			echo "<th width=200px>".$row['xs'],"</th>";
			echo "<th width=200px>".$row['xf'],"</th></tr>";
			echo "</table>";
		}
		else{
			echo "<script>alert(\"更新失败,请重试\")</script>";
		}
	}
	?>
	</body>
</html>