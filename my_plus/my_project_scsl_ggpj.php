<?php
	require("conn.php");
	
	$sjc=$_POST["sjc"];
	$jcbw=$_POST["jcbw"];
	$jcrq=$_POST["jcrq"];
	$jcry=$_POST["jcry"];
	$sgbz=$_POST["sgbz"];
	$zzxm=$_POST["zzxm"];
	$mc=$_POST["mc"];
	$lxdh=$_POST["lxdh"];
	$sgrq=$_POST["sgrq"];
	$gzms=$_POST["gzms"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($sjc){
		$sql = "select * from 观感评价 where 时间戳 = '".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {			
			$sqli = "update 观感评价 set 标题名称='$mc',检查部位='$jcbw', 检查日期='$jcrq',施工班组='$sgbz',组长姓名='$zzxm',联系方式='$lxdh',施工日期='$sgrq' ,工作描述='$gzms' where 时间戳='".$sjc."'";
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