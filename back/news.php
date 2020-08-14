<form action="api/edit_news.php" method="post">
<fieldset>
<legend>最新文章管理</legend>
<button type="button" onclick="location.href='?do=add_news'">新增文章</button>
<table>
    <tr>
        <td style='width:10%'>編號</td>
        <td style='width:60%'>標題</td>
        <td style='width:10%'>顯示</td>
        <td style='width:10%'>刪除</td>
    </tr>
    <?php
        $now=(!empty($_GET['p']))?$_GET['p']:1;
        $div=3;
        $pages=ceil(count($News->all())/$div);
        $start=($now-1)*$div;
        $news=$News->all([]," limit $start,$div");
        foreach($news as $k=> $n){
    ?>
    <tr>
        <td><?=$k+1?></td>
        <td class='tt'><?=$n['title']?></td>
        <td><input type="checkbox" name="sh[]" value="<?=$n['id']?>" <?=($n['sh']==1)?'checked':''?>></td>
        <td><input type="checkbox" name="del[]" value="<?=$n['id']?>"></td>
        <input type="hidden" name="id[]" value="<?=$n['id']?>">
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
    <div class="ct"><button>確定修改</button></div>
</fieldset>
</form>