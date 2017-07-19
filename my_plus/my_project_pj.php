<?php
	require("../conn.php");
	$sjc = $_POST["sjc"];
	$sqldate="";
	$sql = "select * from 统计  where 时间戳='".$sjc."'";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"id":"'.$row["id"].'","合格率":"'.$row["合格率"].'","项目类别":"'.$row["项目类别"].'","实测观感":"'.$row["实测观感"].'"},';
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