<?php
	require("../conn.php");
	$mobile=$_POST["mobile"];	
	$gcid=$_POST["gcid"];
	
	$sql = "select * from 我的工程 where  id='".$gcid."' and 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$jsonresult='success';
		$panduanResult='Yes';
	} else {
		
	}
		
	$json = '{"result":"'.$jsonresult.'",
			"panduanResult":"'.$panduanResult.'"		
			}';
	echo $json;
	$conn->close();
?>