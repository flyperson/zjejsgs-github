<?php
require ("../conn.php");

//时间戳获取
$sjc = $_POST["sjc"];

$time = getdate();
$timestr = $time['year'] . "-" . $time['mon'] . "-" . $time['mday'] . "/" . $time['hours'] . ":" . $time['minutes'] . ":" . $time['seconds'];

if ($sjc) {
	$sql = "select * from 文件附件 where 文件名称='" . $fileNmae . "'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		$jsonresult = '1';
	} else {
		$sqli = "insert into 文件附件 (时间戳,文件名称,文件大小,文件格式) values ('$sjc','$fileNmae','$fileSize','$temp[1]')";

		if ($conn -> query($sqli) === TRUE) {
			$jsonresult = 'success';
			
		} else {
			$jsonresult = 'error';
		}
	}

	$json = '{"result":"' . $jsonresult . '"		
				}';
	echo $json; 
	$conn -> close();

	echo"<script>history.go(-1);</script>";  
}
?>