<?php
require ("../conn.php");
$sjc = $_POST["sjc"];
$gcmc = $_POST["gcmc"];
$xmid = $_POST["xmid"];
$gclb = $_POST["gclb"];
$hgl = $_POST["hgl"];
$scgg = $_POST["scgg"];
$checkId = $_POST["checkId"];

if ($sjc) {
	$sql = "select * from 统计 where 时间戳='" . $sjc . "' and 项目类别='" . $gclb . "'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		$sqli = "UPDATE 统计 SET 工程名称='$gcmc', 质量检查id='$checkId', 工程id='$xmid',合格率='$hgl',实测观感='$scgg' WHERE 时间戳='" . $sjc . "'and 项目类别='" . $gclb . "'";
		if ($conn -> query($sqli) === TRUE) {
			$jsonresult = 'success';
		} else {
			$jsonresult = 'error';
		}
	} else {
		$sqli = "insert into 统计 (工程id,时间戳,项目类别,合格率,实测观感,工程名称,质量检查id) values ('$xmid','$sjc','$gclb','$hgl','$scgg','$gcmc','$checkId')";
		if ($conn -> query($sqli) === TRUE) {
			$jsonresult = 'success';
		} else {
			$jsonresult = 'error';
		}
	}

	$json = '{"result":"' . $jsonresult . '",
				"n":"'.$gclb.'"		
				}';
	echo $json;
	$conn -> close();

}
?>