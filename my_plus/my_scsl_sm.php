<?php
require ("../conn.php");
$cdlx = $_POST["cdlx"];
$sqldate = "";
$sql = "select DISTINCT 说明 from  建筑工程质量检测表 a,装修工程质量检查表 b WHERE a.检查内容 = '".$cdlx."'";
$result = $conn -> query($sql);
$count = mysqli_num_rows($result);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_assoc()) {
		$sqldate = $sqldate . '{"说明":"' . $row["说明"] . '"},';
	}
} else {
	//echo "0 results";
}
//echo $sqldate;
$jsonresult = 'success';
$otherdate = '{"result":"' . $jsonresult . '",
				"count":"' . $count . '"
				}';

$json = '[' . $sqldate . $otherdate . ']';
echo $json;
$conn -> close();
?>