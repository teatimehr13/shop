<?php
$id=$_GET['type']??0;

//顯示全部商品
if($id==0){
    $nav="全部商品";
    $goods=$Goods->all(['sh'=>1]);
}else{
    $type=$Type->find($id);
    //透過parent若為0得知為大分類
    if($type['parent']==0){
        $nav=$type['name'];
        //取出不同大分類底下的全部商品
        $goods=$Goods->all(['big'=>$id,'sh'=>1]);
    }else{
        //parent不是0的情況為中分類
        $type_mid=$Type->find($type['parent']);
        $nav=$type_mid['name'] . " > " . $type['name'];
        //取出不同中分類的商品
        $goods=$Goods->all(['mid'=>$id,'sh'=>1]);
    }
}
?>

<h1><?=$nav;?></h1>
<?php
    foreach($goods as $good){
?>
<div class='all' style="display:flex;height:200px;">
    <div class='pp' style="width:40%">
        <!--點擊商品圖購買-->
        <a href="?do=detail&id=<?=$good['id'];?>" 
          style="display:flex;height:100%;justify-content:center;align-items:center">
            <img src="img/<?=$good['img'];?>" style="width:80%;height:80%">
        </a>
    </div>
    <div class='pp' style="width:60%">
        <div class="tt ct"><?=$good['name'];?></div>
        <div>
            價錢:<?=$good['price'];?>
            <!--我要購買，數量預設為1-->
            <a href='?do=buycart&id=<?=$good['id'];?>&qt=1' 
              style="float:right">
              <img src="icon/0402.jpg">
            </a>
        </div>
        <div>規格:<?=$good['spec'];?></div>
        <div>簡介:<?=mb_substr($good['intro'],0,20);?>...</div>
    </div>
</div>
<?php
    }
?>