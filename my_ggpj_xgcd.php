<?php
	require("conn.php");
	
	$sjc=$_POST["sjc"];	
	$bhao=$_POST["bhao"];	
	$ggpj=$_POST["ggpj"];
	$checkId=$_POST["checkId"];
	
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($bhao){
		$sql = "select * from 观感评价新建测点  where 测点编号='".$bhao."'  and 时间戳 = '".$sjc."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 观感评价新建测点 set 观感评价='$ggpj' where 测点编号='".$bhao."'";
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