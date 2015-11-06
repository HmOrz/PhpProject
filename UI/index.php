<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
    error_reporting(E_ALL & ~E_DEPRECATED);
    header('Content-type: text/html;charset=UTF-8');
	require_once('db_config.php');
	$db = mysql_connect($hostname_db,$username_db,$password_db);
	mysql_select_db($datebase_db);
	mysql_query("set names utf8"); //**设置字符集***
	session_start();
	if(empty($_SESSION['login']))
	{
		$url="login.html";
		echo "<script language='javascript' type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>";  
		
		exit;
	}
	$No = $_SESSION['user'];
	$sql = "SELECT * FROM `user` WHERE no = '$No'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	/*
	while($row=mysql_fetch_array($result)) //遍历SQL语句执行结果把值赋给数组
	{
		echo "<tr>";
		echo "<td>$row[id]</td>"; //显示ID
		echo "<td>$row[name]</td>"; //显示姓名
		echo "<td>$row[major]</td>"; //显示邮箱
		echo "<td>$row[adress]</td>"; //显示地址
		echo "</tr>";
	}
	*/
	
?>
<head>

<title>教务管理(课设)</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="templatemo_container">
  	<div id="templatemo_header">
    	<div id="site_title">
		<tr>
		   <td align = "center">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<? echo "$row[name]" ?></td>
		   <BR>
		   <td align = "center">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：<? echo "$row[no]" ?></td>
		   <BR>
		</TR>
    	</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_menu">
    	<span></span>
        <ul>
            <li class="current"><a href="index.html">
            <b>首 页</b></a></li>
            <li><a href="msg_page.html"><b>学籍管理</b></a></li>
            <li><a href="test_page.html"><b>考务安排</b></a></li>
            <li><a href="score_page.html"><b>成绩管理</b></a></li>
            <li><a href="notice_page.html"><b>实时通知</b></a></li>
        </ul>

    </div> <!-- end of menu -->
    
    <div id="templatemo_banner">
    	<tr>
		   <td align = "center">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<? echo "$row[name]" ?></td>
		   <BR>
		   <td align = "center">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：<? echo "$row[no]" ?></td>
		   <BR>
		   <td align = "center">专业班级：<? echo "$row[major]" ?></td>
		   <BR>
		   <td align = "center">入学时间：<? echo "$row[indate]" ?></td>
		   <BR>
		   <td align = "center">您的身份：<? echo "$row[iden]" ?></td>
		</tr>
    </div> <!-- end of banner -->
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>