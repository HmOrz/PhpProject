<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务管理(课设)</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<?php
/******************************************************************************

参数说明:
$max_file_size  : 上传文件大小限制, 单位BYTE
$destination_folder : 上传文件路径
******************************************************************************/
//上传文件类型列表
session_start();
$id=$_SESSION['user'];

$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size=2000000;     //上传文件大小限制, 单位BYTE
$destination_folder="UserImg/"; //上传文件路径
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/2;    //缩略图比例
?>
<body>
  <div id="templatemo_container">
  	<div id="templatemo_header">
    	<div id="site_title">
    	</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_reply">
	 <form enctype="multipart/form-data" method="post" name="upform">
	 <table width="100%" align="center">
	 <caption style="margin-top:20px; font-size:28px; color:#900"><strong>相片上传</strong></caption>
       <tr>
         <td width="50%" height="40" align="right" style="font-size:20px">上传文件：</td>
		 <td width="50%" align="left"><input class="BtnSty" name="upfile" type="file"></td>
       </tr>
       <tr>
	     <td width="50%" align="right" style="font-size:20px">点击上传：</td>
         <td width="50%" align="left"><input class="BtnSty" type="submit" value="上传"></td>
      </tr>
    </table>
	<hr width="60%">
	<font style="width:100%; margin-left:30%">允许上传的文件类型为:jpg|jpeg|gif|bmp|png|</font>
<?
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$destination = "";
    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"])
    //检查文件大小
    {
        echo "文件太大，超过限制!";
        exit;
    }

    if(!in_array($file["type"], $uptypes))
    //检查文件类型
    {
        echo "文件类型不符!".$file["type"];
        exit;
    }

    if(!file_exists($destination_folder))
    {
        mkdir($destination_folder);
    }

    $filename=$file["tmp_name"];
    $image_size = getimagesize($filename);
    $pinfo=pathinfo($file["name"]);
    $ftype=$pinfo['extension'];
    $destination = $destination_folder.$id.".".$ftype;
    if(!move_uploaded_file ($filename, $destination))
    {
        echo "移动文件出错";
        exit;
    }
    $pinfo=pathinfo($destination);
?>
    <table height="80px" width="100%" align="center">
      <tr>
        <td align="center" style="color:#900; font-size:28px; "><strong>照片已经更新成功！</strong></td>
      </tr>
	</table>
    <table width="100%" align="center">
      <tr>
        <td align="center"><a href="info_page_alter.php" style="color:#5e0b8e; font-size:20px;">返回上一页</a></td>
      </tr>
    </table>
<?    
}
?>
    </div> 
    <!-- end of banner -->
    
    
 
    
    <div id="templatemo_footer">此网页仅用于课程设计！ | Designed by <strong>Hm Team</strong></div> 
    <!-- end of footer -->
</div><!-- end of container -->
</body>
</html>