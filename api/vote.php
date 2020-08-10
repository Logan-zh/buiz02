<?php include_once '../base.php';
    $id=$_POST['count'];

    $opt=$Que->find($id);
    $sub=$Que->find($opt['parent']);

    $sub['count']++;
    $opt['count']++;

    $Que->save($sub);
    $Que->save($opt);
    
?>