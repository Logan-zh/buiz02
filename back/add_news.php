<form action="api/add_news.php" method='post'>
<fieldset>
<legend>新增文章</legend>
<table>
    <tr>
        <td>文章標題</td>
        <td><input type="title" name="title" id="title"></td>
    </tr>
    <tr>
        <td>文章分類</td>
        <td><select name="type" id="type">
            <option value="1">健康新知</option>
            <option value="2">菸害防治</option>
            <option value="3">癌症防治</option>
            <option value="4">慢性病防治</option>
        </select></td>
    </tr>
    <tr>
        <td>文章內容</td>
        <td><textarea name="text" id="text" cols="50" rows="10"></textarea></td>
    </tr>
    <tr>
        <td colspan='2'><input type="submit" value="新增"><input type="reset" value="重置"></td>
        
    </tr>
</table>
</fieldset>
</form>