<?php
	require ("../conn.php");
	$mytime = $_POST["mytime"];
	$rzlx = $_POST["rzlx"];
	$rzmc = $_POST["rzmc"];
	$bw = $_POST["bw"];
	$rznrsm = $_POST["rznrsm"];
	$jsr = $_POST["jsr"];
	$jzrq = $_POST["jzrq"];
	$sjc = $_POST["sjc"];
	$txr = $_POST["txr"];
	$gw = $_POST["gw"];
	$gcid = $_POST["gcid"];
//	$fjxx = $_POST["fjxx"];
	
	$sqli = "";
	$sql = "select * from 工程日志信息  where 时间戳='".$sjc."'";
	$result = $conn -> query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){
		$jsonresult = "1";
	}else{
		$sqli = "insert into 工程日志信息(时间戳,日志名称,日志日期,部位,日志类型,日志内容说明,接收人,截止日期,填写人,岗位,工程id) values ('$sjc','$rzmc','$mytime','$bw','$rzlx','$rznrsm','$jsr','$jzrq','$txr','$gw','$gcid') ";
		if ($conn -> query($sqli)) {
			$jsonresult = "success";
		} else {
			$jsonresult = "error";
		}
	}
		
	
	
	$json = '{
	"result":"'.$jsonresult.'",
		"$mytime":"'.$mytime.'",
		"$rzlx":"'.$rzlx.'",
		"$rzmc":"'.$rzmc.'",
		"$bw":"'.$bw.'",
		"$rznrsm":"'.$rznrsm.'",
		"$jsr":"'.$jsr.'",
		"$jzrq":"'.$jzrq.'",
		"$sjc":"'.$sjc.'"
	}';
	echo $json;
	
	$conn->close();
?>