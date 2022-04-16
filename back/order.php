<h1 class="ct">訂單管理</h1>

<table class="all">
    <tr class="tt ct">
        <td>訂單號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php
    $ords = $Ord->all();
    foreach ($ords as $ord) {
    ?>
        <tr class="pp ct">
            <td><a href="?do=detail&id=<?= $ord['id']; ?>"><?= $ord['no']; ?></a></td>
            <td><?= $ord['total']; ?></td>
            <td><?= $ord['acc']; ?></td>
            <td><?= $ord['name']; ?></td>
            <td><?= date("Y-m-d", strtotime($ord['orddate'])); ?></td>
            <!--轉成秒數再轉date-->
            <td><button onclick="del('web04_ord',<?= $ord['id']; ?>)">刪除</button></td>
        </tr>
    <?php
    }
    ?>
</table>