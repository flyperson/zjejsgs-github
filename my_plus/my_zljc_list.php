<?php
	require ("../conn.php");
	
	$gcmc=$_POST["gcmc"];
	$gcid=$_POST["gcid"];
	
	$sqldate="";
	$sql = "select * from 质量检查   where 工程id='".$gcid."' ";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		 $sqldate= $sqldate.'{"名称":"'. $row["标题名称"].'","id":"'. $row["id"].'","时间戳":"'. $row["时间戳"].'","检查部位":"'. $row["检查部位"].'","检查日期":"'. $row["检查日期"].'","检查人员":"'.$row["检查人员"].'","施工班组":"'.$row["施工班组"].'","组长姓名":"'.$row["组长姓名"].'","施工日期":"'.$row["施工日期"].'","联系电话":"'.$row["联系方式"].'","工作描述":"'.$row["工作描述"].'"},';
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