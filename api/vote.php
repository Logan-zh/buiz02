<?php include_once '../base.php';
    $id=$_POST['count'];
    $q=$Que->find($id);
    $sb=$Que->find(['id'=>$q['parent']]);
    $q['count']++;
    $sb['count']++;
    $Que->save($q);
    $Que->save($sb);
    to('../index.php?do=que');
?>