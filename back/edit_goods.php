<h1 class="ct">新增商品</h1>
<form action="api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <?php
            $goods=$Goods->find($_GET['id']);
        ?>
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><input type="text" name="no" id="no" value="<?=$goods['no'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?=$goods['name'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="number" name="price" id="price" value="<?=$goods['price'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="spec" id="spec" value="<?=$goods['spec'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="number" name="stock" id="stock" value="<?=$goods['stock'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp">
                <img src="../img/<?=$goods['img']?>" style='width:50px;height:50px'>
                <input type="file" name="img" id="img">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id="intro" style="width:80%;height:100px"><?=$goods['intro'];?></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$goods['id'];?>">
        <input type="submit" value="新增">|
        <input type="reset" value="重置">|
        <input type="button" value="返回" onclick="location.href='?do=th'">
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

    $('#big').load("api/load_type.php",()=>{
        
        //利用商品id來取得對大分類選單的選定狀態 (使用函式prop取得dom的值)
        $("#big option[value='<?=$goods['big'];?>']").prop("selected",true)

        //頁面載入時的第一次選單內容
        $('#mid').load("api/load_type.php",{parent:$('#big').val()})  //$('#big').val()來自於load_type的option value

        //利用商品id來取得對中分類選單的選定狀態
        $("#mid option[value='<?=$goods['mid'];?>']").prop("selected",true)
    })

    //大分類選單改變時的中分類選單內容
    $('#big').on('change',()=>{
        $('#mid').load("api/load_type.php",{parent:$('#big').val()})
    })



</script>