<fieldset>
<legend>帳號管理</legend>
<form action="api/del.php" method='post'>
<table>
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>刪除</td>
    </tr>
    <?php
        $users=$User->all();
        foreach($users as $u){
    ?>
    <tr>
        <td><?=$u['acc']?></td>
        <td><?=$u['pw']?></td>
        <td><input type="checkbox" name="del[]" value="<?=$u['id']?>"></td>
        <input type="hidden" name="id[]" value="<?=$u['id']?>">
    </tr>
    <?php
        }
    ?>
</table>
<div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
</form>

<form>
<h1>新增會員</h1>
<p style='color:red'>*請設定您要註冊的帳號及密碼(最長12個字元)</p>
<table>
    <tr>
        <td>帳號:</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td>密碼:</td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td>確認密碼:</td>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td>信箱:</td>
        <td><input type="email" name="email" id="email"></td>
    </tr>
    <tr>
        <td><button type='button' onclick='reg()'>註冊</button><button type='reset'>清除</button></td>
        <td></td>
    </tr>
</table>
</fieldset>
</form>

</fieldset>

<script>
    function reg(){
        let acc=$('#acc').val()
        let pw=$('#pw').val()
        let pw2=$('#pw2').val()
        let email=$('#email').val()
        if(acc==''&&pw==''&&pw2==''&&email==''){
            alert('不可空 白')
        }else{
            $.post('api/reg.php',{acc,pw,email},res=>{
                    location.reload()
            
            })
        }
    }
</script>