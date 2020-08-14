<fieldset>
<legend>目前位置：首頁 > 最新文章區</legend>
<table>
    <tr>
        <td style='width:30%'>標題</td>
        <td style='width:30%'>內容</td>
        <td></td>
    </tr>
    <?php
        $now=(!empty($_GET['p']))?$_GET['p']:1;
        $div=5;
        $pages=ceil(count($News->all(['sh'=>1]))/$div);
        $start=($now-1)*$div;
        $news=$News->all(['sh'=>1]," limit $start,$div");
        foreach($news as $n){
    ?>
    <tr>
        <td class='tt'><?=$n['title']?></td>
        <td>
            <div class="attr"><?=mb_substr($n['text'],0,20)?></div>
            <div style='display:none' class="all"><?=$n['text']?></div>
        </td>
        <td>
            <?php
                if(!empty($_SESSION['login'])){ ?>
                <a id="good<?=$n['id']?>" onclick="good('<?=$n['id']?>','1','<?=$_SESSION['login']?>')">讚</a>
            <?php   }else{  ?>
                <a id="good<?=$n['id']?>" onclick="good('<?=$n['id']?>','2','<?=$_SESSION['login']?>')">收回讚</a>
            <?php   } ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
    <?php
        
        if(($now-1) >0){
    ?>
        <a href="?do=news&p=<?=($now-1)?>"><</a>

    <?php
        }
        for($i=1;$i<=$pages;$i++){  
            $size=($now==$i)?"30px":'20px';
    ?>
        <a href="?do=news&p=<?=$i?>" style='font-size:<?=$size?>'><?=$i?></a>
    <?php
        }
        if(($now+1) <=$pages){
    ?>
        <a href="?do=news&p=<?=($now+1)?>">></a>

    <?php
        }
    ?>
</fieldset>

<script>
    $('.tt').on('click',function(){
        $(this).next().children('.attr').toggle()
        $(this).next().children('.all').toggle()
    })
</script>