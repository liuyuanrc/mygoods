<?php 
	// 解决跨域问题
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html;charset=utf-8");
	// 1.连接数据库
	//----------------插入-------------------------------------------------------------------------
	$con = mysql_connect("bdm273381633.my3w.com","bdm273381633","5663825illjq");
	mysql_query('SET NAMES UTF8');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
			//--------------查询---------------------------------
			$sql = "SELECT * FROM `bdm273381633_db`.`sold` ORDER BY `id`";
			$rs = mysql_query($sql);
			if ($rs) {
				$arr = [];
				while ($row = mysql_fetch_array($rs)) {
					array_push($arr,$row);
				}
			}
				// 输出所有数据
			echo json_encode(['code'=>1,'data'=>$arr]);
            //新建数组  
?>