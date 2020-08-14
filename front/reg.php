<form>
<fieldset>
<legend>會員註冊</legend>
<p>*請設定您要註冊的帳號及密碼(最長12個字元)</p>
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
                if(res==1){
                    alert('註冊完 成，歡迎加入')
                    location.href='index.php'
                }else{
                    alert('帳號重複')
                }
            })
        }
    }
</script>