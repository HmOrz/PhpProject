<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务管理(课设)</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<?
    error_reporting(E_ALL & ~E_DEPRECATED);
    header('Content-type: text/html;charset=UTF-8');
	require_once('db_config.php');
	session_start();
	$No = $_SESSION['user'];
	$sql = "SELECT * FROM `user` WHERE no = '$No'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
?>
<body>
<div id="templatemo_container">
  	<div id="templatemo_header">
    	<div id="site_title">
    	</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_menu">
    	<span></span>
        <ul>
            <li><a href="index.php">
            <b>首 页</b></a></li>
            <li class="current"><a href="info_page.php"><b>学籍管理</b></a></li>
            <li><a href="test_page.php"><b>考务安排</b></a></li>
            <li><a href="score_page.php"><b>成绩管理</b></a></li>
            <li><a href="news_page.php"><b>实时通知</b></a></li>
        </ul>

    </div> <!-- end of menu -->
    
    <div id="templatemo_base">
      <table width="100%" border="0" height="40px" align="center" style="margin-left:50px">
	    <tr>
		  <td width="10%" align="left"><a href="info_page_alter.php">修改资料</a></td>
        </tr>
      </table>
    </div> <!-- end of banner -->
    
    <table width="100%" cellpadding="6" style="font-size:18px;">
        <tr>
          <td width="50%" align = "right">照&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;片：</td>
          <td width="50%" align="left"><img width="90px" height="120px" style="margin-top:0; border:double" src="UserImg/<? echo $No; ?>.jpg"</td></td>
        </tr>
        <tr>
		  <td width="50%" align = "right">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
          <td width="50%" align = "left"><? echo"$row[name]"?></td>
		</tr>
        <tr>
		  <td align = "right">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</td>
          <td align= "left"><? echo "$row[no]" ?></td>
        </tr>
        <tr>
		  <td align = "right">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
          <td align= "left"><? echo "$row[sex]" ?></td>
          <td rowspan="4"></td>
        </tr>
        <tr>
		  <td align = "right">民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族：</td>
          <td align= "left"><? echo "$row[nation]" ?></td>
          <td rowspan="4"></td>
        </tr>
        <tr>
		  <td align = "right">出生日期：</td>
          <td align= "left"><? echo "$row[born]" ?></td>
          <td rowspan="4"></td>
        </tr>
        <tr>
		  <td align = "right">专业班级：</b></td>
          <td align= "left"><? echo "$row[major]" ?></td>
		</tr>
        <tr>
		  <td align = "right">入学时间：</b></td>
          <td align= "left"><? echo "$row[indate]" ?></td>
        </tr>
        <tr>
		  <td align = "right">政治面貌：</b></td>
          <td align= "left"><? echo "$row[party]" ?></td>
        </tr>
        <tr>
		  <td align = "right">联系号码：</td>
          <td align= "left"><? echo "$row[phone]" ?></td>
        </tr>
        <tr>
		  <td align = "right"> Email：</td>
          <td align= "left"><? echo "$row[email]" ?></td>
        </tr>
        <tr>
		  <td align = "right">联系地址：</b></td>
          <td align= "left"><? echo "$row[adress]" ?></td>
        </tr>
      </table>
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>