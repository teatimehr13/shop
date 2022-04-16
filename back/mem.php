<div class="ct">
    <h1 class="ct">會員管理</h1>

    <table class="all">
        <tr class="tt ct">
            <td>姓名</td>
            <td>會員帳號</td>
            <td>註冊日期</td>
            <td>操作</td>
        </tr>

        <?php
        $rows = $Mem->all();
        foreach ($rows as $key => $row) {
            $tmp = substr($row['acc'], -4); //取出後4位之字串
        ?>
            <tr class="pp ct">
                <td><?=$row['name'];?></td>
                <td>
                    <?= str_replace($tmp, '****', $row['acc']); ?>
                    <!--str of obj,transform,str-->

                </td>
                <td><?= substr($row['regdate'], 0, 10) ?></td>
                <td>
                    <?php
                    echo "<button onclick=location.href='?do=edit_mem&id={$row['id']}'>修改</button>
                             <button onclick=del('web04_member',{$row['id']})>刪除</button>";
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>
</div>