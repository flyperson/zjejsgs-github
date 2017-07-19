<?php
	require("conn.php");
	
	$sjc=$_POST["sjc"];	
	$bhao=$_POST["bhao"];	
	$scz=$_POST["scz"];
	
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($bhao){
		$sql = "select * from 实测实量新建测点  where 测点编号='".$bhao."' and 时间戳 = '".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 实测实量新建测点 set 测点实测值='$scz' where 测点编号='".$bhao."'";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		} else {
			$jsonresult='1';			
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
		echo $json;
		$conn->close();
	
	}
?>