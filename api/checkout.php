<?php include_once "../base.php";

$_POST['acc']=$_SESSION['mem'];

//訂單編號使用亂數
$_POST['no']=date("Ymd").rand(100000,999999);

//將購買的商品之陣列序列化存入
$_POST['goods']=serialize($_SESSION['cart']);

//此處的post有上述自訂義的及ajax表單送來的
$Ord->save($_POST);

//訂單產生後清空購物車
unset($_SESSION['cart']);