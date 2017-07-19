<?php
	require("conn.php");
	$cdlb=$_POST["cdlb"];
	$gclb=$_POST["gclb"];
	$cdlx=$_POST["cdlx"];
	
//	$cdlb='观感质量';
//	$cdlx='砼坎台成型';
//	$gclb='混凝土工程';
	
	$sqldate="";
	$sql = "select * from 观感评价测点类型表  where 测点类型 = '".$cdlx."' and 测点类别 = '".$cdlb."' and 工程类别 = '".$gclb."' ";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"说明":"'.$row["说明"].'"},';
		}
	}
	
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
	$json = '['.$sqldate.$otherdate.']';
		
	echo $json;
	$conn->close();	
?>