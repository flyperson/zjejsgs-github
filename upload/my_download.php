<?php
require ("../conn.php");
$sqldate = "";
$sql = "select * from 文件附件";
$result = $conn -> query($sql);
$count = mysqli_num_rows($result);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_assoc()) {
		$sqldate = $sqldate . '{"id":"' . $row["id"] . '","时间戳":"' . $row["时间戳"] . '","文件名称":"' . $row["文件名称"] . '","文件格式":"' . $row["文件格式"] . '"},';
	}
} else {

}
$jsonresult = 'success';
$otherdate = '{"result":"' . $jsonresult . '",
				"count":"' . $count . '"
				}';

$json = '[' . $sqldate . $otherdate . ']';
echo $json;
$conn -> close();
?>