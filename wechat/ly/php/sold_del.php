<?php 
	// 解决跨域问题
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html;charset=utf-8");
    $id = $_GET['id'];
	//----------------插入-------------------------------------------------------------------------
	$con = mysql_connect("bdm273381633.my3w.com","bdm273381633","5663825illjq");
	mysql_query('SET NAMES UTF8');
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }
    $del="delete from `bdm273381633_db`.`sold` where `id`='$id'";
    mysql_query($del, $con);
    echo '删除成功';
?>