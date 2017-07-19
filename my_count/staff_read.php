<?php
	require("../conn.php");
	$section = $_POST["section"];
	$sqldate = '';
	if($section == ''){
	  $sql = "select distinct section from 签到人员信息表 ";
	  $result = $conn->query($sql);
	  if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			  $sqldate= $sqldate.'{"section":"'.$row["section"].'"},';
		  }
	  } else {

	  }
	} else if($section) {
	  $sql = "select * from 签到人员信息表 where section = '".$section."'";
	  $result = $conn->query($sql);
	  if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"staff":"'. $row["staff"].'","mobile":"'. $row["mobile"].'"},';
		 }
	  } else {

	  }
	}

	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"
						}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>