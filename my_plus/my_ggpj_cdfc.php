<?php
	require("../conn.php");
	$gclb = $_POST["gclb"];
	$sqldate = "";
	$sql = "select * from 观感评价测点类型表  where 工程类别 = '".$gclb."'  ";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){ 
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"测点类型":"'.$row["测点类型"].'","测点类别":"'.$row["测点类别"].'","建筑类别":"'.$row["建筑装饰"].'"},';
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