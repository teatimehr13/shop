<?php
include_once "../base.php";

if(isset($_POST['acc'])){
    $chk=$Admin->math('count','*',['acc'=>$_POST['acc']]);
    echo $chk;
}