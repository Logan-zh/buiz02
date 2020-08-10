<style>
.ct tr:nth-child(1) {
    background: #eee;
}
.n tr td:nth-child(1) {
    background: #eee;
}
</style>
<fieldset>
    <form action="api/save_user.php" method='post'>
        <legend>帳號管理</legend>
        <table class='ct' style='width:100%'>
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $db=new DB('user');
            $rows=$db->all();
            foreach($rows as $row){
        ?>
            <tr>
                <td><?=$row['acc']?></td>
                <td><?=str_repeat('*',strlen($row['pw']))?></td>
                <td><input type="checkbox" name="del[]" value='<?=$row['id']?>'></td>
            </tr>
            <?php
            }
        ?>
        </table>
        <div class='ct'>
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
</form>

        <h1>新增會員</h1>
        <p style='color:red'>*請設定您要註冊的帳號及密碼</p>
        <table class='n'>
            <tr>
                <td>Step1:登入帳號</td>
                <td><input type="text" name='acc' id='acc'></td>
            </tr>
            <tr>
                <td>Step2:登入密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>Step3:再次確認密碼</td>
                <td><input type="password" name="pw2" id="pw2"></td>
            </tr>
            <tr>
                <td>Step4:信箱(忘記密碼時使用)</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            </table>
            <div><input type="button" value="新增" onclick="reg()"><input type="reset" value="清除"></div>
</fieldset>

<script>
    function reg(){
        let acc=$('#acc').val()
        let pw=$('#pw').val()
        let pw2=$('#pw2').val()
        let email=$('#email').val()
        if(acc==''||pw==''||pw2==''){
            alert('不可空白')
        }else if(pw!=pw2){
            alert('密碼錯誤')
        }else{
            $.post('api/reg.php',{acc,pw,email},res=>{
                if(res==1){
                    alert('新增成功')
                    location.href="?do=user"
                }else{
                    alert('帳號重複')
                    location.reload();
                }
            })
        }
    }
</script>