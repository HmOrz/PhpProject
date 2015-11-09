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
  if((isset($_GET['research'])&&$_GET['research']!=''))
  {
	  $research = $_GET['research'];
	  $temp=explode('=',$research,3);
	  $id=$temp[0];
	  $year=$temp[1];
	  $name=$temp[2];
	  $sql="";
	  if(empty($id) && empty($year) && empty($name)) exit;
	  else if(empty($id) && empty($year) && !empty($name))
	  {
		  $sql="SELECT c.id , s.classname,s.stu_id,s.score,s.year,u.name,u.major FROM course AS c, score AS s, user AS u WHERE (s.stu_id = u.no and c.name = s.classname AND s.classname='".$name."')";
	  }
	  else if(empty($id) && !empty($year) && empty($name))
	  {
		  $sql="SELECT c.id , s.classname,s.stu_id,s.score,s.year,u.name,u.major FROM course AS c, score AS s, user AS u WHERE (s.stu_id = u.no and c.name = s.classname AND s.year='".$year."')";
	  }
	  else if(empty($id) && !empty($year) && !empty($name))
	  {
		  $sql="SELECT c.id , s.classname,s.stu_id,s.score,s.year,u.name,u.major FROM course AS c, score AS s, user AS u WHERE (s.stu_id = u.no and c.name = s.classname AND s.classname='".$name."' AND s.year='".$year."')";
	  }
	  else if(!empty($id) && empty($year) && empty($name))
	  {
		  $sql="SELECT c.id , s.classname,s.stu_id,s.score,s.year,u.name,u.major FROM course AS c, score AS s, user AS u WHERE (s.stu_id = u.no and c.name = s.classname AND s.stu_id='".$id."')";
	  }
	  else if(!empty($id) && empty($year) && !empty($name))
	  {
		  $sql="SELECT c.id , s.classname,s.stu_id,s.score,s.year,u.name,u.major FROM course AS c, score AS s, user AS u WHERE (s.stu_id = u.no and c.name = s.classname AND s.classname='".$name."' AND s.stu_id='".$id."')";
	  }
	  else if(!empty($id) && !empty($year) && empty($name))
	  {
		  $sql="SELECT c.id , s.classname,s.stu_id,s.score,s.year,u.name,u.major FROM course AS c, score AS s, user AS u WHERE (s.stu_id = u.no and c.name = s.classname AND s.year='".$year."' AND s.stu_id='".$id."')";
	  }
	  else if(!empty($id) && !empty($year) && !empty($name))
	  {
		  $sql="SELECT c.id , s.classname,s.stu_id,s.score,s.year,u.name,u.major FROM course AS c, score AS s, user AS u WHERE (s.stu_id = u.no and c.name = s.classname AND s.classname='".$name."' AND s.stu_id='".$id."' AND s.year='".$year."')";
	  }
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
            <li><a href="test_page.php"><b>考务安排</b></a></li>
            <li class="current"><a href="score_page.php"><b>成绩管理</b></a></li>
            <li><a href="news_page.php"><b>实时通知</b></a></li>
        </ul>

    </div> <!-- end of menu -->
    
    <div id="templatemo_base">
      <table width="20%" border="0" height="40px" align="center" style="margin-left:50px">
	    <tr>
		  <td align="left"><a href="score_page_research.php">查询成绩</a></td>
          <td align="left"><a href="score_page_add.php">发布成绩</a></td>
        </tr>
      </table>
    </div> <!-- end of banner -->
    <form name="scoreUrl" method="post" action="jumpUrl3.php""> 
    <table width="100%" border="0" align="center" style="margin-top:10px">
    <caption style="font-size:22px; color:#00F"><strong>查询成绩设置</strong></caption>
      <tr>
        <td width="25%" align="right">学号：</td>
        <td width="25%" align="left"><input type="text" name="id" id="id" /></td>
      </tr>
      <tr>
        <td width="25%" align="right">课程名称：</td>
        <td width="25%" align="left"><input type="text" name="name" id="name" /></td>
        <td width="10%" align="right">学年：</td>
        <td width="40%" align="left"><input type="text" name="year" id="year" /></td>
      </tr>
      <tr>
        <td height="40" colspan="4" align="center">
          <input type="submit" class="BtnSty" value="搜索">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" class="BtnSty" value="重置">
        </td>
       </tr>
    </table>
    <hr width="96%" size=1px>
    <?
	  if(!empty($sql))
	  {
	?>
    <table width="98%" align="center" border="1" style="border:thin">
      <tr style="background-color:#033; font-size:18px">
        <td width="10%">课程编号</td>
        <td width="20%">课程名称</td>
        <td width="15%">姓名</td>
        <td width="15%">学号</td>
        <td width="15%">专业班级</td>
        <td width="15%">学年</td>
        <td width="10%">成绩</td>
      </tr>
      <?  //循环嵌套开始
	    while($rs=mysql_fetch_object($result)){
 	  ?>
      <tr style="background-color:#333; font-size:16px">
        <td width="10%"><? echo $rs->id ?></td>
        <td width="20%"><? echo $rs->classname ?></td>
        <td width="15%"><? echo $rs->name ?></td>
        <td width="15%"><? echo $rs->stu_id ?></td>
        <td width="15%"><? echo $rs->major ?></td>
        <td width="15%"><? echo $rs->year ?></td>
        <td width="10%"><? echo $rs->score ?></td>
      </tr>
      <?
	  }
	  ?>
    </table>
    <?
	  }
	?>
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>