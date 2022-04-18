<?php
    //根據訂單的id來取出訂單的資料
    $ord=$Ord->find($_GET['id']);
?>
    <h1 class="ct">
    訂單編號
    <span style="color:red"><?=$ord['no'];?></span>
    的詳細資料
</h1>
    <table class="all" style="margin:0 auto">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp">
                <?=$ord['acc'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><?=$ord['name'];?></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><?=$ord['email'];?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><?=$ord['addr'];?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡電話</td>
            <td class="pp"><?=$ord['tel'];?></td>
        </tr>
    </table>
    <table class="all ct" style="margin:0 auto">
    <tr class="tt">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php 
    //把訂單資料中的商品資料還原成陣列
    $cart=unserialize($ord['goods']);
    
    //取得訂單之還原序列化的index($id)，其為各商品id
    foreach($cart as $id => $qt){
        //再到商品的資料表撈資料
        $goods=$Goods->find($id);
    ?>

    <tr class="pp" id='g<?=$goods['id'];?>'>
        <td><?=$goods['name'];?></td>
        <td><?=$goods['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$goods['price'];?></td>
        <td><?=($qt*$goods['price']);?></td>
    </tr>
    <?php
        }
    ?>
</table>
<div class="all tt ct" style="margin:0 auto;padding:10px 0">
    總價:<?=$ord['total'];?>
</div>
<div class="ct">
    <input type="button" value="返回" onclick="location.href='?do=order'">
</div>