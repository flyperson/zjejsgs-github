<?php
$my_flag = $_POST['my_flag'];

if($my_flag == 'sign'){
	require ("../conn.php");
	$gcid = $_POST["gcid"];
	$star_time = $_POST["star_time"];
	$end_time = $_POST["end_time"];
	
	$sqldate = "";
	$sql = "select * from 人员签到 where 工程id = '" . $gcid . "' and `记录插入时间` BETWEEN '".$star_time." 00:00:00' AND '".$end_time." 00:00:00'";
	$result = $conn -> query($sql);
	$count = mysqli_num_rows($result);
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			$sqldate = $sqldate . '{"id":"' . $row["id"] . '","姓名":"' . $row["人员"] . '","签到时间":"' . $row["签到时间"] . '","签到状态":"' . $row["签到状态"] . '"},';
		}
	}
	
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$count.'"
						}';
	
	$json = '[' . $sqldate . $otherdate . ']';
	echo $json;
	$conn -> close();
}else if($my_flag == "checksign"){
	require ("../conn.php");
	$name = $_POST["name"];
	$star_time = $_POST["star_time"];
	$end_time = $_POST["end_time"];
	
	$sqldate = "";
	//$sql = "select * from 人员签到 where 工程id = '" . $gcid . "' and `记录插入时间` BETWEEN '".$star_time." 00:00:00' AND '".$end_time." 00:00:00'";
	$sql = "select * from 人员签到 where  人员 = '".$name."' and  `记录插入时间` BETWEEN '".$star_time." 00:00:00' AND '".$end_time." 00:00:00'";
	$result = $conn -> query($sql);
	$count = mysqli_num_rows($result);
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			$sqldate = $sqldate . '{"id":"' . $row["id"] . '","姓名":"' . $row["人员"] . '","签到时间":"' . $row["签到时间"] . '","签到状态":"' . $row["签到状态"] . '","工程名称":"' . $row["工程名称"] . '"},';
		}
	}
	
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$count.'"
						}';
	
	$json = '[' . $sqldate . $otherdate . ']';
	echo $json;
	$conn -> close();
}
?>