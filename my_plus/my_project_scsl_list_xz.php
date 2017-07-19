<?php
	require("../conn.php");
	
	$sjc=$_POST["sjc"];
	$gcid=$_POST["gcid"];
	$gclb=$_POST["gclb"];
	$gclb=$_POST["gclb"];
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

	if($gcid){
		$sql = "select * from 建筑工程  where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='1';
		} else {
			$sqli = "insert into 建筑工程 (建筑工程id,工程名称,标题名称,项目类别,时间戳, 检查部位,检查日期,检查人员, 施工班组,组长姓名,联系方式,施工日期,工作描述) values ('$gcid','$gcmc','$mc','$gclb','$sjc','$jcbw','$jcrq','$jcry','$sgbz','$zzxm','$lxdh','$sgrq','$gzms')";
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
	

