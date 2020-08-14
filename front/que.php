<fieldset>
<legend>目前位置：首頁 > 問卷調查</legend>
<table>
    <tr>
        <td style='width:10%'>編號</td>
        <td style='width:60%'>問卷題目</td>
        <td>投票總數</td>
        <td>結果</td>
        <td>狀態</td>
    </tr>
    <?php
        $news=$Que->all(['sh'=>1,'parent'=>0]);
        foreach($news as $k=> $n){
    ?>
    <tr>
        <td class='tt'><?=$k+1?></td>
        <td><?=$n['text']?></td>
        <td><?=$Que->q("select sum(`count`) from `que` where `id` = ".$n['id'])[0][0]?></td>
        <td><a href="?do=result&id=<?=$n['id']?>">結果</a></td>
        <td>
            <?php
                if(!empty($_SESSION['login'])){ ?>
                <a href="?do=vote&id=<?=$n['id']?>">參與投票</a>
            <?php   }else{  ?>
                請先登入
            <?php   }
            ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>

</fieldset>

<script>
    $('.tt').on('click',function(){
        $(this).next().children('.attr').toggle()
        $(this).next().children('.all').toggle()
    })
</script>