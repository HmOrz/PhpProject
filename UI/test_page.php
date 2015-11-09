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
  if($_SESSION['login'] != '学生')
  {
	  $url="test_page_admin.php";
	  echo "<script language='javascript' type='text/javascript'>";  
	  echo "window.location.href='$url'";  
	  echo "</script>";
	  exit;
  }
  $name = $_SESSION['name'];
  $y = $_SESSION['year'];
  $yy = intval($y);
  $c1 = $y."-".strval($yy+1);
  $c2 = strval($yy+1)."-".strval($yy+2);
  $c3 = strval($yy+2)."-".strval($yy+3);
  $c4 = strval($yy+3)."-".strval($yy+4);
  if(isset($_GET['year'])&&$_GET['year']!='') 
  {
	  $year=$_GET['year'];
	  $sql = "SELECT * FROM `course` WHERE year = '".$year."'";
      $result = mysql_query($sql);
  }

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
    <form name="testUrl" method="post" action="jumpUrl.php"">
      <table width="100%" border="0" height="40px" align="center">
        <tr>
          <td width="12%" align="right" style="color:#000"><strong>选择学年：</strong></td>
          <td width="20%" align="left"><select name="year" class="BtnSty" style="width:200px">
              <option value="<? echo $c1 ?>" selected="selected"><? echo $c1 ?></option>
              <option value="<? echo $c2 ?>"><? echo $c2 ?></option>
              <option value="<? echo $c3 ?>"><? echo $c3 ?></option>
              <option value="<? echo $c4 ?>"><? echo $c4 ?></option>
          </select></td>
          <td width="68%" align="left">
            <button type="submit" name="BtnSearch" 
                style="width:20px; height:20px; border:none; background-image:url('images/search.jpg')">
            </button></td>
        </tr>
      </table>
    </div> <!-- end of banner -->
    <table width="96%" align="center" border="1" style="border:thin">
      <tr style="background-color:#033; font-size:18px">
        <td width="10%">课程编号</td>
        <td width="25%">课程名称</td>
        <td width="15%">姓名</td>
        <td width="26%">考试时间</td>
        <td width="20%">考试地点</td>
      </tr>
      <?  //循环嵌套开始
	    if(isset($_GET['year'])&&$_GET['year']!='') 
        {
   	        while($rs=mysql_fetch_object($result)){
 	  ?>
      <tr style="background-color:#333; font-size:16px">
        <td width="10%"><? echo $rs->id ?></td>
        <td width="25%"><? echo $rs->name ?></td>
        <td width="15%"><? echo "$name" ?></td>
        <td width="26%"><? echo $rs->test_time ?></td>
        <td width="20%"><? echo $rs->place ?></td>
      </tr>
      <?
		}
	  }
	  ?>
    </table>
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>