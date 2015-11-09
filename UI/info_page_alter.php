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
      <table width="100%" border="0" height="40px" align="center">
        <tr>
          <td align="center" style="color:#006; font-size:20px"><strong>个人信息修改</strong></td>
        </tr>
      </table>
    </div> <!-- end of banner -->
    <form name="info_page_alter" method="post" action="infoalter.php">
    <table width="100%" cellpadding="6" style="font-size:18px;">
        <tr>
          <td width="50%" align = "right">照&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;片：</td>
          <td width="50%" align="left"><img width="90px" height="120px" style="margin-top:0; border:double" src="UserImg/<? echo $No; ?>.jpg"/><a href="imgupload.php">
            <input style="margin-top:102px" type="button" class="BtnSty" name="back2" value="更改图片" />
          </a></td>
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
          <td align= "left"><input name="nation" type="text" style="font-size:15px" id="nation" value="<? echo "$row[nation]" ?>" ></td>
          <td rowspan="4"></td>
        </tr>
        <tr>
		  <td align = "right">出生日期：</td>
          <td align= "left"><input name="born" type="text" style="font-size:15px" id="born" value="<? echo "$row[born]" ?>" ></td>
          <td rowspan="4"></td>
        </tr>
        <tr>
		  <td align = "right">专业班级：</b></td>
          <td align= "left"><input name="major" type="text" style="font-size:15px" id="major" value="<? echo "$row[major]" ?>" ></td>
		</tr>
        <tr>
		  <td align = "right">入学时间：</b></td>
          <td align= "left"><input name="indate" type="text" style="font-size:15px" id="indate" value="<? echo "$row[indate]" ?>" ></td>
        </tr>
        <tr>
		  <td align = "right">政治面貌：</b></td>
          <td align= "left"><input name="party" type="text" style="font-size:15px" id="party" value="<? echo "$row[party]" ?>" ></td>
        </tr>
        <tr>
		  <td align = "right">联系号码：</td>
          <td align= "left"><input name="phone" type="text" style="font-size:15px" id="phone" value="<? echo "$row[phone]" ?>" ></td>
        </tr>
        <tr>
		  <td align = "right"> Email：</td>
          <td align= "left"><input name="email" type="text" style="font-size:15px" id="email" value="<? echo "$row[email]" ?>" ></td>
        </tr>
        <tr>
		  <td align = "right">联系地址：</b></td>
          <td align= "left"><input name="address" type="text" style="font-size:15px; width:260px" id="address" value="<? echo "$row[adress]" ?>" ></td>
        </tr>
        <tr>
		<td colspan="2" align="center"> 
            &nbsp;&nbsp;&nbsp;
			<input type="submit" class="BtnSty" name="Submit" value="提  交">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="info_page.php"><input type="button" class="BtnSty" name="back" value="返  回"></a>
      </table>
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>