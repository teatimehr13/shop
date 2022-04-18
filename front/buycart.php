<?php
    //根據get參數是否帶上商品id及數量來決定是否要把商品放進購物車中
    if(isset($_GET['id']) && isset($_GET['qt'])){
        // $_SESSION['cart']=[$_GET['id']] . $_GET['qt'];  //這樣寫會變成id和qt的數字相加 ;cart|s:6:"Array4";
        $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
    }

    if(empty($_SESSION['mem'])){
        to("./?do=login");
        exit();
    }
?>

    <h1 class='ct'><?=$_SESSION['mem'];?>的購物車</h1>

    <?php
        if(empty($_SESSION['cart'])){
            echo "<h2 class='ct'>購物車中尚無商品</h2>";
            exit();
        }
    ?>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr> 

    <?php
        foreach($_SESSION['cart'] as $id =>$qt){
            //$id為sess檔裡的"i"(index)，i來自於get存入sess的id
        $goods=$Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?=$goods['no']?></td>
            <td><?=$goods['name']?></td>
            <td><?=$qt?></td>
            <td><?=$goods['stock']?></td>
            <td><?=$goods['price']?></td>
            <td><?=($goods['price']*$qt)?></td>
            <td> <img src="icon/0415.jpg" onclick="delCart(<?=$goods['id'];?>)"></td>
        </tr>
    <?php
        }
    ?>

</table>
<div class="ct">
    <a href="index.php"><img src="icon/0411.jpg"></a>
    <a href="?do=checkout"><img src="icon/0412.jpg"></a>
</div>

<script>
    function delCart(id){
        $.post("api/del_cart.php",{id},()=>{
            //利用頁面導向清除帶參數的網址
            location.href='?do=buycart';
        })
    }
</script>