﻿<?
    error_reporting(E_ALL & ~E_DEPRECATED);
	header("Content-type: text/html; charset=utf-8"); 
	require_once('db_config.php');
	require_once('function.php');
	$username = trim($_POST['username']);
	$password = $_POST['pwd'];
	$errmsg = 0;
	echo $hostname_db;
	echo $username_db;
	if (!empty($username))
	{
		if (empty($username))
		{
			$errmsg = '学号或密码错误！';
		}
		if (empty($errmsg))
		{
			$db = mysql_connect($hostname_db,$username_db,$password_db);
			mysql_select_db($datebase_db);
			mysql_query("set names utf8"); //**设置字符集***
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