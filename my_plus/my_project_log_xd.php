<?php
	require("../conn.php");
	//$gcmc = $_POST["gcmc"];
	$rzid = $_POST["rzid"];
	$gcid = $_POST["gcid"];
	$gcmc = $_POST["gcmc"];
	$sqldate="";
	$sql = "select * from 工程日志信息  where id='".$rzid."' ";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$logName = $row["日志名称"];
			$sjc = $row["时间戳"];
			$bw  = $row["部位"];
			$sm  = $row["日志内容说明"];
			$type= $row["日志类型"];
			$sqli = "update 工程日志信息 set 下达状态='已下达' where id='".$rzid."'";
			$sqlLog = "insert into 任务(任务名称,时间戳,任务部位,任务描述,任务类别,项目id,项目名称) values ('$logName','$sjc','$bw','$sm','$type','$gcid','$gcmc') ";
			if ($conn -> query($sqlLog)) {
				$jsonresult = "success";
			} else {
				$jsonresult = "error";
			}
			if ($conn -> query($sqli)) {
				$jsonresult = "success";
			} else {
				$jsonresult = "error";
			}
//			$sqldate = $sqldate.'{"id":"'.$row["id"].'","日志名称":"'.$row["日志名称"].'","时间戳":"'.$row["时间戳"].'","部位":"'.$row["部位"].'","日志内容说明":"'.$row["日志内容说明"].'","接收人":"'.$row["接收人"].'","截止日期":"'.$row["截止日期"].'","任务附件":"'.$row["任务附件"].'","日志类型":"'.$row["日志类型"].'"},';
		}
	}
	
//	$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
		$json = '['.$sqldate.$otherdate.']';
		
	echo $json;
	$conn->close();	
?>