<?php
require ("conn.php");
$sjc = $_POST["sjc"];
$cdlx = $_POST["cdlx"];
$gclb = $_POST["gclb"];
$cdlb = $_POST["cdlb"];
$checkId = $_POST["checkId"];

$bm = "";
$world = "";
    if ($gclb == "混凝土工程") {
		if ($cdlx == "一次成型") {
			$bm = "A";
		} elseif ($cdlx == "位置、尺寸") {
			$bm = "B";
		} elseif ($cdlx == "支模") {
			$bm = "C";
		} elseif ($cdlx == "砼坎台成型") {
			$bm = "D";
		} elseif ($cdlx == "砼柱、墙、板") {
			$bm = "E";
		} else {
			
		} 
	} else if ($gclb == "砌体工程") {
		if ($cdlx == "组砌") {
			$bm = "A";
		} elseif ($cdlx == "顶砖") {
			$bm = "B";
		} elseif ($cdlx == "留槎、拉结筋") {
			$bm = "C";
		} elseif ($cdlx == "二次构件及保护") {
			$bm = "D";
		} elseif ($cdlx == "门窗洞口、施工洞口") {
			$bm = "E";
		} elseif ($cdlx == "砌筑观感") {
			$bm = "F";
		} elseif ($cdlx == "二次构件") {
			$bm = "G";
		} else {
			
		} 
	} else if ($gclb == "内墙抹灰工程") {
		if ($cdlx == "单户通长裂缝") {
			$bm = "A";
		} elseif ($cdlx == "单户空鼓") {
			$bm = "B";
		} elseif ($cdlx == "基底、拉毛") {
			$bm = "C";
		} elseif ($cdlx == "加强网") {
			$bm = "D";
		} elseif ($cdlx == "空鼓") {
			$bm = "E";
		} elseif ($cdlx == "开裂") {
			$bm = "F";
		} elseif ($cdlx == "面层、修补") {
			$bm = "G";
		} elseif ($cdlx == "细部外露、收口") {
			$bm = "H";
		} else {
			
		} 
	} else if ($gclb == "外墙防水工程") {
		if ($cdlx == "材料") {
			$bm = "A";
		} elseif ($cdlx == "基底、拉毛、挂网") {
			$bm = "B";
		} elseif ($cdlx == "抹灰、防水、保温层") {
			$bm = "C";
		} elseif ($cdlx == "拦河、压顶、外墙线条") {
			$bm = "D";
		} elseif ($cdlx == "分格缝、滴水线") {
			$bm = "E";
		} elseif ($cdlx == "抹灰、防水、保温层") {
			$bm = "F";
		} elseif ($cdlx == "檐口、歇山") {
			$bm = "G";
		} elseif ($cdlx == "渗漏") {
			$bm = "H";
		} else {
			
		} 
	} else if ($gclb == "门窗工程") {
		if ($cdlx == "洞口尺寸") {
			$bm = "A";
		} elseif ($cdlx == "固定") {
			$bm = "B";
		} elseif ($cdlx == "塞缝") {
			$bm = "C";
		} elseif ($cdlx == "成品保护") {
			$bm = "D";
		} elseif ($cdlx == "渗漏") {
			$bm = "E";
		} elseif ($cdlx == "窗边") {
			$bm = "F";
		} elseif ($cdlx == "打胶") {
			$bm = "G";
		} else {
			
		} 
	} else if ($gclb == "卫生间、沉箱工程") {
		if ($cdlx == "材料") {
			$bm = "A";
		} elseif ($cdlx == "每户渗漏点") {
			$bm = "B";
		} elseif ($cdlx == "基底") {
			$bm = "C";
		} elseif ($cdlx == "防水") {
			$bm = "D";
		} elseif ($cdlx == "细部") {
			$bm = "E";
		} elseif ($cdlx == "同层排水") {
			$bm = "F";
		} elseif ($cdlx == "渗漏") {
			$bm = "G";
		} elseif ($cdlx == "空鼓开裂") {
			$bm = "H";
		} elseif ($cdlx == "降板处理") {
			$bm = "I";
		} else {
			
		} 
	} else if ($gclb == "水电安装工程") {
		if ($cdlx == "套管") {
			$bm = "A";
		} elseif ($cdlx == "给排水") {
			$bm = "B";
		} elseif ($cdlx == "布管布线") {
			$bm = "C";
		} elseif ($cdlx == "空调洞") {
			$bm = "D";
		} elseif ($cdlx == "渗漏") {
			$bm = "E";
		} else {
			
		} 
	} else if ($gclb == "屋面及楼地面工程") {
		if ($cdlx == "材料材料") {
			$bm = "A";
		} elseif ($cdlx == "材料屋面防水施工前每户渗漏处") {
			$bm = "B";
		} elseif ($cdlx == "变形缝") {
			$bm = "C";
		} elseif ($cdlx == "檐口") {
			$bm = "D";
		} elseif ($cdlx == "排水") {
			$bm = "E";
		} elseif ($cdlx == "防水") {
			$bm = "F";
		} elseif ($cdlx == "渗漏") {
			$bm = "G";
		} elseif ($cdlx == "空鼓开裂") {
			$bm = "H";
		} else {
			
		} 
	} else if ($gclb == "外墙工程") {
		if ($cdlb == "外墙铺贴"){
			if ($cdlx == "图案") {
				$bm = "A";
			} elseif ($cdlx == "表面") {
				$bm = "B";
			} elseif ($cdlx == "收口") {
				$bm = "C";
			} elseif ($cdlx == "线条") {
				$bm = "D";
			} 
			$world='A';
		} elseif ($cdlb == "外墙涂料"){
			if ($cdlx == "基层") {
				$bm = "E";
			} elseif ($cdlx == "层数") {
				$bm = "F";
			} elseif ($cdlx == "表面") {
				$bm = "G";
			} elseif ($cdlx == "线条") {
				$bm = "H";
			}
			$world='B'; 
		} elseif ($cdlb == "外墙石材"){
			if ($cdlx == "安装") {
				$bm = "I";
			} elseif ($cdlx == "表面") {
				$bm = "J";
			} elseif ($cdlx == "线条") {
				$bm = "K";
			} elseif ($cdlx == "打胶") {
				$bm = "L";
			} 
			$world='C';
		}
	} else if ($gclb == "天花工程") {
		if ($cdlb == "普遍开裂"){
			if ($cdlx == "普遍开裂") {
				$bm = "A";
			}
			$world='A' ;
		} elseif ($cdlb == "有吊顶天花"){
			if ($cdlx == "安装") {
				$bm = "B";
			} elseif ($cdlx == "表面") {
				$bm = "C";
			} elseif ($cdlx == "油漆") {
				$bm = "D";
			} 
			$world='B';
		} elseif ($cdlb == "无吊顶天花"){
			if ($cdlx == "基层") {
				$bm = "E";
			} elseif ($cdlx == "表面") {
				$bm = "F";
			} elseif ($cdlx == "油漆") {
				$bm = "G";
			} 
			$world='C';
		} elseif ($cdlb == "线条"){
			if ($cdlx == "安装") {
				$bm = "H";
			} elseif ($cdlx == "拼接") {
				$bm = "I";
			} elseif ($cdlx == "表面") {
				$bm = "J";
			} elseif ($cdlx == "油漆") {
				$bm = "K";
			} 
			$world='D';
		}
	} else if ($gclb == "墙面工程") {
		if ($cdlb == "普遍空鼓、开裂"){
			if ($cdlx == "单户通长裂缝") {
				$bm = "A";
			} elseif ($cdlx == "单户瓷砖空鼓") {
				$bm = "B";
			}
			$world='A';
		} elseif ($cdlb == "涂料工程"){
			if ($cdlx == "基层") {
				$bm = "C";
			} elseif ($cdlx == "层数") {
				$bm = "D";
			} elseif ($cdlx == "表面") {
				$bm = "E";
			} elseif ($cdlx == "油漆") {
				$bm = "F";
			} 
			$world='B';
		} elseif ($cdlb == "裱糊工程"){
			if ($cdlx == "基层") {
				$bm = "G";
			} elseif ($cdlx == "预埋") {
				$bm = "H";
			} elseif ($cdlx == "表面") {
				$bm = "I";
			} elseif ($cdlx == "拼接") {
				$bm = "J";
			} elseif ($cdlx == "收口") {
				$bm = "K";
			} 
			$world='C';
		} elseif ($cdlb == "木饰面"){
			if ($cdlx == "基层") {
				$bm = "L";
			} elseif ($cdlx == "安装") {
				$bm = "M";
			} elseif ($cdlx == "表面") {
				$bm = "N";
			} elseif ($cdlx == "细部") {
				$bm = "O";
			} 
			$world='D';
		} elseif ($cdlb == "软硬包"){
			if ($cdlx == "基层") {
				$bm = "P";
			} elseif ($cdlx == "安装") {
				$bm = "Q";
			} elseif ($cdlx == "表面") {
				$bm = "R";
			} elseif ($cdlx == "细部") {
				$bm = "S";
			}
			$world='E'; 
		} elseif ($cdlb == "石材、瓷砖铺贴"){ 
			if ($cdlx == "放样") {
				$bm = "T";
			} elseif ($cdlx == "挂石") {
				$bm = "U";
			} elseif ($cdlx == "排版") {
				$bm = "V";
			} elseif ($cdlx == "表面") {
				$bm = "W";
			} elseif ($cdlx == "收口") {
				$bm = "X";
			}
			$world='F';
		} elseif ($cdlb == "玻璃、金属"){
			if ($cdlx == "安装") {
				$bm = "Y";
			} elseif ($cdlx == "表面") {
				$bm = "Z";
			} elseif ($cdlx == "打胶") {
				$bm = "$";
			}
			$world='G';
		}
	} else if ($gclb == "地面工程") {
		if ($cdlb == "地砖"){
			if ($cdlx == "放样") {
				$bm = "A";
			} elseif ($cdlx == "细部") {
				$bm = "B";
			} elseif ($cdlx == "厨房地柜底部") {
				$bm = "C";
			} elseif ($cdlx == "排版") {
				$bm = "D";
			} elseif ($cdlx == "表面") {
				$bm = "E";
			} elseif ($cdlx == "收口") {
				$bm = "F";
			} 
			$world='A';
		} elseif ($cdlb == "木地板"){
			if ($cdlx == "细部") {
				$bm = "G";
			} elseif ($cdlx == "排版") {
				$bm = "H";
			} elseif ($cdlx == "表面") {
				$bm = "I";
			} 
			$world='B';
		} elseif ($cdlb == "石材"){
			if ($cdlx == "放样") {
				$bm = "J";
			} elseif ($cdlx == "细部") {
				$bm = "K";
			} elseif ($cdlx == "排版") {
				$bm = "L";
			} elseif ($cdlx == "表面") {
				$bm = "M";
			} elseif ($cdlx == "收口") {
				$bm = "N";
			} 
			$world='C';
		} elseif ($cdlb == "踢脚线"){
			if ($cdlx == "安装") {
				$bm = "O";
			} elseif ($cdlx == "表面") {
				$bm = "P";
			} elseif ($cdlx == "细部") {
				$bm = "Q";
			} elseif ($cdlx == "打胶") {
				$bm = "R";
			} 
			$world='D';
		} elseif ($cdlb == "门槛石"){
			if ($cdlx == "铺贴") {
				$bm = "S";
			} elseif ($cdlx == "标高") {
				$bm = "T";
			} elseif ($cdlx == "表面") {
				$bm = "U";
			}
			$world='E'; 
		} 
	} else if ($gclb == "厨房") {
		if ($cdlb == "橱柜"){
			if ($cdlx == "背板") {
				$bm = "A";
			} elseif ($cdlx == "安装") {
				$bm = "B";
			} elseif ($cdlx == "表面") {
				$bm = "C";
			} elseif ($cdlx == "台面") {
				$bm = "D";
			} elseif ($cdlx == "间距") {
				$bm = "E";
			} elseif ($cdlx == "细部") {
				$bm = "F";
			} 
			$world='A';
		} elseif ($cdlb == "电器"){
			if ($cdlx == "安装") {
				$bm = "G";
			} elseif ($cdlx == "嵌入式电器") {
				$bm = "H";
			} elseif ($cdlx == "嵌入式灶台") {
				$bm = "I";
			} elseif ($cdlx == "抽油烟机") {
				$bm = "J";
			} elseif ($cdlx == "嵌入式冰箱") {
				$bm = "K";
			} 
			$world='B';
		} elseif ($cdlb == "给、排水"){
			if ($cdlx == "给、排水管") {
				$bm = "L";
			} elseif ($cdlx == "龙头") {
				$bm = "M";
			} elseif ($cdlx == "洗菜盆") {
				$bm = "N";
			} 
			$world='C';
		}
	} else if ($gclb == "卫生间、阳露台") {
		if ($cdlb=="马桶、浴缸、尿斗" && $cdlx == "给、排水管") {
			$bm = "A";
			$world='A';
		} elseif ($cdlb=="马桶、浴缸、尿斗" && $cdlx == "马桶") {
			$bm = "B";
			$world='A';
		} elseif ($cdlb=="马桶、浴缸、尿斗" && $cdlx == "嵌入式浴缸") {
			$bm = "C";
			$world='A';
		} elseif ($cdlb=="马桶、浴缸、尿斗" && $cdlx == "尿斗") {
			$bm = "D";
			$world='A';
		} elseif ($cdlb=="浴室镜、柜" && $cdlx == "背板") {
			$bm = "E";
			$world='B';
		} elseif ($cdlb=="浴室镜、柜" && $cdlx == "安装") {
			$bm = "F";
			$world='B';
		} elseif ($cdlb=="浴室镜、柜" && $cdlx == "表面") {
			$bm = "G";
			$world='B';
		} elseif ($cdlb=="浴室镜、柜" && $cdlx == "收口") {
			$bm = "H";
			$world='B';
		} elseif ($cdlb=="浴室镜、柜" && $$cdlx == "柜体") {
			$bm = "I";
			$world='B';
		} elseif ($cdlb=="浴室镜、柜" && $cdlx == "五金") {
			$bm = "J";
			$world='B';
		} elseif ($cdlb=="浴室镜、柜" && $cdlx == "水件") {
			$bm = "K";
			$world='B';
		} elseif ($cdlb=="淋浴屏风" && $cdlx == "安装") {
			$bm = "L";
			$world='C';
		} elseif ($cdlb=="淋浴屏风" && $cdlx == "表面") {
			$bm = "M";
			$world='C';
		} elseif ($cdlb=="淋浴屏风" && $cdlx == "打胶") {
			$bm = "N";
			$world='C';
		} elseif ($cdlb=="淋浴屏风" && $cdlx == "五金件") {
			$bm = "O";
			$world='C';
		} elseif ($cdlb=="地洞" && $cdlx == "标高") {
			$bm = "P";
			$world='D';
		} elseif ($cdlb=="地洞" && $cdlx == "水封") {
			$bm = "Q";
			$world='D';
		} elseif ($cdlb=="地洞" && $cdlx == "细部") {
			$bm = "R";
			$world='D';
		} elseif ($cdlb=="龙头、花洒、五金件" && $cdlx == "安装") {
			$bm = "S";
			$world='E';
		} elseif ($cdlb=="龙头、花洒、五金件" && $cdlx == "细部") {
			$bm = "T";
			$world='E';
		} elseif ($cdlb=="给、排水" && $cdlx == "坡度、水封") {
			$bm = "U";
			$world='F';
		} elseif ($cdlb=="给、排水" && $cdlx == "固定") {
			$bm = "V";
			$world='F';
		} elseif ($cdlb=="给、排水" && $cdlx == "细部") {
			$bm = "W";
			$world='F';
		}else {
			
		}
	}else if ($gclb == "电气工程") {
		if ($cdlb=='空调'){
			if ($cdlx == "孔洞") {
				$bm = "A";
			} elseif ($cdlx == "中央空调") {
				$bm = "B";
			} elseif ($cdlx == "分立式空调") {
				$bm = "C";
			}
			$world='A';
		} elseif ($cdlb=='电箱、排气扇、开关、插座'){
			if ($cdlx == "箱内") {
				$bm = "D";
			}elseif ($cdlx == "配电箱、排气扇") {
				$bm = "E";
			} elseif ($cdlx == "开关、插座") {
				$bm = "F";
			}
			$world='B';
		} elseif ($cdlb=='灯具'){
			if ($cdlx == "门扇离地缝隙") {
				$bm = "G";
			}  elseif ($cdlx == "安装平正") {
				$bm = "H";
			} else {
			
			} 
			$world='C';
		}
	}else if ($gclb == "门窗细部工程") {
		if ($cdlb=='木门'){
			if ($cdlx == "安装") {
				$bm = "A";
			} elseif ($cdlx == "门") {
				$bm = "B";
			} elseif ($cdlx == "五金件") {
				$bm = "C";
			}
			$world='A';
		} elseif($cdlb=='铝合金、塑钢门、窗') {
			if ($cdlx == "保护膜") {
				$bm = "D";
			} elseif ($cdlx == "排水孔") {
				$bm = "E";
			} elseif ($cdlx == "打胶") {
				$bm = "F";
			} elseif ($cdlx == "门扇离地缝隙") {
				$bm = "G";
			}  elseif ($cdlx == "安装平正") {
				$bm = "H";
			} else {
				
			} 
			$world='B';
		}
	}else if ($gclb == "栏杆、楼梯扶手") {
		if ($cdlx == "铁艺") {
			$bm = "A";
			$world='A';
		} elseif ($cdlx == "观感") {
			$bm = "B";
			$world='B';
		}  else {
			
		} 
	}else if ($gclb == "电梯前室、首层大堂") {
		if($cdlb=="天花"){
			if ( $cdlx == "工艺") {
				$bm = "A";
			} elseif ($cdlx == "观感") {
				$bm = "B";
			}
			$world='A';
		} elseif($cdlb=="墙面"){
			if ( $cdlx == "工艺") {
				$bm = "C";
			} elseif ($cdlx == "观感") {
				$bm = "D";
			}
			$world='B';
		} elseif($cdlb=="地面"){
			if ( $cdlx == "工艺") {
				$bm = "E";
			} elseif ($cdlx == "观感") {
				$bm = "F";
			}
			$world='C';
		} else {
			
		}
	} else {
		
	};
	
$sqldate = "";
$sql = "select * from 观感评价新建测点  where 测点类型='" . $cdlx . "' and 测点类别='" . $cdlb . "' and 时间戳 = '".$sjc."' and 项目类别='" . $gclb . "' ";
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
"qsbh":"' . $qsbh . '",
"world":"'.$world.'"
}';

echo $json;
$conn -> close();
?>