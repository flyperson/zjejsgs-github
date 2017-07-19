<?php
	require("conn.php");
	
	
//	$jsonresult='';
	$sql1 = "select * from 我的工程      ";
	$result1 = $conn->query($sql1);
	$class = mysqli_num_rows($result1); 
	if ($result1->num_rows > 0) {
		$jsonresult='1';
	} else {
		$jsonresult='0';
	}
	$json = '{
		"result":"'.$jsonresult.'",
		"count":"'.$class.'"
	}';
	
	echo $json;
	mysqli_close($conn);

?>