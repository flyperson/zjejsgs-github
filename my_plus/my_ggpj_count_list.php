<?php
require ("../conn.php");
$sjc = $_POST["sjc"];
$gclb = $_POST["gclb"];
$zm = $_POST["zm"];

$cdlx='';
if ($gclb == "混凝土工程") {
		if ($zm == "A") {
			$cdlx = "一次成型";
		} elseif ($zm == "B") {
			$cdlx = "位置、尺寸";
		} elseif ($zm == "C") {
			$cdlx = "支模";
		} elseif ($zm == "D") {
			$cdlx = "砼坎台成型";
		} elseif ($zm == "E") {
			$cdlx = "砼柱、墙、板";
		} else {
			
		} 
		
	} else if ($gclb == "砌体工程") {
		if ($zm == "A") {
			$cdlx = "组砌";
		} elseif ($zm == "B") {
			$cdlx = "顶砖";
		} elseif ($zm == "C") {
			$cdlx = "留槎、拉结筋";
		} elseif ($zm == "D") {
			$cdlx = "二次构件及保护";
		} elseif ($zm == "E") {
			$cdlx = "门窗洞口、施工洞口";
		} elseif ($zm == "F") {
			$cdlx = "砌筑观感";
		} elseif ($zm == "G") {
			$cdlx = "二次构件";
		} else {
			
		} 
	} else if ($gclb == "内墙抹灰工程") {
		if ($zm == "A") {
			$cdlx = "单户通长裂缝";
		} elseif ($zm == "B") {
			$cdlx = "单户空鼓";
		} elseif ($zm == "C") {
			$cdlx = "基底、拉毛";
		} elseif ($zm == "D") {
			$cdlx = "加强网";
		} elseif ($zm == "E") {
			$cdlx = "空鼓";
		} elseif ($zm == "F") {
			$cdlx = "开裂";
		} elseif ($zm == "G") {
			$cdlx = "面层、修补";
		} elseif ($zm == "H") {
			$cdlx = "细部外露、收口";
		} else {
			
		} 
	} else if ($gclb == "外墙防水工程") {
		if ($zm == "A") {
			$cdlx = "材料";
		} elseif ($zm == "B") {
			$cdlx = "基底、拉毛、挂网";
		} elseif ($zm == "C") {
			$cdlx = "抹灰、防水、保温层";
		} elseif ($zm == "D") {
			$cdlx = "拦河、压顶、外墙线条";
		} elseif ($zm == "E") {
			$cdlx = "分格缝、滴水线";
		} elseif ($zm == "F") {
			$cdlx = "抹灰、防水、保温层";
		} elseif ($zm == "G") {
			$cdlx = "檐口、歇山";
		} elseif ($zm == "H") {
			$cdlx = "渗漏";
		} else {
			
		} 
	} else if ($gclb == "门窗工程") {
		if ($zm == "A") {
			$cdlx = "洞口尺寸";
		} elseif ($zm == "B") {
			$cdlx = "固定";
		} elseif ($zm == "C") {
			$cdlx = "塞缝";
		} elseif ($zm == "D") {
			$cdlx = "成品保护";
		} elseif ($zm == "E") {
			$cdlx = "渗漏";
		} elseif ($zm == "F") {
			$cdlx = "窗边";
		} elseif ($zm == "G") {
			$cdlx = "打胶";
		} else {
			
		}
		 
	} else if ($gclb == "卫生间、沉箱工程") {
		if ($zm == "A") {
			$cdlx = "材料";
		} elseif ($zm == "B") {
			$cdlx = "每户渗漏点";
		} elseif ($zm == "C") {
			$cdlx = "基底";
		} elseif ($zm == "D") {
			$cdlx = "防水";
		} elseif ($zm == "E") {
			$cdlx = "细部";
		} elseif ($zm == "F") {
			$cdlx = "同层排水";
		} elseif ($zm == "G") {
			$cdlx = "渗漏";
		} elseif ($zm == "H") {
			$cdlx = "空鼓开裂";
		} elseif ($zm == "I") {
			$cdlx = "降板处理";
		} else {
			
		} 
	} else if ($gclb == "水电安装工程") {
		if ($zm == "A") {
			$cdlx = "套管";
		} elseif ($zm == "B") {
			$cdlx = "给排水";
		} elseif ($zm == "C") {
			$cdlx = "布管布线";
		} elseif ($zm == "D") {
			$cdlx = "空调洞";
		} elseif ($zm == "E") {
			$cdlx = "渗漏";
		} else {
			
		} 
	} else if ($gclb == "屋面及楼地面工程") {
		if ($zm == "A") {
			$cdlx = "材料材料";
		} elseif ($zm == "B") {
			$cdlx = "材料屋面防水施工前每户渗漏处";
		} elseif ($zm == "C") {
			$cdlx = "变形缝";
		} elseif ($zm == "D") {
			$cdlx = "檐口";
		} elseif ($zm == "E") {
			$cdlx = "排水";
		} elseif ($zm == "F") {
			$cdlx = "防水";
		} elseif ($zm == "G") {
			$cdlx = "渗漏";
		} elseif ($zm == "H") {
			$cdlx = "空鼓开裂";
		} else {
			
		} 
	} else {
		
	};

$t = '0';
$f = '0';
   
	
$sqldate = "";
$sql = "select * from 观感评价新建测点  where 项目类别='".$gclb."' and 时间戳 = '".$sjc."' and  测点编号 like '%".$zm."%'  and pageX1>'0%' order by 测点类型 ";
//$sql = "select * from 观感评价新建测点  where 项目类别='混凝土工程' and 时间戳 = '1492959715570' and  测点编号 like '%A%' ";
$result = $conn -> query($sql);
$count = mysqli_num_rows($result);
if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if ($row["观感评价"]=='√'){
				$t=$t + 1;
			} else if ($row["观感评价"]=='×'){
				$f=$f + 1;
			}
		}
//		$cdType = $row["测点类型"];
}


$jsonresult = 'success';
$json = '{"t":"'. $t .'",
	      "count":"'. $count .'",
	      "f":"'. $f .'",
	      "cdType":"'.$cdlx.'",
	      "zm":"'.$zm.'"
	      
}';

echo $json;
$conn -> close();
?>