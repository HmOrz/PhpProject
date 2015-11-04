<?
    error_reporting(E_ALL & ~E_DEPRECATED);
	require_once('function.php');
	$username = trim($_POST['username']);
	$password = $_POST['pwd'];
	$errmsg = 0;
	if (!empty($username))
	{
		if (empty($username))
		{
			$errmsg = 'Ñ§ºÅÊäÈë´íÎó£¡';
		}
		if (empty($errmsg))
		{
			$db = mysql_connect('localhost','root','');
			mysql_select_db('clprj');
		}
		if(mysqli_connect_errno())
		{
			$errmsg = 2;
		}
		else
		{
			$sql = "SELECT * FROM `user` WHERE no = '$username' AND pwd = '$password'";
			$result = mysql_query($sql);
			if($result && mysql_num_rows($result) > 0)
			{
				$errmsg = 1;
				session_start();
				$_SESSION['login'] = 'true';
				$_SESSION['user'] = $username;
			}
			else
			{
				$errmsg = 0;
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