<style>
    .bar{
        background:#999;
        height:20px;
        width:80px;
        display:inline-block;
    }
</style>
<?php
    $sub=$Que->find($_GET['id']);
?>
<fieldset>
<legend>目前位置：首頁 > 問卷調查 > <sapn><?=$sub['text']?></span></legend>
<h4><?=$Que->find($_GET['id'])['text']?></h4>
<?php
    foreach($Que->all(['parent'=>$_GET['id']]) as $k =>$v){
        $tt=($sub['count']==0)?1:$sub['count'];
?>
<div>
    <?=$k+1?>.<?=$v['text']?>
    <div class='bar' style='width:<?=$v['count']/$tt*40?>%'></div>
    <span class="num"><?=$v['count']?>票(<?=$v['count']/$tt*100?>%)</span>
</div>
<?php
    }
?>
</fieldset>