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
  $sql = "DELETE FROM `news` WHERE id = $id";
  $result = mysql_query($sql);
  $mark  = mysql_affected_rows();
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
    
	<div id="templatemo_banner"> 
	  <? 
	    if($mark > 0)
	    {
			echo "<font>删除成功！</font>";
		}
		else echo "<font>删除失败！</font>";
	  ?>
    </div> <!-- end of banner -->
	
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>