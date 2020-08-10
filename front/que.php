<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table>
        <tr>
            <td style='width:10%'>編號</td>
            <td style='width:30%'>問卷題目</td>
            <td style='width:10%'>投票總數</td>
            <td style='width:10%'>結果</td>
            <td style='width:10%'>狀態</td>
        </tr>
        <?php
            $db=new DB('que');
            $que=$db->all(['parent'=>0]);
            $i=1;
            foreach($que as $q){
        ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$q['text']?></td>
            <td><?=$q['count']?></td>
            <td><a href="?do=result&id=<?=$q['id']?>">結果</a></td>
            <td>
                <?=(empty($_SESSION['login']))?'請先登入':"<a href='?do=vote&sub=".$q['id']."'>參與投票</a>"?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</fieldset>