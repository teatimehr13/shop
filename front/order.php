<?php
if (empty($_SESSION['mem'])) {
    to("./?do=login");
    exit();
}
?>



<div class="ct" style="margin: 30px;" >
    <button class="sw1" style="cursor:pointer">執行中的訂單</button>
    <button class="sw2" style="cursor:pointer">已完成的訂單</button>
</div>



    <?php
    $chk = $Ord->math('count', '*', ['acc' => $_SESSION['mem'],'status'=>1]);
    if($chk > 0) {
        echo "<table class='all ct' id='doing'>";
        echo "<tr class='tt'>
        <td>訂單編號</td>
        <td>商品名稱</td>
        <td>金額</td>
        <td>訂購日期</td>
        </tr>";
        
        $ords = $Ord->all(['status' => 1]);
    
        foreach ($ords as $ord) {
    ?>
            <tr class="pp">
                <td><?= $ord['no']; ?></td>
                <?php
                echo "<td>";
                $ord['goods'] = unserialize($ord['goods']);
                // dd($ord['goods']);
                foreach ($ord['goods'] as $id => $ord_goods) {
                    //得到序列化還原後的商品id
                    $goods = $Goods->all(['id' => $id]);
                    foreach ($goods as $good) {
                        echo "{$good['name']}" . " ";
                    }
                }
                echo "</td>";
                ?>
                <td><?= $ord['total']; ?></td>
                <td><?= date("Y-m-d", strtotime($ord['orddate'])); ?></td>
            </tr>

    <?php
        }
    }
    ?>
</table>

    <?php
    $chk = $Ord->math('count', '*', ['acc' => $_SESSION['mem'],'status'=>0]);
    if($chk > 0) {
        echo "<table class='all ct' id='finish' style='display:none'>";
        echo "<tr class='tt'>
        <td>訂單編號</td>
        <td>商品名稱</td>
        <td>金額</td>
        <td>訂購日期</td>
        </tr>";

        $ords = $Ord->all(['status' => 0]);
        foreach ($ords as $ord) {
    ?>
            <tr class="pp">
                <td><?= $ord['no']; ?></td>
                <?php
                echo "<td>";
                $ord['goods'] = unserialize($ord['goods']);
                // dd($ord['goods']);
                foreach ($ord['goods'] as $id => $ord_goods) {
                    $goods = $Goods->all(['id' => $id]);
                    foreach ($goods as $good) {
                        echo "{$good['name']}" . " ";
                    }
                }
                echo "</td>";
                ?>
                <td><?= $ord['total']; ?></td>
                <td><?= date("Y-m-d", strtotime($ord['orddate'])); ?></td>
            </tr>

    <?php
        }
    }
    ?>
</table>
<div class="ct" style="margin: 20px;">
    <button onclick="history.go(-1)" style="cursor:pointer">返回</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.sw1').on('click', () => {
            $('#finish').hide()
            $('#doing').fadeIn()
        })
        $('.sw2').on('click', () => {
            $('#doing').hide()
            $('#finish').fadeIn()
        })
    })
</script>