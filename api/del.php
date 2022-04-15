<?php include_once "../base.php";

$db=new db($_POST['table']);
$db->del($_POST['id']);