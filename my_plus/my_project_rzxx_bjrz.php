<?php
	require("../conn.php");
	$sjc = $_POST["sjc"];
	$sqldate = "";
	$sql = "select * from 工程日志信息  where 时间戳='".$sjc."'";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"日志名称":"'.$row["日志名称"].'","日志类型":"'.$row["日志类型"].'","部位":"'.$row["部位"].'","填写人":"'.$row["填写人"].'","岗位":"'.$row["岗位"].'","日志内容说明":"'.$row["日志内容说明"].'","接收人":"'.$row["接收人"].'","截止日期":"'.$row["截止日期"].'"},';
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