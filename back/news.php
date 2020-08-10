<style>
    tr:nth-child(n+2) td:nth-child(1){
        background:#eee;
    }
</style>
<form action="api/save_news.php" method='post'>
<table style='width:100%' class='ct'>
    <tr>
        <td style='width:20%'>編號</td>
        <td style='width:40%'>標題</td>
        <td style='width:20%'>顯示</td>
        <td style='width:20%'>刪除</td>
    </tr>
    <?php
        $db=new DB('news');
        $div=3;
        $pages=ceil(count($db->all())/$div);
        $now=(!empty($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$div;
        $news=$db->all([]," limit $start,$div");
        foreach($news as $n){
    ?>
    <tr>
        <td><?=$n['id']?></td>
        <td><?=$n['title']?></td>
        <td><input type="checkbox" name="sh[]" value='<?=$n['id']?>' <?=($n['sh']==1)?'checked':''?> ></td>
        <td><input type="checkbox" name="del[]" value='<?$n['id']?>'></td>
        <input type="hidden" name="id[]" value='<?=$n['id']?>' >
    </tr>
    <?php
        }
    ?>
</table>
<div class='ct'>
    <?php
        if($now-1>0){
            echo "<a href='?do=news&p=".($now-1)."'><</a>";
        }
        for($i=1;$i<=$pages;$i++){
            $font=($i==$now)?'30px':'20px';
            echo "<a href='?do=news&p=$i' style='font-size:$font'>$i</a>";
        }
        if($now+1<=$pages){
            echo "<a href='?do=news&p=".($now+1)."'>></a>";
        }
    ?>
</div>
<div class='ct'><input type="submit" value="確定修改"></div>
</form>