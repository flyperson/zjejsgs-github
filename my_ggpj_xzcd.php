<?php
require ("conn.php");

$sjc = $_POST["sjc"];
$xmid = $_POST["xmid"];
$gclb = $_POST["gclb"];
$cdgs = $_POST["cdgs"];
$cdlb = $_POST["cdlb"];
$cdlx = $_POST["cdlx"];
$qsbh = $_POST["qsbh"];
$zzbh = $_POST["zzbh"];
$ggpj = $_POST["ggpj"];
$sm = $_POST["sm"];
$checkId = $_POST["checkId"];

$lxbm = substr($qsbh, 0, 1);
//起始编号字母部分
$qsbhxl = substr($qsbh, 1);
//起始编号数字部分
$zzbhxl = substr($zzbh, 1);
//终止编号数字部分
$bianhao = "";
if ($xmid) {
	for ($i = $qsbhxl; $i < $zzbhxl + 1; $i++) {
		$bianhao = $lxbm . $i;
		$time = getdate();
		$timestr = $time['year'] . "-" . $time['mon'] . "-" . $time['mday'] . "/" . $time['hours'] . ":" . $time['minutes'] . ":" . $time['seconds'];
		$sql = "select * from 观感评价新建测点  where 测点编号='" . $bianhao . "' and 时间戳 = '" . $sjc. "' and 质量检查id = '" . $checkId . "' and 项目类别='".$gclb."' ";
		$result = $conn -> query($sql);
		if ($result -> num_rows > 0) {
			$jsonresult = '1';
		} else {
			$sqli = "insert into 观感评价新建测点 (质量检查id,测点类型,测点类别,观感评价, 测点编号,说明,添加时间,项目类别,时间戳) values ('$checkId','$cdlx','$cdlb','$ggpj','$bianhao','$sm','$timestr','$gclb','$sjc')";
			if ($conn -> query($sqli) === TRUE) {
				$jsonresult = 'success';
			} else {
				$jsonresult = 'error';
			}
		}
	}

	$json = '{"result":"' . $jsonresult . '"		
			}';
	echo $json;
	$conn -> close();
}
?>