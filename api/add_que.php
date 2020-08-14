<?php include_once '../base.php';
    $sub=$_POST['sub'];
    $Que->save(['text'=>$sub,'parent'=>0]);
    $s=$Que->find(['text'=>$sub]);
    foreach($_POST['text'] as $t){
        $Que->save(['text'=>$t,'parent'=>$s['id']]);
    }
    to('../admin.php?do=que');
?>