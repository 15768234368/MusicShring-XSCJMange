 <?php
header('Content-Type: text/html; charset=UTF-8');
?>
<?php
	session_start();
	include("fun.php");
	$name = $_POST['xm'];
	$kcm = $_POST['kcm'];
	$score = $_POST['cj'];
	
	if(isset($_POST['录入']))
	{
		if(!strlen($name) ||!strlen($kcm) ||!strlen($score))
		{
			echo "<script>alert(\"请输入姓名，课程名和成绩\");</script>";
			exit();
		}
		
		$sql = "select cj from cj where xm = '$name' and kcm = '$kcm'";
		$result = mysqli_query($db,$sql);
		if(mysqli_num_rows($result)>0)
		{
			echo"<script>alert(\"该学生已有成绩记录\");</script>";
			exit();
		}
		
		$sql = "insert into cj(xm,kcm,cj) values('$name','$kcm','$score')";
		$result = mysqli_query($db,$sql);
		if($result)
		{
			echo"<script>alert(\"录入成功\")</script>";
			$result	= mysqli_query($db,"select * from cj where xm = '$name' and kcm = '$kcm'");
			$row = mysqli_fetch_array($result);
			echo "<table border=1><tr><th>姓名</th><th>课程名</th><th>成绩</th>";
			echo "<tr><th width = 200px>".$row['xm']."</th>";
			echo "<th width=200px>".$row['kcm']."</th>";
			echo "<th width=200px>".$row['cj']."</th></tr>";
			echo "</table>>";
		}
		else
		{
			echo "<script>alert(\"录入失败\");<script>";
		}
		
	}
	if(isset($_POST['删除']))
	{
		if(!strlen($name))
		{
			echo"<script>alert(\"请输入学生姓名\");</script>";
			exit();
		}
		
		$sql = "select xm from cj where xm = '$name'";
		$result = mysqli_query($db,$sql);
		if(!mysqli_num_rows($result))
		{
			echo "<script>alert(\"暂无该学生记录\");</script>";
			exit();	
		}
		
		if(strlen($kcm)&&strlen($name))
		{
			$sql = "delete from cj where xm = '$name' and kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
			
			if($result)
			{
				echo "<script>alert(\"该学生该门课程成绩已删除\")</script>";
				exit();	
			}
			else
			{
				echo "<script>alert(\"删除失败，请重试\")</script>";
				exit();	
			}
		}
		else if(strlen($name))
		{
			$sql = "delete from cj where xm = '$name'";
			$result = mysqli_query($db,$sql);
			
			if($result)
			{
				echo "<script>alert(\"该学生所有课程成绩已删除\")</script>";
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
		if(!strlen($name) || !strlen($kcm) || !strlen($score))
		{
			echo "<script>alert(\"请输入需修改的选项！\")</script>";
			exit();
		}
		
		$sql = "select xm from cj where xm = '$name'";
		$result = mysqli_query($db,$sql);
		if(!mysqli_num_rows($result))
		{
			echo "<script>alert(\"无该学生记录\")</script>";
			exit();
		}
		
		$sql = "update cj set cj = '$score'	where xm = '$name' and kcm = '$kcm'";
		$result = mysqli_query($db,$sql);
		if($result)
		{
			 echo "<script>alert(\"更新成功\")</script>";
			 $result = mysqli_query($db,"select * from cj where xm = '$name' and kcm = '$kcm'");
			 $row = mysqli_fetch_array($result);
			 echo "<table border = 1>
			 <tr>
			 <th>姓名</th>
			 <th>课程</th>
			 <th>成绩</th>
			 </tr>";
			 echo "<tr><th width = 200px>".$row['xm'],"</th>";
			 echo "<th width=200px>".$row['kcm'],"</th>";
			 echo "<th width= 200px>".$row['cj'],"</th></tr>";
			 echo "</table>";	
		}
		else
		{
			echo "<script>alert(\"更新失败，请重试\")</script>";
			exit();
		}	
	}
	
	if(isset($_POST['查询']))
	{
		if(strlen($name)&&!strlen($score)&&!strlen($kcm))
		{
			
			$sql = "select xm from cj where xm = '$name'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无该学生\")</script>";
				exit();
			}
			$sql = "select xm,kcm,cj from cj where xm = '$name'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border = 1><tr><th>姓名</th><th>课程</th><th>成绩</th></tr>";
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					echo "<tr><th width = 200px>".$row['xm']."</th>".
						 "<th width=200px>".$row['kcm']."</th>".
						 "<th width=200px>".$row['cj']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<script>alert(\"该学生尚未录入任何成绩\")</script>";
				exit();
			}
		}
		else if(strlen($name)&&strlen($kcm))
		{
			$sql = "select xm,kcm,cj from cj where xm = '$name' and kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
			if($row = mysqli_fetch_array($result))
			{
				echo "<table border = 1><tr><th>姓名</th><th>课程</th><th>成绩</th></tr>";
				echo "<tr><th width = 200px>".$row['xm']."</th>".
				 "<th width=200px>".$row['kcm']."</th>".
				 "<th width= 200px>".$row['cj']."</th>".
				 "</tr>";
				echo "</table>";
			}
			else{
				echo "<script>alert(\"暂无该学生课程成绩\")</script>";
				exit();
			}
		}
		else if(strlen($name)&&strlen($score))
		{
			$sql = "select xm,cj from cj where xm = '$name' and cj = '$score'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无该学生的成绩信息\")</script>";
				exit();
			}
			$sql = "select xm,kcm,cj from cj where cj= '$score' and xm = '$name'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border = 1><tr><th>姓名</th><th>课程</th><th>成绩</th></tr>";
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>".
						 "<th width=200px>".$row['kcm']."</th>".
						 "<th width=200px>".$row['cj']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
		}
		else if(strlen($kcm)&&strlen($score))
		{
			$sql = "select kcm,cj from cj where kcm = '$kcm' and cj = '$score'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无该课程的成绩信息\")</script>";
				exit();
			}
			$sql = "select xm,kcm,cj from cj where cj= '$score' and kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border = 1><tr><th>姓名</th><th>课程</th><th>成绩</th></tr>";
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>".
						 "<th width=200px>".$row['kcm']."</th>".
						 "<th width=200px>".$row['cj']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
		}
		else if(strlen($score)&&!strlen($kcm)&&!strlen($name))
		{
			$sql = "select cj from cj where cj = '$score'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无该成绩的学生信息\")</script>";
				exit();
			}
			$sql = "select xm,kcm,cj from cj where cj= '$score'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border = 1><tr><th>姓名</th><th>课程</th><th>成绩</th></tr>";
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>".
						 "<th width=200px>".$row['kcm']."</th>".
						 "<th width=200px>".$row['cj']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
		}
		else if(!strlen($score)&&strlen($kcm)&&!strlen($name))
		{
			$sql = "select kcm from cj where kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
			if(!mysqli_num_rows($result))
			{
				echo "<script>alert(\"暂无该课程的学生成绩信息\")</script>";
				exit();
			}
			$sql = "select xm,kcm,cj from cj where kcm = '$kcm'";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border = 1><tr><th>姓名</th><th>课程</th><th>成绩</th></tr>";
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					echo "<tr><th width =200px>".$row['xm']."</th>".
						 "<th width=200px>".$row['kcm']."</th>".
						 "<th width=200px>".$row['cj']."</th>".
						 "</tr>";
				}
				echo "</table>";
			}
		}
		else
		{
			$sql = "select xm,cj,kcm from cj";
			$result = mysqli_query($db,$sql);
			if($result)
			{
				echo "<table border = 1><tr><th>课程</th><th>姓名</th><th>成绩</th></tr>";
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						echo "<tr><th width = 200px>".$row['kcm']."</th>".
							 "<th width=200px>".$row['xm']."</th>".
							 "<th width=200px>".$row['cj']."</th>".
							 "</tr>";
					}
				echo "</table>";
			}
			else 
			{
				echo "<script>alert(\"暂无学生成绩信息\")</script>";
				exit();	
			}
    	}
	}
?>