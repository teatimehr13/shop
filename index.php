<?php include_once "base.php";
ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
        <iframe name="back" style="display:none;"></iframe>
        <div id="main">
                <div id="top">
                        <a href="?">
                                <img src="./icon/0416.jpg">
                        </a>
                        <div style="padding:10px;">
                                <a href="?">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <a href="?do=order">訂單查詢</a> |
                                <?php
                                if (isset($_SESSION['mem'])) {
                                        echo "<a href='#' onclick=logout('member')>登出</a>";
                                } else {
                                        echo "<a href='?do=login'>會員登入</a>";
                                }
                                echo " | ";

                                if (isset($_SESSION['admin'])) {
                                        echo "<a href='back.php'>返回管理</a>";
                                } else {
                                        echo "<a href='?do=admin'>管理登入</a>";
                                }
                                ?>
                        </div>
                        情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                        <a href="?type=0">全部商品(<?=$Goods->math('count','*',['sh'=>1]);?>)</a>
                        <?php
                        $bigs=$Type->all(['parent'=>0]);
                        foreach($bigs as $big){
                                echo "<div class='ww'>";
                                echo "<a href='?type={$big['id']}'>";
                                echo   $big['name'];
                                echo "(".$Goods->math('count','*',['big'=>$big['id']]).")";
                                echo "</a>";
                                $mids=$Type->all(['parent'=>$big['id']]);
                                if(!empty($mids)){
                                        foreach($mids as $mid){
                                        echo "<div class='s'>";
                                        echo "<a href='?type={$mid['id']}' style='background-color:rgb(222,163,144)'>".$mid['name'];
                                        echo "(".$Goods->math('count','*',['mid'=>$mid['id']]).")"."</a>";
                                        echo "</div>";
                                        }
                                };
                                echo "</div>";

                        }
                        ?>
                        </div>
                        </div>
                        
                <div id="right">
                        <?php
                        $do = $_GET['do'] ?? 'main';
                        $files = 'front/' . $do . '.php';
                        if (file_exists($files)) {
                                include $files;
                        } else {
                                include 'front/main.php';
                        }
                        ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
                        <?= $Bot->find(1)['bottom']; ?> </div>
        </div>
        <?php
        ob_end_flush();
        ?>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./js/js.js"></script>