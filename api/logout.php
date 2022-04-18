<?php include_once "../base.php";

include_once "../base.php";
switch($_POST['table']){
    case "admin":
        unset($_SESSION['admin']);
    break;
    case "member":
        unset($_SESSION['mem']);
        unset($_SESSION['cart']);
    break;
}

to("../index.php");
