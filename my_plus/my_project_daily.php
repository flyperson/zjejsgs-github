<?php
	require("../conn.php");
	$monthStr = $_POST["monthStr"];
	$gcid = $_POST["gcid"];
	$sqldate = "";
	$sql = "select * from 工程日志信息 where 日志日期 like '".$monthStr."' and 工程id = '".$gcid."'";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"日志名称":"'.$row["日志名称"].'","时间戳":"'.$row["时间戳"].'"},';
		}
	}
	
	$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
		$json = '['.$sqldate.$otherdate.']';
		
	echo $json;
	$conn->close();	
?>