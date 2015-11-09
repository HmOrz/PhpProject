<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
    error_reporting(E_ALL & ~E_DEPRECATED);
    header('Content-type: text/html;charset=UTF-8');
	require_once('db_config.php');
	session_start();
	$No = $_SESSION['user'];
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
    	</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_menu">
    	<span></span>
        <ul>
            <li class="current"><a href="index.php">
            <b>首 页</b></a></li>
            <li><a href="info_page.php"><b>学籍管理</b></a></li>
            <li><a href="test_page.php"><b>考务安排</b></a></li>
            <li><a href="score_page.php"><b>成绩管理</b></a></li>
            <li><a href="news_page.php"><b>实时通知</b></a></li>
        </ul>

    </div> <!-- end of menu -->
    
    <div id="templatemo_banner"> 
      <table width="98%" height="100%" border="0" style="font-size:20px; color:#006">
        <tr>
		  <td width="30%" align = "right"><b>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</b></td>
          <td width="30%" align = "left"><b><? echo "$row[name]" ?></b></td>
          <td width="40%" ><b>您的照片：</b></td>
		</tr>
        <tr>
		  <td align = "right"><b>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</b></td>
          <td align= "left"><b><? echo "$row[no]" ?></b></td>
          <td rowspan="4" align="left"><img border="2" width="120px" height="160px" style="margin-top:0; border:double" src="UserImg/<? echo $No;?>.jpg"></td></td>
        </tr>
        <tr>
		  <td align = "right"><b>专业班级：</b></td>
          <td align= "left"><b><? echo "$row[major]" ?></b></td>
		</tr>
        <tr>
		  <td align = "right"><b>入学时间：</b></td>
          <td align= "left"><b><? echo "$row[indate]" ?></b></td>
        </tr>
        <tr>
		  <td align = "right"><b>您的身份：</b></td>
          <td align= "left"><b><? echo "$row[iden]" ?></b></td>
		</tr>
      </table>
  </div> <!-- end of banner -->
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>