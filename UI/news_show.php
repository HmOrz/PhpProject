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
  $id=$_GET['id'];

  $sql = "SELECT * FROM `news` WHERE id = $id";
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
            <li><a href="index.php"><b>首 页</b></a></li>
            <li><a href="info_page.html"><b>学籍管理</b></a></li>
            <li><a href="test_page.html"><b>考务安排</b></a></li>
            <li><a href="score_page.html"><b>成绩管理</b></a></li>
            <li class="current"><a href="news_page.html"><b>实时通知</b></a></li>
        </ul>

    </div> <!-- end of menu -->
    
    <div id="templatemo_base">
	  <form name="News_admin" method="post" action="newspage_admin.php" onSubmit="return Check();">
	  <table width="100%" border="0" height="40px" align="center" style="font-size:28px; color:#936">
	    <tr>
		  <td width="100%" align="center"><strong><? echo "$row[title]" ?></strong></td>
		</tr>
	  </table>
    </div> <!-- end of banner -->
	
	<table width="100%" align="center">
	 <tr>
	   <td width="100%" align="center">发布人：<? echo "$row[author]" ?></td>	  
	 </tr>
	 <tr>
	   <td width="100%" align="center">发布时间：<? echo "$row[time]" ?></td>	  
	 </tr>
	</table>
	<hr width="95%">
	<table width="100%" align="left" style="font-size:22px">
	  <tr>
		<td width="2%"></td>
	    <td width="96%"><? echo "$row[content]" ?></td>
		<td width="2%"></td>
	  </tr>
	  <tr>
	    <td colspan="3" align="center"> 
	      <a href="news_page.php"><input type="button" class="BtnSty" name="back" value="返回"></a>
		</td>
	  </tr>
	  <tr></tr>
	</table>
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>