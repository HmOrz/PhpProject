<?
	require_once('function.php');
	$username = trim($_POST['username']);
	$password = $_POST['pwd'];
	$errmsg = 0;
	if (!empty($username))
	{
		if (empty($username))
		{
			$errmsg = '学号输入错误！';
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
			echo $sql;
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
	echo "<font color='red' size='5'>用户：".$username."".$errmsg."</font><br>\n";
?>