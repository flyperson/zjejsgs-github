<?php
	require("conn.php");
	$bhao=$_POST["bhao"];
	$sjc=$_POST["sjc"];
	
	$sqldate="";
	$sql = "select * from 观感评价新建测点 where 测点编号='".$bhao."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","测点类别":"'. $row["测点类别"].'","测点编号":"'. $row["测点编号"].'","观感评价":"'.$row["观感评价"].'","说明":"'.$row["说明"].'"},';
		 }
	} else {
		//echo "0 results";
	}
	//echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>