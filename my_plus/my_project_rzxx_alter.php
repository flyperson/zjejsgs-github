<?php
	require("../conn.php");
	$mytime = $_POST["mytime"];
	$rzlx = $_POST["rzlx"];
	$rzmc = $_POST["rzmc"];
	$bw = $_POST["bw"];
	$rznrsm = $_POST["rznrsm"];
	$jsr = $_POST["jsr"];
	$jzrq = $_POST["jzrq"];
	$sjc = $_POST["sjc"];
	
	$sql = "select * from 工程日志信息 where 时间戳 = '".$sjc."' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {			
		$sqli = "update 工程日志信息 set 日志名称='$rzmc',部位='$bw',日志类型='$rzlx',日志内容说明='$rznrsm',接收人='$jsr',截止日期='$jzrq' where 时间戳 = '".$sjc."' ";
		if ($conn->query($sqli) === TRUE) {
			$jsonresult='success';
		} else {
			$jsonresult='error';
		}
	} else {
		$jsonresult='1';			
	}
	
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
	
?>