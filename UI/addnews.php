<?
    error_reporting(E_ALL & ~E_DEPRECATED);
	header("Content-type: text/html; charset=utf-8"); 
	require_once('db_config.php');
	$title = $_POST['newsTitle'];
	$type = $_POST['newsType'];
	$content = $_POST['newsContent'];
	session_start();
	$author = $_SESSION['name'];
	if (empty($title) || empty($content))
	{
		echo '请检查输入是否完整';
		exit;
	}
	$db = mysql_connect($hostname_db,$username_db,$password_db);
	mysql_select_db($datebase_db);
	//设置数据的字符集utf-8 
	mysql_query("set names 'utf8' ");
	mysql_query("set character_set_client=utf8");
	mysql_query("set character_set_results=utf8");
	$sql = "INSERT INTO `news` (title,type,author,content,time) VALUES";
	$sql .= "('$title', '$type', '$author', '$content', NOW());";
	echo $sql;
	$result = mysql_query($sql);
	if(!$result)
	{
		mysql_free_result($result);
		mysql_close($db);
		echo '数据记录插入失败！';
		exit;
	}
	else
	{
		$url="register_rep_succ.html";
		echo "<script language='javascript' type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>";  
	}
	mysql_close($db);
?>