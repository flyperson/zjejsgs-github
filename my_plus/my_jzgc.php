<?php
	require("../conn.php");
	$gclb = $_POST["gclb"];
	$sqldate = "";
	$sql = "select * from 建筑工程质量检测表 where 检查项目 = '".$gclb."'";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){ 
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"检查内容":"'.$row["检查内容"].'"},';
		}
	}
	 
	$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
		$json = '['.$sqldate.$otherdate.']';
		
	echo $json;
	$conn->close();	
?>