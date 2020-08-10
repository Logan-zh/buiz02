<style>
    tr:nth-child(n+2) td:nth-child(1){
        background:#eee;
    }

    .all {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        min-height: 100px;
        width: 300px;
        position: fixed;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td style='width:30%'>標題</td>
            <td style='width:30%'>內容</td>
            <td style='width:30%'>人氣</td>
        </tr>
        <?php 
            $db=new DB('news');
            $div=5;
            $all=$db->all(['sh'=>1]);
            $pages=ceil(count($all)/$div);
            $now=(!empty($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$div;

            $news=$db->all(['sh'=>1]," order by `good` desc limit $start,$div");
            foreach($news as $n){
        ?>
        <tr>
            <td class='ti'><?=$n['title']?></td>
            <td><div class="attr"><?=mb_substr($n['text'],0,20)?>...</div>
                <div style='display:none' class="all"><?=$n['text']?></div>
            </td>
            <td>
                <?php
                    echo "<span id='vie".$n['id']."'>".$n['good']."</span>個人說<img src='icon/02B03.jpg' style='width:20px'>";
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
</fieldset>

<script>
    $('.ti').hover(function(){
        $(this).next().children('.all').toggle()
    },function(){
        $(this).next().children('.all').toggle()
    })
</script>