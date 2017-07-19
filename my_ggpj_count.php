<?php
	require("conn.php");
	$sjc=$_POST["sjc"];
	$gclb=$_POST["gclb"];
	
	$sqldate="";
	$sql = "select * from 观感评价新建测点  where 时间戳 = '".$sjc."' and 项目类别 = '".$gclb."' and pageX1>'0%' ";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"测点编号":"'.$row["测点编号"].'","测点类型":"'.$row["测点类型"].'","观感评价":"'.$row["观感评价"].'"},';
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