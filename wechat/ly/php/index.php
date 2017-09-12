<?php 
	// 解决跨域问题
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html;charset=utf-8");
// 获取用户名和密码
	$name = $_GET['name'];
	$count = $_GET['count'];
	$price = $_GET['price'];
	
	//----------------插入-------------------------------------------------------------------------
	$con = mysql_connect("bdm273381633.my3w.com","bdm273381633","5663825illjq");
	mysql_query('SET NAMES UTF8');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_query("insert into `bdm273381633_db`.`stock`(`name`,`count`,`price`) values('$name','$count','$price')");
	echo mysql_error();
?>