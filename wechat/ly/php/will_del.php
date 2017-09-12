<?php 

	// 解决跨域问题
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html;charset=utf-8");
// 获取用户名和密码

    $id = $_GET['id'];
    // echo $id;
	// $count = $_GET['count'];
	// $price = $_GET['price'];

	// $servername = "bdm273381633.my3w.com";
	// $adminname = "bdm273381633";
	// SET PASSWORD = PASSWORD('5663825illjq');
    // $adminpwd = "5663825illjq";
    // $dbname = "bdm273381633_db";
	// 1.连接数据库
	//----------------插入-------------------------------------------------------------------------
	$con = mysql_connect("bdm273381633.my3w.com","bdm273381633","5663825illjq");
	mysql_query('SET NAMES UTF8');
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }
    $del="delete from `bdm273381633_db`.`will` where `id`='$id'";
    mysql_query($del, $con);
    echo '删除成功';
  
	// mysql_query("insert into `bdm273381633_db`.`stock`(`name`,`count`,`price`) values('$name','$count','$price')");
	// echo mysql_error();
//-------------------------------------------------------------------------------------------------------------
	// $db = mysqli_connect('bdm273381633.my3w.com','bdm273381633','5663825illjq');
	// 设置编码方式
		
	// 2.判断是否连接成功
	// if (!mysqli_connect_errno($db)) {
		// 连接成功
		// echo "success";
		// 增加一条数据

		// 判断是登录还是注册
		// if ($type == '添加数据') {
		// 	// 注册
			// $sql = "INSERT INTO stock (name, number, price) VALUES ('$name','$number','$price')";
			//--------------查询---------------------------------
			// $sql = "SELECT * FROM `bdm273381633_db`.`stock` ORDER BY `goodsId` DESC  LIMIT 0,50";
			// $result = mysqli_query($db,$sql);
			// while($row = mysqli_fetch_array($result))
			// {
			// echo $row['price'] . " " . $row['number'];
			// echo "<br />";
			// }
			//------------------------------------------
			// if ($result) {
			// 	echo "添加成功";
			// }else{
			// 	echo '添加失败';
			// 	echo $sql;
			// }
		// }
		// else if($type == '查询所有数据'){
		// 	// 登录
		// 	// 查询所有数据
		// 	$sql = "SELECT * FROM PC_home WHERE names='$names' AND imgs='$imgs' AND ms='$ms' AND price='$price' AND prices='prices' ";
		// 	$result = mysqli_query($db,$sql);
		// 	// $msg = $result ->fetch_assoc()['username'];
		// 	if (true) {
		// 		// 用户名存在并登录成功
		// 		echo "登录成功";
		// 	}else{
		// 		// 用户名不存在或密码验证失败
		// 		echo "登录失败";
		// 	}
		// }else if($type == '删除'){
		// 	// 删除用户
		

		// 	if ($result) {
		// 		// 删除成功
		// 		echo "删除成功";

		// 	}else{
		// 		// 删除失败
		// 		echo "删除失败";
		// 	}
		// }
		// else if($type == '更新'){
		// 	// 重设密码
		// 	$sql = "UPDATE user SET password='$password' WHERE username='$username' ";
		// 	$result = mysqli_query($db,$sql);
		// 	if ($result) {
		// 		// 
		// 		echo "密码重置成功!";
		// 	}else{
		// 		echo "密码修改失败";
		// 	}
		// }

		
		// else if($type == '所有'){
		// 	$sql = "SELECT * FROM sale";
		// 	$result = mysqli_query($db,$sql);
		// 	if ($result) {
		// 		$arr = [];
		// 		while ($row = mysqli_fetch_array($result)) {
		// 			array_push($arr,$row);
		// 		}
		// 	}
		// 		// 输出所有数据
		// 	echo json_encode(['code'=>1,'data'=>$arr]);
		// }

	// }else{
		// 连接失败
		// echo "fail";
	// }



	// if ($username == 'aaa' && $password == '123') {
	// 	echo "恭喜你,登录成功!";
	// 	echo $type;
	// }else{
	// 	echo "抱歉!密码或用户名错误";
	// }


// http://www.iwatchos.com/c1611/index.php
// 请求类型:get
// 请求参数
		// username :(string)
		// password :(string)
	// 返回数据类型
		// {
		// 	"code":1,
		// 	"data":[
		// 		{"id":1,"username":"aaa","password":"123"},
		// 		{"id":1,"username":"aaa","password":"123"},
		// 		{"id":1,"username":"aaa","password":"123"},
		// 		{"id":1,"username":"aaa","password":"123"},

		// 	]
		// }


?>