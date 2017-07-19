<?php
	require("../conn.php");
	$rzid = $_POST["rzid"];
	$sql = "select * from 工程日志信息  where id='".$rzid."' ";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result -> num_rows>0){
		$sqli = "delete from 工程日志信息 where id='".$rzid."'";
		$conn->query($sqli);
	}
	
	$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
		$json = '['.$otherdate.']';
		
	echo $json;
	$conn->close();		
?>