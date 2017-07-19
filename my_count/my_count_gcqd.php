<?php
	require("../conn.php");		
	$gclb=$_POST["gclb"];//工程类别
	$jcnr=$_POST["jcnr"];//检查内容
//	$jcnr='截面尺寸';
	if($jcnr=='截面尺寸'){
		$sqldate="";
		$sql = "select * from  建筑工程质量检测表 a,实测实量新建测点 b where a.检查内容=b.测点类别  and a.检查项目='".$gclb."'and b.测点类别='".$jcnr."' ORDER BY CONVERT(b.测点实测值,SIGNED) desc";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"检查内容":"'.$row["检查内容"] .'","评判标准":"'. $row["评判标准"].'","测点类别":"'. $row["测点类别"].'","测点实测值":"'. $row["测点实测值"].'"},';
//				$ppbz = $row["评判标准"];
//				$cdscz= $row["测点实测值"];
//				$ppbzA = explode("*",$ppbz);
//				if($cdscz >= -5 and  $cdscz <= 8) {
//					$a = $a +1;
//				} else {
//					$b = $b +1;
//				}
				
			}
		}
//		$c =round($a/($a +$b)*100,2).'%';
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$count.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		echo $json;
	} else{
		$a = 0;
		$b = 0;
		$sqldate="";
		$sql = "select * from  建筑工程质量检测表 a,实测实量新建测点 b where a.检查内容=b.测点类别  and a.检查项目='".$gclb."'and b.测点类别='".$jcnr."' ";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
	//			$sqldate= $sqldate.'{"检查内容":"'.$row["检查内容"] .'","评判标准":"'. $row["评判标准"].'","测点类别":"'. $row["测点类别"].'","测点实测值":"'. $row["测点实测值"].'"},';
				$ppbz = $row["评判标准"];
				$cdscz= $row["测点实测值"];
				$ppbzA = explode("*",$ppbz);
				if($cdscz >= $ppbzA[0] and  $cdscz <= $ppbzA[1]) {
					$a = $a +1;
				} else {
					$b = $b +1;
				}
			}
		}
		$c =round($a/($a +$b)*100,2).'%';
		$jsonresult = 'success';
		$otherdate = '{"a":"'.$a.'",
						"b":"'.$b.'",
						"ppbz":"'.$ppbz.'",
						"count":"'.$count.'",
						"c":"'.$c.'",
						"jcnr":"'.$jcnr.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		echo $otherdate;
	}
	$conn->close();

?>