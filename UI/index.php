<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?
	$db = mysql_connect('localhost','root','');
	mysql_select_db('clprj');
	session_start();
	if(empty($_SESSION['login']))
	{
		echo "您还没有登录，不能访问当前页面！";
		exit;
	}
	$No = $_SESSION['user'];
	$sql = "SELECT * FROM `user` WHERE no = '$No'";
	$result = mysql_query($sql);
	
	while($row=mysql_fetch_array($result)) //遍历SQL语句执行结果把值赋给数组
	{
		echo "<tr>";
		echo "<td>$row[id]</td>"; //显示ID
		echo "<td>$row[name]</td>"; //显示姓名
		echo "<td>$row[major]</td>"; //显示邮箱
		echo "<td>$row[adress]</td>"; //显示地址
		echo "</tr>";
	}
	
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务管理(课设)</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="templatemo_container">
  	<div id="templatemo_header">
    	<div id="site_title">
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
    	
    </div> <!-- end of banner -->
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>