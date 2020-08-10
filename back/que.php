<form action="api/add_que.php" method='post'>
    <fieldset>
    <legend>新增問卷</legend>
    <table>
        <tr>
            <td>問卷名稱</td>
            <td><input type="text" name="sub" id="sub"></td>
        </tr>
        <tr>
            <td>選項</td>
            <td><input type="text" name="text[]"><input type="button" onclick='more()' value="更多"></td>
        </tr>
    </table>
        <div><input type="submit" value="新增">|<input type="button" value="清空"></div>
    </fieldset>
</form>

<script>
    function more(){
        $('table').append(`
        <tr><td>選項</td><td>
        <input type="text" name="text[]">
        </td>
        </tr>
        `)
    }
</script>