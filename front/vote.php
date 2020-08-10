<?php include_once 'base.php' ?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?=$Que->find($_GET['sub'])['text']?></span></legend>
    
    <h4><?=$Que->find($_GET['sub'])['text']?></h4>
    <?php
        $que=$Que->all(['parent'=>$_GET['sub']]);
        foreach($que as $q){
    ?>
    <p><input type="radio" name="count" value='<?=$q['id']?>'><?=$q['text']?></p>
    <?php
        }
    ?>
    <div class="ct"><button onclick="vote()">我要投票</button></div>
</fieldset>

<script>
function vote(){
    let count=$('input[type=radio]:checked').val()
    $.post('api/vote.php',{count},res=>{
        location.href=`?do=result&id=<?=$Que->find($_GET['sub'])['id']?>`
    })
}
</script>