<?php
	require ("../conn.php");
	$sqldate="";
	$sql = "select * from 我的工程";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		 $sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","地区":"'. $row["工程位置"].'","项目类别":"'. $row["项目类别"].'","工程状态":"'. $row["工程状态"].'"},';
		}
	} else { 
	} 
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$class.'"
				}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>