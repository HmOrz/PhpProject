<?
	require('config.inc.php');
	$pagesize=5;
	if(isset($_GET['page']) && $_GET['page']!='')
	{
		$page=$_GET['page'];
	}
	else
	{
		$page=0;
	}
	$sql="SELECT c1 .*, c2.reply_time, c2.reply FROM info c1 LEFT JOIN 
	      reply c2 ON (c1.id = c2.info_id) ORDER BY c1.id DESC";
	$numRecord=mysql_num_rows(mysql_query($sql));
	$totalpage=ceil($numRecord/$pagesize);
	$recordSql=$sql. "LIMIT ". $page*$pagesize.",".$pagesize;
	$result=mysql_query($recordSql);
	/*
	while($rs=mysql_fetch_object($result))
	{
		//echo n12br(htmlspecialchars($rs->content));
	}
	mysql_free_result($result);
	*/
?>

    <html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>¡Ù—‘∞Â</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<div id="content">
	<div id="main">
	<ul>
	  <li id="main_top"></li>
	  <li id="main_middle" style="padding:0px 0px 15px 0px;">
	  <div class="title_cr">¡Ù—‘∞Â</div>
	  <?
	    while($rs=mysql_fetch_object($result))
		{
	  ?>
	  <table width="872" border="0" align="center" cellpadding="0" cellspacing="0" class="tab_bbs">
	  <tr>
	    <td colspan="2" class="title_bbs">
		<table width="100%" border="0" cellspacing="0"
	  