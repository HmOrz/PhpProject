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
  $pagesize = 10;
  if(isset($_GET['page'])&&$_GET['page']!='') 
  {
	  $page=$_GET['page'];
  }
  else 
  {
	$page=0;
  }
  $sql = "SELECT * FROM `news` ORDER BY id DESC";
  $numRecord = mysql_num_rows(mysql_query($sql)); 				//获得结果集中的记录数
  $totalpage = ceil($numRecord/$pagesize); 						//获得总页数
  $recordSql = $sql. " LIMIT ".$page*$pagesize.",".$pagesize; 	//拼接翻页SQL语句
  $result = mysql_query($recordSql);
  
  
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
            <li><a href="info_page.php"><b>学籍管理</b></a></li>
            <li><a href="test_page.php"><b>考务安排</b></a></li>
            <li><a href="score_page.php"><b>成绩管理</b></a></li>
            <li class="current"><a href="news_page.php"><b>实时通知</b></a></li>
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
	
	<hr width="95%">
	<!--留言内容展示 -->
	<?  //循环嵌套开始
	while($rs=mysql_fetch_object($result)){
	?>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="10%" align="right">[<? echo $rs->type?>]</td>
		    <td width="30%" align="left"><a href="news_show.php?id=<? echo $rs->id ?>"><? echo $rs->title ?></a></td>
		  	<td width="20%" align="right">[<? echo $rs->author?>&nbsp;&nbsp;&nbsp;</td>
			<td width="20%" align="left"><? echo $rs->time ?>]</td>
		  </tr>
	    </table>
		<hr width="95%" size=1px>
	<?  //循环嵌套收尾
	}
	?>
	<table width="100%" border="0" align="center">
	  <td width="40%" align=right> 
	    <a href='newspage_admin.php?page=<? if ($page<$totalpage-1) echo $page+1;?>'>下一页&nbsp;&nbsp;</a>
	  </td> 
	  <td width="40%" align=left> 
	    <a href='newspage_admin.php?page=<? if ($page>0) echo $page-1;?>'>&nbsp;&nbsp;上一页</a> 
	  </td>
	</table>
 
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>