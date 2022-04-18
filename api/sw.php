<?php include_once "../base.php";

$sw=$Ord->find($_POST['id']);
$sw['status']=($_POST['sh']==0)?1:0;
$Ord->save($sw);