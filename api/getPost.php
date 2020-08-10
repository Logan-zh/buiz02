<?php include_once '../base.php';
    $news=$News->all(['id'=>$_GET['id']]);
    foreach($news as $n){
        echo "<pre>".$n['text']."</pre>";
    }
?>
