<?php include_once "../base.php";

$db = new db($_POST['table']);
$chk = $db->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk>0){
    echo 1;
    switch($_POST['table']){
        case 'web04_member':
            $_SESSION['mem']=$_POST['acc'];
        break;
        case 'web04_admin':
            $_SESSION['admin']=$_POST['acc'];
        break;
    }
}else{
    echo 0;
}
