<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务管理(课设)</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
 <?
    error_reporting(E_ALL & ~E_DEPRECATED);
	header("Content-type: text/html; charset=utf-8"); 
	require_once('db_config.php');
	session_start();
	if($_SESSION['login'] == "学生")
	{
		$url="test_page.php";
		echo "<script language='javascript' type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
		exit;
	}
	$clname = trim($_POST['clname']);
	$clyear = trim($_POST['clyear']);
	$cltime = trim($_POST['cltime']);
	$clplace = trim($_POST['clplace']);
			
	if (empty($clname) ||empty($clyear)|| empty($cltime) || empty($clplace))
	{
		echo '数据输入不完整';
		exit;
	}
	else
	{
		$sql = "INSERT INTO `course` (name,test_time,year,place) VALUES";
		$sql .= "('$clname', '$cltime', '$clyear', '$clplace');";
		echo $sql;
		
		$result = mysql_query($sql);
		$mark  = mysql_affected_rows();
	}
?>

  <div id="templatemo_container">
  	<div id="templatemo_header">
    	<div id="site_title">
    	</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_reply">
      <?
   	    if ($mark > 0)
		{
	  ?>
	  <table height="200px" width="100%" align="center">
	    <tr>
	      <td align="center" style="color:#900; font-size:28px"><strong>发布考试信息成功！</strong></td>
	    </tr>
	  </table>
      <table width="100%" align="center">
        <tr>
          <td align="center"><a href="test_page_admin.php" style="color:#5e0b8e; font-size:20px;">返回上一页</a></td>
        </tr>
      </table>
      <?
	  }
	  else {
	  ?>
      <table height="200px" width="100%" align="center">
	    <tr>
	      <td align="center" style="color:#900; font-size:28px"><strong>发布失败，请检查输入！</strong></td>
	    </tr>
	  </table>
      <table width="100%" align="center">
        <tr>
          <td align="center"><a href="test_page_admin.php" style="color:#5e0b8e; font-size:20px;">返回上一页</a></td>
        </tr>
      </table>
      <?
	  }
	  mysql_close($db);
	  ?>
    </div> 
    <!-- end of banner -->
    
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> 
    <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>