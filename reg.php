<?php
	$my_flag = $_POST['my_flag'];
	
	if($my_flag == "get_information"){
		require("conn.php");
		$sql = "select 部门 from 部门权限保存表";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$i=0;
			while($row=$result->fetch_assoc()){
				$return[$i] = $row['部门'];
				$i++;
			}
		}
		$json = json_encode($return);
		echo $json;
		$conn->close();
	}else if($my_flag=="save"){
		require("conn.php");
	
		$account=$_POST["account"];
		$password=$_POST["password"];
		$email=$_POST["email"];
		$shji=$_POST["shji"];
		$equipment=$_POST["equipment"];
		$bmxz = $_POST['bmxz'];
		$ximi = $_POST['ximi'];
		if($account){
			$sql = "select * from 用户信息 where 账号='".$account."' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$jsonresult='1';
			} else {
				$sql = "select * from 用户信息 where 手机='".$shji."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$jsonresult='0';
				} else{
					$sql = "select * from 用户信息 where 邮箱='".$email."'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$jsonresult='2';
					} else{
						$sqli = "insert into 用户信息 (账号,密码,邮箱,手机,设备,部门,姓名) values ('$account', '$password', '$email', '$shji','$equipment','$bmxz','$ximi')";
						if ($conn->query($sqli) === TRUE) {
							$jsonresult='success';
						} else {
							$jsonresult='error';
						}
					}
				}
			}	
			$json = '{"result":"'.$jsonresult.'",
						"sql":"'.$sqli.'"		
						}';
			echo $json;
			$conn->close();
		}
	}

?>