<?php include_once '../base.php';
    $id=$_POST['id'];
    $q=$Que->find($id);
    $q['sh']=($q['sh']+=1)%2;
    $Que->save($q);
    to('../admin.php?do=que');
?>