<?php 
	// 解决跨域问题
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html;charset=utf-8");
// 获取用户名和密码

	$name = $_GET['name'];
    $count = $_GET['count'];
    $sold_price = $_GET['price'];
    $modal_price = $_GET['modal_price'];
    $goodsId = $_GET['goodsId'];
    $guest_name = $_GET['guest_name'];
    $guest_adr = $_GET['guest_adr'];

	//----------------插入-------------------------------------------------------------------------
	$con = mysql_connect("bdm273381633.my3w.com","bdm273381633","5663825illjq");
	mysql_query('SET NAMES UTF8');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_query("insert into `bdm273381633_db`.`sold`(`name`,`count`,`goodsId`,`sold_price`,`modal_price`,`guest_name`,`guest_adr`) values('$name','$count','$goodsId','$sold_price','$modal_price','$guest_name','$guest_adr')");
	echo mysql_error();
?>