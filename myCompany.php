<?php
	require ("conn.php");
	$sqldate="";
	$sql = "select * from 公司部门";
	//$sql = "select * from 任务";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		 $sqldate= $sqldate.'{"部门":"'. $row["部门"].'"},';
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