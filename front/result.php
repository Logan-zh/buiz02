<fieldset>
<legend>目前位置：首頁 > <?=$Que->find($_GET['id'])['text']?></legend>
<form action="api/vote.php" method='post'>
<table>
<p><?=$Que->find($_GET['id'])['text']?></p>
<?php
    $que=$Que->all(['parent'=>$_GET['id']]);
    foreach($que as $q){        ?>
    <div><?=$q['text']?></div>
    <span style='width:<?=(round($q['count']/$Que->find($_GET['id'])['count']*60))?>%;height:20px;background:#777;display:block'></span><span><?=$q['count']?>票(<?=(round($q['count']/$Que->find($_GET['id'])['count']*100))?>%)</span>
<?php   }
?>
</table>
<div class="ct"><button type='button' onclick="history.back()">返回</button></div>
</form>

</fieldset>

<script>
    $('.tt').on('click',function(){
        $(this).next().children('.attr').toggle()
        $(this).next().children('.all').toggle()
    })
</script>