<?php

$temp = explode(".", $_FILES["file"]["name"]);
//=============file数组介绍
//文件名称
$fileNmae = $_FILES["file"]["name"];
//文件大小--单位是字节
$fileSize = $_FILES["file"]["size"];
//文件MIME类型
$fileContenttype = $_FILES["file"]["type"];
//存储在服务器的文件的临时副本的名称
$filePosition = $_FILES["file"]["tmp_name"];
//由文件上传导致的错误代码
$fileError = $_FILES["file"]["error"];

//=============输出file数组元素
//echo "数组值：".$temp[0]."**".$temp[1]."</br>";
echo "文件名称（不包含后缀名）：" . $temp[0] . "</br>";
echo "文件名称：" . $fileNmae . "</br>";
echo "文件大小：" . $fileSize . "</br>";
echo "文件类型：" . $fileContenttype . "</br>";
echo "文件临时存储的位置: " . $filePosition . "<br>";
echo "文件返回值代码: " . $fileError . "<br>";

//规避乱码---move_uploaded_file()这个函数不支持UTF-8的编码
$fileAccio = iconv("UTF-8", "GB2312//IGNORE", $fileNmae);
echo "规避汉字乱码：" . $fileAccio . "<br>";

if ($fileError > 0) {
	echo "Error: " . $fileError . "<br>";
} else {
	//=============MIME类型的判断
	switch($fileContenttype) {
		case "application/msword" :
			if (file_exists("upload/" . $fileNmae)) {
				echo $fileNmae . "already exists.";
			} else {
				move_uploaded_file($filePosition, "upload/" . $fileAccio);
				echo "Stored in: " . "upload/" . $fileNmae . "<br>";
			}
			echo "doc" . "<br>";
			break;
		case "application/vnd.openxmlformats-officedocument.wordprocessingml.document" :
			if (file_exists("upload/" . $fileNmae)) {
				echo $fileNmae . "already exists.";
			} else {
				move_uploaded_file($filePosition, "upload/" . $fileAccio);
				echo "Stored in: " . "upload/" . $fileNmae . "<br>";
			}
			echo "docx" . "<br>";
			break;
		case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" :
			if (file_exists("upload/" . $fileNmae)) {
				echo $fileNmae . "already exists.";
			} else {
				move_uploaded_file($filePosition, "upload/" . $fileAccio);
				echo "Stored in: " . "upload/" . $fileNmae . "<br>";
			}
			echo "xlsx" . "<br>";
			break;
		case "application/vnd.ms-excel" :
			if (file_exists("upload/" . $fileNmae)) {
				echo $fileNmae . "already exists.";
			} else {
				move_uploaded_file($filePosition, "upload/" . $fileAccio);
				echo "Stored in: " . "upload/" . $fileNmae . "<br>";
			}
			echo "xls" . "<br>"; 
			break;
		case "application/vnd.ms-powerpoint" :
			if (file_exists("upload/" . $fileNmae)) {
				echo $fileNmae . "already exists.";
			} else {
				move_uploaded_file($filePosition, "upload/" . $fileAccio);
				echo "Stored in: " . "upload/" . $fileNmae . "<br>";
			}
			echo "ppt" . "<br>";
			break;
		case "application/vnd.openxmlformats-officedocument.presentationml.presentation" :
			if (file_exists("upload/" . $fileNmae)) {
				echo $fileNmae . "already exists.";
			} else {
				move_uploaded_file($filePosition, "upload/" . $fileAccio);
				echo "Stored in: " . "upload/" . $fileNmae . "<br>";
			}
			echo "pptx" . "<br>";
			break;
		case "video/mp4" :
			if (file_exists("upload/" . $fileNmae)) {
				echo $fileNmae . "already exists.";
			} else {
				move_uploaded_file($filePosition, "upload/" . $fileAccio);
				echo "Stored in: " . "upload/" . $fileNmae . "<br>";
			}
			echo "MP4" . "<br>";
			break;
		default :
			echo "No number between 1 and 3";
	}
}

require ("fileDatebase.php");

?>