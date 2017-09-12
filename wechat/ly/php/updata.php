<?php 
	// 解决跨域问题
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html;charset=utf-8");
// 获取用户名和密码

	$count = $_GET['count'];
	$goodsId = $_GET['goodsId'];

	// 1.连接数据库
	//----------------更新数据库-------------------------------------------------------------------------
	$con = mysql_connect("bdm273381633.my3w.com","bdm273381633","5663825illjq");
	mysql_query('SET NAMES UTF8');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_query("update `bdm273381633_db`.`stock` set `count`=`count`-'$count' where `goodsId`='$goodsId'");
	echo mysql_error();
//-------------------------------------------------------------------------------------------------------------
?>