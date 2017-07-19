<?php
	require("../conn.php");
	
	$sjc=$_POST["sjc"];
	$gcid=$_POST["gcid"];
	$gcmc=$_POST["gcmc"];
	$mc=$_POST["mc"];
	$jcbw=$_POST["jcbw"];
	$jcrq=$_POST["jcrq"];
	$jcry=$_POST["jcry"];
	$sgbz=$_POST["sgbz"];
	$zzxm=$_POST["zzxm"];
	$lxdh=$_POST["lxdh"];
	$sgrq=$_POST["sgrq"];
	$gzms=$_POST["gzms"];
	$jcbh=$_POST["jcbh"];

	if($gcid){
		$sql = "select * from 质量检查  where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='1';
		} else {
			$sqli = "insert into 质量检查 (工程id,工程名称,标题名称,时间戳, 检查部位,检查日期,检查人员, 施工班组,组长姓名,联系方式,施工日期,工作描述,质量检查编号) values ('$gcid','$gcmc','$mc','$sjc','$jcbw','$jcrq','$jcry','$sgbz','$zzxm','$lxdh','$sgrq','$gzms','$jcbh')";
			if ($conn->query($sqli) == TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		}
		$json = '{"result":"'.$jsonresult.'"		
				}';
		echo $json;
		$conn->close();
	
	}
?>
	

