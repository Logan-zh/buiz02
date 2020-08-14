
<fieldset>
<legend>忘記密碼</legend>
<p>請輸入信箱以查詢密碼</p>
<input type="text" name="email" id="email">
<div id="res"></div>
<button onclick="ser()">尋找</button>
</fieldset>


<script>
    function ser(){
        let email=$('#email').val()
        $.post('api/forget.php',{email},res=>{
            $('#res').html(res)
        })
    }
</script>