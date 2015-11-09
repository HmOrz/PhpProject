<?
    error_reporting(E_ALL & ~E_DEPRECATED);
	header("Content-type: text/html; charset=utf-8"); 
	$id = ($_POST['id']);
	$name = ($_POST['name']);
	$year = ($_POST['year']);
	$url = "score_page_research.php?research=".$id."=".$year."=".$name;
    echo "<script language='javascript' type='text/javascript'>";  
	echo "window.location.href='$url'";  
	echo "</script>";  
?>