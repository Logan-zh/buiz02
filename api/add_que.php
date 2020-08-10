<?php include_once '../base.php';
    $db=new DB('que');
    $db->save(['text'=>$_POST['sub'],'parent'=>0]);
    $sub=$db->find(['text'=>$_POST['sub']]);
    foreach($_POST['text'] as $t){
        if($t!=''){
            $db->save(['text'=>$t,'parent'=>$sub['id']]);
        }
    }
    to('../admin.php?do=que');
?>