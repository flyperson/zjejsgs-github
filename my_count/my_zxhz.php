<?php
	require("../conn.php");
	$wzdl = $_POST["wzdl"];
	$star = $_POST["star"];
	$end = $_POST["end"];
	$sqldate = "";
	$sql = "select * from 通知单 where 违章大类 like '%".$wzdl."%' and 草稿新建日期 between '".$star."' and '".$end."' ";
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"违章大类":"'. $row["违章大类"].'"},';
		}
	} else {
	
	}
	$sql1 = "select * from 通知单  where 草稿新建日期 between '".$star."' and '".$end."' ";
	$result1 = $conn->query($sql1); 
	$count=mysqli_num_rows($result1);
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
						}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>