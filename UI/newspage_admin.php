<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务管理(课设)</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<?
  session_start();
  $iden = $_SESSION['login'];
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
	  <table width="100%" border="0" height="40px" align="center">
	    <tr>
		  <td width="10%" align="right"><a href="addnews_page.html">发布通知</a></td>
		  <td width="60%" align="right"><label><input name="search" type="text" id="search"/></label>
		  <td width="5%" align="left"><button type="submit" name="BtnSearch" style="width:20px; height:20px; border:none; background-image:url('images/search.jpg')"></td>
		</tr>
	  </table>

    </div> <!-- end of banner -->
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>