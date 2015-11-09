 <?
    error_reporting(E_ALL & ~E_DEPRECATED);
	header("Content-type: text/html; charset=utf-8"); 
	require_once('db_config.php');
	$no = trim($_POST['id']);
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$sex = $_POST['sex'];
	$nation = trim($_POST['nation']);
	$born = trim($_POST['born']);
	$indate = trim($_POST['in_date']);
	$party = trim($_POST['party']);
	$major = trim($_POST['major']);
	$iden = $_POST['iden'];
	$phone = trim($_POST['phonenum']);
	$address = $_POST['address'];
			
	if (empty($no) || empty($born) || empty($password) || $cpassword != $password || empty($indate)
		 || empty($indate) || empty($major) || empty($phone) || empty($address) || empty($name))
	{
		echo '数据输入不完整';
		exit;
	}
	else
	{
		if (strlen($password) < 6 || strlen($password) > 30)
		{
			echo '密码必须在6到30个字符之间';
			exit;
		}
		$pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		if(!preg_match($pattern, $email))
		{
			echo 'Email格式不合法！';
			exit;
		}
		
		//$db = mysql_connect('localhost','root','198251') or die('Could not connect: '.mysql_error());
		//mysql_select_db('register') or die('Could not select database');
		$sql = "SELECT * FROM `user` WHERE `no` = '".$no."'";
		//echo $sql;
		$result = mysql_query($sql);
		if ($result && mysql_num_rows($result) > 0)
		{
			$url="register_rep_fail.html";
			echo "<script language='javascript' type='text/javascript'>";  
			echo "window.location.href='$url'";  
			echo "</script>";  
		}
		else
		{
			$sql = "INSERT INTO `user` (no,name,pwd,sex,nation,born,indate,party,phone,major,iden,adress,email) VALUES";
			$sql .= "('$no', '$name', '$password', '$sex', '$nation', '$born', '$indate', '$party', '$phone', '$major', '$iden', '$address', '$email')";
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
		}
		mysql_close($db);
	}
?>