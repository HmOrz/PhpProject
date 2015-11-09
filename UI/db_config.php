<?
  $hostname_db = "localhost";
  $datebase_db = "clprj";
  $username_db = "root";
  $password_db = "";
  $db = mysql_connect($hostname_db,$username_db,$password_db);
  mysql_select_db($datebase_db);
  //设置数据的字符集utf-8 
  mysql_query("set names 'utf8' ");
  mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_results=utf8");
?>