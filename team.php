<?php
	require ("conn.php");
	$sqldate="";
	$sql = "select * from 我的工程";
	//$sql = "select * from 任务";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		 //$sqldate= $sqldate.'{"id":"'. $row["id"].'","项目id":"'. $row["项目id"].'","项目名称":"'. $row["项目名称"].'","施工单位":"'. $row["施工单位"].'"},';
		 $sqldate= $sqldate.'{"项目id":"'. $row["id"].'","项目名称":"'. $row["工程名称"].'","地区":"'. $row["地区"].'"},';
		}
	} else { 
	} 
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$class.'"
				}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
?>