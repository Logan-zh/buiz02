<?php include_once '../base.php';
    $news=$News->all(['type'=>$_GET['type']]);
    foreach($news as $n){
        echo "<div><a onclick='getPost(".$n['id'].")'>".$n['title']."</a></div>";
    }
?>
