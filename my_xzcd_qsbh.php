<?php
require ("conn.php");

$sjc = $_POST["sjc"];
$cdlx = $_POST["cdlx"];
$gclb = $_POST["gclb"];
$checkId = $_POST["checkId"];

$bm = "";
if ($gclb == "混凝土结构工程") {
	if ($cdlx == "截面尺寸") {
		$bm = "A";
	} elseif ($cdlx == "墙表面平整度") {
		$bm = "B";	
	} elseif ($cdlx == "垂直度（抹灰）") {
		$bm = "C";
	} elseif ($cdlx == "垂直度（免抹灰）") {
		$bm = "D";
	} elseif ($cdlx == "顶板水平度") {
		$bm = "E";
	} elseif ($cdlx == "楼板厚度") {
		$bm = "F";
	} else {

	}
} else if ($gclb == "砌体工程") {
	if ($cdlx == "表面平整度") {
		$bm = "A";
	} elseif ($cdlx == "垂直度") {
		$bm = "B";
	} elseif ($cdlx == "外窗洞口尺寸") {
		$bm = "C";
	} else {

	}
} else if ($gclb == "抹灰工程") {
	if ($cdlx == "墙面表面平整度") {
		$bm = "A";
	} elseif ($cdlx == "墙面垂直度") {
		$bm = "B";
	} elseif ($cdlx == "阴阳角方正") {
		$bm = "C";
	} elseif ($cdlx == "方正性") {
		$bm = "D";
	} elseif ($cdlx == "地面表面平整") {
		$bm = "E";
	} elseif ($cdlx == "门洞尺寸偏差(1)") {
		$bm = "F";
	} elseif ($cdlx == "门洞尺寸偏差(2)") {
		$bm = "G";
	} elseif ($cdlx == "门洞尺寸偏差(3)") {
		$bm = "H";
	} elseif ($cdlx == "外窗内侧墙体厚度极差") {
		$bm = "I";
	} elseif ($cdlx == "厨卫间开间/进深偏差") {
		$bm = "J";
	} else {

	}
} else if ($gclb == "设备安装工程") {
	if ($cdlx == "座便坑距偏差") {
		$bm = "A";
	} else {

	}
} else if ($gclb == "墙面涂饰面") {
	if ($cdlx == "开间/进深极差") {
		$bm = "A";
	} elseif ($cdlx == "墙面平整度(1)") {
		$bm = "B";
	} elseif ($cdlx == "墙面平整度(2)") {
		$bm = "C";
	} elseif ($cdlx == "墙面垂直度(1)") {
		$bm = "D";
	} elseif ($cdlx == "墙面垂直度(2)") {
		$bm = "E";
	} elseif ($cdlx == "阴阳角(1)") {
		$bm = "F";
	} elseif ($cdlx == "阴阳角(2)") {
		$bm = "G";
	} elseif ($cdlx == "顶板水平度(1)") {
		$bm = "H";
	} elseif ($cdlx == "顶板水平度(2)") {
		$bm = "I";
	} else {

	}
} else if ($gclb == "墙面饰面砖") {
	if ($cdlx == "垂直度(瓷砖墙面)") {
		$bm = "A";
	} elseif ($cdlx == "垂直度(石材墙面)") {
		$bm = "B";
	} elseif ($cdlx == "垂直度(木质墙面)") {
		$bm = "C";
	} elseif ($cdlx == "阴阳角(瓷砖墙面)") {
		$bm = "D";
	} elseif ($cdlx == "阴阳角(石材墙面)") {
		$bm = "E";
	} elseif ($cdlx == "阴阳角(木质墙面)") {
		$bm = "F";
	} elseif ($cdlx == "接缝高低差(瓷砖墙面)") {
		$bm = "G";
	} elseif ($cdlx == "接缝高低差(石材墙面)") {
		$bm = "H";
	} elseif ($cdlx == "接缝高低差(木质墙面)") {
		$bm = "I";
	}  else {

	}
} else if ($gclb == "木地板安装") {
	if ($cdlx == "找平层平整度") {
		$bm = "A";
	} elseif ($cdlx == "木地板平整度") {
		$bm = "B";
	} else {

	}
} else if ($gclb == "电梯前室、首层大堂") {
	if ($cdlx == "墙面砖垂直度(瓷砖墙面)") {
		$bm = "A";
	} elseif ($cdlx == "墙面砖垂直度(石材墙面)") {
		$bm = "B";
	} elseif ($cdlx == "墙面砖垂直度(木质墙面)") {
		$bm = "C";
	} elseif ($cdlx == "墙面砖接缝高低差") {
		$bm = "D";
	} elseif ($cdlx == "地面砖表面平整度") {
		$bm = "E";
	} elseif ($cdlx == "地面砖表面平整度") {
		$bm = "F";
	} elseif ($cdlx == "地面砖接缝高低差") {
		$bm = "G";
	}  else {

	}
} else if ($gclb == "设备安装") {
	if ($cdlx == "并列插座开关面板高度差") {
		$bm = "A";
	} elseif ($cdlx == "座厕坑距偏差") {
		$bm = "B";
	} else {

	}
} else {

}

$sqldate = "";
$sql = "select * from 实测实量新建测点  where 测点类别='" . $cdlx . "' and 时间戳 = '" . $sjc . "'  ";
$result = $conn -> query($sql);
$count = mysqli_num_rows($result);
$xxh = $count + 1;
if ($bm == "") {
	$xxh = "";
}
$qsbh = $bm . $xxh;

$jsonresult = 'success';
$json = '{"bm":"' . $bm . '",
"xxh":"' . $xxh . '",
"qsbh":"' . $qsbh . '"
}';

echo $json;
$conn -> close();
?>