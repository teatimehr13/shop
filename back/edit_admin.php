<?php
    $admin=$Admin->find($_GET['id']);
    $pr=unserialize($admin['pr']);
?>
<h1 class="ct">新增管理帳號</h1>
<form action="api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?=$admin['acc']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw" value="<?=$admin['pw']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1" <?=(in_array(1,$pr))?'checked':''?>>商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2" <?=(in_array(2,$pr))?'checked':''?>>訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3" <?=(in_array(3,$pr))?'checked':''?>>會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4" <?=(in_array(4,$pr))?'checked':''?>>頁尾版權區管理</div>
                <div><input type="checkbox" name="pr[]" value="5" <?=(in_array(5,$pr))?'checked':''?>>最新消息管理</div>
            </td>
        </tr>
        <input type="hidden" name="id" value="<?=$admin['id']?>">
    </table>
    <div class="ct">
        <button type="submit">新增</button> | 
        <button type="reset">重置</button>
    </div>
</form>