<?php
require ("conn.php");
$sjc = $_POST["sjc"];
$gclb = $_POST["gclb"];
$sqldate = "";
$sql = "select * from 观感评价新建测点 where 时间戳 = '" . $sjc. "' and 项目类别 ='".$gclb."' order by 测点编号";
$result = $conn -> query($sql);
$count = mysqli_num_rows($result);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_assoc()) {
		$sqldate = $sqldate . '{"id":"' . $row["id"] . '","测点类型":"' . $row["测点类型"] . '","测点类别":"' . $row["测点类别"] . '","编号":"' . $row["测点编号"] . '","观感评价":"' . $row["观感评价"] . '","说明":"' . $row["说明"] . '","pageX":"' . $row["pageX"] . '","pageY":"' . $row["pageY"] . '"},';
	}
//	if ($gclb == "外墙工程") {
//		if ($row["测点类别"] == "外墙铺贴"){
//			$world='A';
//		} elseif ($row["测点类别"] == "外墙涂料"){
//			$world='B'; 
//		} elseif ($row["测点类别"] == "外墙石材"){
//			$world='C';
//		}
//	} else if ($gclb == "天花工程") {
//		if ($row["测点类别"] == "普遍开裂"){
//			$world='A' ;
//		} elseif ($row["测点类别"] == "有吊顶天花"){
//			$world='B';
//		} elseif ($row["测点类别"] == "无吊顶天花"){
//			$world='C';
//		} elseif ($row["测点类别"] == "线条"){
//			$world='D';
//		}
//	} else if ($gclb == "墙面工程") {
//		if ($row["测点类别"] == "普遍空鼓、开裂"){
//			$world='A';
//		} elseif ($row["测点类别"] == "涂料工程"){
//			$world='B';
//		} elseif ($row["测点类别"] == "裱糊工程"){
//			$world='C';
//		} elseif ($row["测点类别"] == "木饰面"){
//			$world='D';
//		} elseif ($row["测点类别"] == "软硬包"){
//			$world='E'; 
//		} elseif ($row["测点类别"] == "石材、瓷砖铺贴"){ 
//			$world='F';
//		} elseif ($row["测点类别"] == "玻璃、金属"){
//			$world='G';
//		}
//	} else if ($gclb == "地面工程") {
//		if ($row["测点类别"] == "地砖"){
//			$world='A';
//		} elseif ($row["测点类别"] == "木地板"){
//			$world='B';
//		} elseif ($row["测点类别"] == "石材"){
//			$world='C';
//		} elseif ($row["测点类别"] == "踢脚线"){
//			$world='D';
//		} elseif ($row["测点类别"] == "门槛石"){
//			$world='E'; 
//		} 
//	} else if ($gclb == "厨房") {
//		if ($row["测点类别"] == "橱柜"){
//			$world='A';
//		} elseif ($row["测点类别"] == "电器"){
//			$world='B';
//		} elseif ($row["测点类别"] == "给、排水"){
//			$world='C';
//		}
//	} else if ($gclb == "卫生间、阳露台") {
//		if ($row["测点类别"]=="马桶、浴缸、尿斗" ) {
//			$world='A';
//		} elseif ($row["测点类别"]=="浴室镜、柜" ) {
//			$world='B';
//		} elseif ($row["测点类别"]=="淋浴屏风" ) {
//			$world='C';
//		} elseif ($row["测点类别"]=="地洞" ) {
//			$world='D';
//		} elseif ($row["测点类别"]=="龙头、花洒、五金件" ) {
//			$world='E';
//		} elseif ($row["测点类别"]=="给、排水") {
//			$world='F';
//		}else {
//			
//		}
//	}else if ($gclb == "电气工程") {
//		if ($row["测点类别"]=='空调'){
//			$world='A';
//		} elseif ($row["测点类别"]=='电箱、排气扇、开关、插座'){
//			$world='B';
//		} elseif ($row["测点类别"]=='灯具'){
//			$world='C';
//		}
//	}else if ($gclb == "门窗工程") {
//		if ($row["测点类别"]=='木门'){
//			$world='A';
//		} elseif($row["测点类别"]=='铝合金、塑钢门、窗') {
//			$world='B';
//		}
//	}else if ($gclb == "栏杆、楼梯扶手") {
//		if ($cdlx == "铁艺") {
//			$world='A';
//		} elseif ($cdlx == "观感") {
//			$world='B';
//		}  else {
//			
//		} 
//	}else if ($gclb == "电梯前室、首层大堂") {
//		if($row["测点类别"]=="天花"){
//			$world='A';
//		} elseif($row["测点类别"]=="墙面"){
//			$world='B';
//		} elseif($row["测点类别"]=="地面"){
//			$world='C';
//		} else {
//			
//		}
//	} else {
//		
//	};
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