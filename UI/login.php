<?
    error_reporting(E_ALL & ~E_DEPRECATED);
	header("Content-type: text/html; charset=utf-8"); 
	require_once('db_config.php');
	require_once('function.php');
	$username = trim($_POST['username']);
	$password = $_POST['pwd'];
	$errmsg = 0;
	if (!empty($username))
	{
		if (empty($username))
		{
			$errmsg = '学号或密码错误！';
		}
		if(mysqli_connect_errno())
		{
			$errmsg = 2;
		}
		else
		{
			$sql = "SELECT * FROM `user` WHERE no = '$username' AND pwd = '$password'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$temp = "$row[indate]";
			$y = explode('.',$temp,2);
			if($result && mysql_num_rows($result) > 0)
			{
				$errmsg = 1;
				session_start();
				$_SESSION['login'] = "$row[iden]";
				$_SESSION['user'] = $username;
				$_SESSION['name'] = "$row[name]";
				$_SESSION['year'] = $y[0];
			}
			else
			{
				$errmsg = 0;
				session_start();
				unset($_SESSION['login']);
			}
			mysql_free_result($result);
			mysql_close($db);
		}
	}
	
	if($errmsg == 1)
	{
		$url="login_rep_succ.html";
		echo "<script language='javascript' type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>";  
	}
	else if($errmsg == 0)
	{
		$url="login_rep_fail.html";
		echo "<script language='javascript' type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>";
	}
?>