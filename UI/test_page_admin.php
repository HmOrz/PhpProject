<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务管理(课设)</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<?
  error_reporting(E_ALL & ~E_DEPRECATED);
  require ('db_config.php'); 
  session_start();
  $name = $_SESSION['name'];
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
            <li><a href="index.php"><b>首 页</b></a></li>
            <li><a href="info_page.php"><b>学籍管理</b></a></li>
            <li class="current"><a href="test_page.php"><b>考务安排</b></a></li>
            <li><a href="score_page.php"><b>成绩管理</b></a></li>
            <li><a href="news_page.php"><b>实时通知</b></a></li>
        </ul>

    </div> <!-- end of menu -->

    <div id="templatemo_base">
      <table width="100%" border="0" height="40px" align="center">
        <tr>
          <td align="center" style="color:#006; font-size:20px"><strong>发布考试安排</strong></td>
        </tr>
      </table>
    
    </div> <!-- end of banner -->
    <form name="AddTest" method="post" action="addtest.php">
      <table width="100%" align="center" style="margin-top:15px">
        <tr>
          <td width="45%" align="right">课程名称：</td>
          <td width="55%" align="left"><input type="text" name="clname" id="clname" /></td>
        </tr>
        <tr>
          <td width="45%" align="right">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年：</td>
          <td width="55%" align="left"><input type="text" name="clyear" id="clyear" /></td>
        </tr>
        <tr>
          <td align="right">考试时间：</td>
          <td><input type="text" name="cltime" id="cltime" /></td>
        </tr>
        <tr>
          <td align="right">考试地点：</td>
          <td><input type="text" name="clplace" id="clplace" /></td>
        </tr>
        <tr>
          <td height="60" colspan="2" align="center">
            <input type="submit" class="BtnSty" value="发布">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" class="BtnSty" value="重置">
          </td>
	     </tr>
      </table>
  
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>