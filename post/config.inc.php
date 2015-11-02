<?
	session_start();
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PW', 'pwd');
	define('DB_NAME', 'GuestBook');
	define('DB_CHARSET', 'utf8');
	define('DB_PCONNECT',0);
	define('DB_DATABASE', 'mysql');
	$con=mysql_connect(DB_HOST,DB_USER,DB_PW);
	mysql_query('set names utf8');
	mysql_select_db(DB_NAME);
?>