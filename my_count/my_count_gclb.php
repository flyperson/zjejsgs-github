<?php
	require("../conn.php");		
//	$gcid=$_POST["gcid"];//工程id
	$xzlb=$_POST["xzlb"];//选择类别
	if($xzlb=="实测实量"){
		$sqldate="";
		$sql = "select DISTINCT 检查项目 FROM  建筑工程质量检测表";  
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"工程类别":"'. $row["检查项目"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}else if($xzlb=="观感评价"){
		$sqldate="";
		$sql = "select DISTINCT 工程类别 FROM  观感评价测点类型表";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"工程类别":"'. $row["工程类别"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}else{}
	echo $json;
	$conn->close();
	

?>