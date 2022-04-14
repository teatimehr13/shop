<!--程式由上往下走，上面編輯完後下面的頁版可讀取到資料-->
<?php
if (isset($_POST['bottom'])) {
    $Bot->save([
        'id' => 1,   //需要確認資料表中只有唯一一筆id為1的資料
        'bottom' => $_POST['bottom']
    ]);
}
?>

<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp">
                <input type="text" name="bottom" value="<?= $Bot->find(1)['bottom']; ?>">
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯"> |
        <input type="reset" value="重置">
    </div>
</form>