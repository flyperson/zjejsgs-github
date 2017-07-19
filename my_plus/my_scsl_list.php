<?php
	require ("../conn.php");
	
	$gcmc=$_POST["gcmc"];
	$gcid=$_POST["gcid"];
	$xmlb=$_POST["xmlb"];
	
	
	
	
	$sqldate="";
	$sql = "select * from 建筑工程   where 建筑工程id='".$gcid. "' and 项目类别='".$xmlb. "'";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		 $sqldate= $sqldate.'{"名称":"'. $row["标题名称"].'","时间戳":"'. $row["时间戳"].'","检查部位":"'. $row["检查部位"].'","检查日期":"'. $row["检查日期"].'","检查人员":"'.$row["检查人员"].'"},';
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