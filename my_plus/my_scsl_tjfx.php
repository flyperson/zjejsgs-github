<?php
	require ("../conn.php");
	$sjc=$_POST["sjc"];
	$xmid=$_POST["xmid"];
	$gclb=$_POST["gclb"];
	
	$sqldate="";
	$sql = "SELECT DISTINCT 测点类别 FROM 实测实量新建测点 WHERE 时间戳 = '".$sjc."'";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		 $sqldate= $sqldate.'{"测点类别":"'. $row["测点类别"].'"},';
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