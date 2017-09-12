<?php 
	// 解决跨域问题
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html;charset=utf-8");

	//----------------插入-------------------------------------------------------------------------
	$con = mysql_connect("bdm273381633.my3w.com","bdm273381633","5663825illjq");
	mysql_query('SET NAMES UTF8');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
      }
      
    $rs = mysql_query("select sum((`count`*`sold_price`)-(`count`*`modal_price`)) from `bdm273381633_db`.`sold`");
    if ($rs) {
        $arr = [];
        while ($row = mysql_fetch_array($rs)) {
            array_push($arr,$row);
        }
    }
        // 输出所有数据
    echo json_encode(['data'=>$arr]);
	echo mysql_error();
?>