<form action="api/add_que.php" method="post">
<fieldset>
<legend>新增問卷</legend>
<table id='tt'>
    <tr>
        <td>問卷名稱</td>
        <td><input type="text" name="sub"></td>
    </tr>
    <tr>
        <td>選項</td>
        <td><input type="text" name='text[]'> <button type='button' onclick='more()'>更多</button></td>
    </tr>
</table>
<div class="ct"><button>新增</button>|<button>清空</button></div>
</fieldset>
</form>


    <fieldset>
    <legend>問卷列表</legend>
    <table>
        <tr>
            <td>問卷名稱</td>
            <td>投票數</td>
            <td>開放</td>
        </tr>
        <?php
            $que=$Que->all(['parent'=>0]);
            foreach($que as $k=>$q){    ?>
                <tr>
                    <form action="api/chg.php" method='post'>
                    <input type="hidden" name="id" value='<?=$q['id']?>'>
                    <td><?=($k+1).'.'.$q['text']?></td>
                    <td><?=$q['count']?></td>
                    <td>
                        <?php
                            if($q['sh']==1){    ?>
                            <button>關閉</button>
                        <?php   }else{  ?>

                            <button>開放</button>
                        <?php   }
                        ?>
                    </td>
                </tr>
                    </form>
        <?php   }
        ?>
    </table>
    </fieldset>


<script>
function more(){
    $('#tt').append(`
        <tr>
            <td colspan='2'>
                <input type="text" name='text[]'> 
            </td>
        </tr>
    `)
}
</script>