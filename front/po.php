<div>目前位置：首頁 > 分類網誌 > <span id='nav'></span></div>

<fieldset style='width:40%;display:inline-block;vertical-align:top;'>
<legend>分類網誌</legend>
    <div><a onclick="getList(1)">健康新知</a></div>
    <div><a onclick="getList(2)">菸害防制</a></div>
    <div><a onclick="getList(3)">癌症防治</a></div>
    <div><a onclick="getList(4)">慢性病防治</a></div>
</fieldset>

<fieldset style='width:40%;display:inline-block'>
<legend>文章列表</legend>
<div id="list"></div>
<div id="text"></div>
</fieldset>

<script>
getList(1)
    let str=['健康新知','菸害防制','癌症防治','慢性病防治']
    function getList(type){
        $.get('api/getList.php',{type},res=>{
            $('#nav').html(str[type-1])
            $('#list').html(res)
            $('#list').show()
            $('#text').hide()
        })

    }

    function getPost(id){
        $.get('api/getPost.php',{id},res=>{
            $('#text').html(res)
            $('#list').hide()
            $('#text').show()
        })
    }
</script>