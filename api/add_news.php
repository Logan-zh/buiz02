<?php include_once '../base.php';
    $title=$_POST['title'];
    $text=$_POST['text'];
    $type=$_POST['type'];
    $News->save(['title'=>$title,'text'=>$text,'type'=>$type]);
    to('../admin.php?do=news');
?>