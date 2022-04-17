<h1 class="ct">商品分類</h1>

<div class="ct">新增大分類 <input type="text" name="big" id="big"> <button onclick="addType('big')">新增</button></div>
<div class="ct">新增中分類 <select name="parent" id="parent"></select> <input type="text" name="mid" id="mid"> <button onclick="addType('mid')">新增</button></div>

<table class="all">
    <?php
    $bigs = $Type->all(['parent' => 0]);
    foreach ($bigs as $key => $big) {
    ?>
        <tr class="tt ct">
            <td><?= $big['name'] ?></td>
            <td>
                <button onclick="edit(this,<?= $big['id'];?>)">修改</button>
                <button onclick="del('web04_type',<?= $big['id'];?>)">刪除</button>
            </td>
        </tr>

        <?php
        $mids = $Type->all(['parent' => $big['id']]);
        foreach ($mids as $mid) {
        ?>

            <tr class="ct pp">
                <td><?= $mid['name'] ?></td>
                <td>
                    <button onclick="edit(this,<?= $mid['id'];?>)">修改</button>
                    <button onclick="del('web04_type',<?= $mid['id'];?>)">刪除</button>
                </td>
            </tr>

    <?php
        }
    }
    ?>
</table>

<h1 class="ct">商品管理</h1>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>
<table class='all'>
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>

    <?php
        $goods=$Goods->all();
        foreach($goods as $key =>$good){
    ?>


    <tr class="pp ct">
        <td><?=$good['no'];?></td>
        <td style="text-align:left;"><?=$good['name'];?></td>
        <td><?=$good['stock'];?></td>
        <td><?=($good['sh']==1)?"販售中":"已下架";?></td>
        <td>
            <button onclick="location.href='?do=edit_goods&id=<?=$good['id'];?>'">修改</button>
            <button onclick="del('web04_goods',<?=$good['id'];?>)">刪除</button>
            <button onclick="show(this,<?=$good['id'];?>,1)">上架</button>
            <button onclick="show(this,<?=$good['id'];?>,0)">下架</button>
        </td>
    </tr>

    <?php
        }
    ?>
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function addType(type) {
        let name, parent
        switch (type) {
            case 'big':
                name = $('#big').val(),
                    parent = 0
                break;
            case 'mid':
                name = $('#mid').val(),
                    parent = $('#parent').val()
        }
        $.post("api/save_type.php", {
            name,
            parent
        }, () => {
            location.reload();
        })
    }
    // load() 方法從服務器加載數據，並把返回的數據放入被選元素中。
    $("#parent").load("api/load_type.php");
    
    function edit(dom,id){
        let revise=prompt("請輸入要修改的分類文字:",$(dom).parent().prev().text())
        $.post("api/save_type.php",{name:revise,id},()=>{
            $(dom).parent().prev().text(revise);
        })
    }

    function show(dom,id,sh){
        $.post("api/show.php",{id,sh},()=>{
            switch(sh){
            case 1:
                $(dom).parent().prev().text('販售中')
            break;
            case 0:
                $(dom).parent().prev().text('已下架')
            break;
            }
            // location.reload();
        })
    }
</script>