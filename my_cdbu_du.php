<?php
	require("conn.php");
	$bhao=$_POST["bhao"];
	$sjc=$_POST["sjc"];
	
	$sqldate="";
	$sql = "select * from  建筑工程质量检测表 a,实测实量新建测点 b where a.检查内容=b.测点类别 and b.测点编号='".$bhao."' and b.时间戳='".$sjc."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","测点类别":"'. $row["测点类别"].'","测点编号":"'. $row["测点编号"].'","测点实测值":"'.$row["测点实测值"].'","说明":"'.$row["说明"].'","评判标准":"'.$row["评判标准"].'"},';
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