<?php
	require("../conn.php");
	
	$xmid=$_POST["xmid"];
	$xmmc=$_POST["xmmc"];
	$rwmc=$_POST["rwmc"];
  	$sjc=$_POST["sjc"];
	$rwlb=$_POST["rwlb"];
	$rwms=$_POST["rwms"];
	$rwcjr=$_POST["rwcjr"];	
	$rwjsr=$_POST["rwjsr"];
//	$rwjsrhm=$_POST["rwjsrhm"];	
	$jzrq=$_POST["jzrq"];
	$rwbw=$_POST["rwbw"];
	$unit=$_POST["unit"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($xmid){
		$sql = "select * from 任务 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='1';
		} else {
			$sqli = "insert into 任务 (项目id,项目名称,任务名称,施工单位,时间戳,任务类别,任务描述, 任务创建人,任务接收人,截止日期,新建日期,回复状态,任务部位) values ('$xmid','$xmmc','$rwmc','$unit','$sjc','$rwlb','$rwms','$rwcjr','$rwjsr','$jzrq','$timestr','未回复','$rwbw')";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
		echo $json;
		$conn->close();
	
	}
?>