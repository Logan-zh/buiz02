<fieldset>
<legend>目前位置：首頁 > <?=$Que->find($_GET['id'])['text']?></legend>
<form action="api/vote.php" method='post'>
<table>
<p><?=$Que->find($_GET['id'])['text']?></p>
<?php
    $que=$Que->all(['parent'=>$_GET['id']]);
    foreach($que as $q){        ?>
    <div><input type="radio" name="count" value='<?=$q['id']?>'><?=$q['text']?></div>
<?php   }
?>
</table>
<div class="ct"><input type="submit" value="我要投票"></div>
</form>

</fieldset>

<script>
    $('.tt').on('click',function(){
        $(this).next().children('.attr').toggle()
        $(this).next().children('.all').toggle()
    })
</script>