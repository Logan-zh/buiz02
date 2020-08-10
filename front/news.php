<style>
    tr:nth-child(n+2) td:nth-child(1){
        background:#eee;
    }
</style>
<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td style='width:35%'>標題</td>
            <td style='width:35%'>內容</td>
            <td></td>
        </tr>
        <?php
            $db=new DB('news');
            $div=5;
            $all=$db->all(['sh'=>1]);
            $pages=ceil(count($all)/$div);
            $now=(!empty($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$div;

            $news=$db->all(['sh'=>1]," limit $start,$div");
            foreach($news as $n){
        ?>
        <tr>
            <td onclick="tog(this)"><?=$n['title']?></td>
            <td><div class="attr"><?=mb_substr($n['text'],0,20)?>...</div>
                <div style='display:none' class="all"><?=$n['text']?></div>
            </td>
            <td>
                <?php
                    if(!empty($_SESSION['login'])){
                        $good=new DB('log');
                        $log=$good->find(['user'=>$_SESSION['login'],'news'=>$n['id']]);
                        if(empty($log)){
                            echo "<a id='good".$n['id']."' onclick='javascript:good(&#39;".$n['id']."&#39;,&#39;1&#39;,&#39;".$_SESSION['login']."&#39;)'>讚</a>";
                        }else{
                            echo "<a id='good".$n['id']."' onclick='javascript:good(&#39;".$n['id']."&#39;,&#39;2&#39;,&#39;".$_SESSION['login']."&#39;)'>收回讚</a>";
                        }
                    }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <?php
        if($now-1>0){
            echo "<a href='?do=news&p=".($now-1)."'><</a>";
        }
        for($i=1;$i<=$pages;$i++){
            echo "<a href='?do=news&p=$i'>$i</a>";
        }
        if($now+1<=$pages){
            echo "<a href='?do=news&p=".($now+1)."'>></a>";
        }
    ?>
</fieldset>

<script>
    function tog(e){
        $(e).next().children().eq(0).toggle()
        $(e).next().children().eq(1).toggle()
    }
</script>