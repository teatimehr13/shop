<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>

    <table class="all">
        <tr class="tt ct">
            <td>帳號</td>
            <td>密碼</td>
            <td>管理</td>
        </tr>

        <?php
        $rows = $Admin->all();
        foreach ($rows as $key => $row) {
            $tmp = substr($row['acc'], -4); //取出後4位之字串
        ?>
            <tr class="pp ct">
                <td>
                    <?php
                    if ($row['acc'] == 'admin') {
                        echo $row['acc'];
                    } else {
                        echo str_replace($tmp, '****', $row['acc']); //str of obj,transform,str
                    }
                    ?>
                </td>
                <td><?= str_repeat('*', strlen($row['pw'])) ?></td>
                <td>
                    <?php
                    if ($row['acc'] == 'admin') {
                        echo "此帳號為最高權限";
                    } else {
                        echo "<button onclick=location.href='?do=edit_admin&id={$row['id']}'>修改</button>
                             <button onclick=del('web04_admin',{$row['id']})>刪除</button>";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

    <div class="ct">
        <button onclick="location.href='index.php'">返回</button>
    </div>
</div>

<script>
    function del(table,id){
        let confirms='確定要刪除嗎?';
        if(confirm(confirms)==true){
            $.post("api/del.php",{table,id},()=>{
                history.go(0);
            })
        }
        
    }
</script>