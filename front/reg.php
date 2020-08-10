<form>
<fieldset>
    <legend>會員註冊</legend>
    <p style='color:red'>*請設定您要註冊的帳號及密碼</p>
    <table>
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
        <tr>
            <td><input type="button" value="註冊" onclick="reg()"><input type="reset" value="清除"></td>
            <td></td>
        </tr>
    </table>
</fieldset>
</form>

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
                    alert('註冊成功')
                    location.href="?do=login"
                }else{
                    alert('帳號重複')
                    location.reload();
                }
            })
        }
    }
</script>