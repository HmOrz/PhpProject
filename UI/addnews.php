<?
    error_reporting(E_ALL & ~E_DEPRECATED);
	header("Content-type: text/html; charset=utf-8"); 
	require_once('db_config.php');
	session_start();
	if($_SESSION['login'] == "ѧ��")
	{
		$url="news_page.php";
		echo "<script language='javascript' type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
		exit;
	}
	$title = $_POST['newsTitle'];
	$type = $_POST['newsType'];
	$content = $_POST['newsContent'];
	$author = $_SESSION['name'];
	if (empty($title) || empty($content))
	{
		echo '���������Ƿ�����';
		exit;
	}
	$sql = "INSERT INTO `news` (title,type,author,content,time) VALUES";
	$sql .= "('$title', '$type', '$author', '$content', NOW());";
	echo $sql;
	$result = mysql_query($sql);
	if(!$result)
	{
		mysql_free_result($result);
		mysql_close($db);
		echo '����ʧ�ܣ�';
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