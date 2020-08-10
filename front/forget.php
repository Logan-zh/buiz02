<fieldset>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name='email' id='email'></td>
        </tr>
        <tr>
            <td id='msg'></td>
        </tr>
        <tr>
            <td><input type="button" value="尋找" onclick="ser()"></td>
        </tr>
    </table>
</fieldset>

<script>
    function ser(){
        let email=$('#email').val()
        $.post('api/forget.php',{email},res=>{
            $('#msg').html(res)
        })
    }
</script>