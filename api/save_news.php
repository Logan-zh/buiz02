<?php include_once '../base.php';
    $db=new DB('news');
    foreach($_POST['id'] as $k =>$v){
        if(!empty($_POST['del']) && in_array($v,$_POST['del'])){
            $db->del($v);
        }else{
            $row=$db->find($v);
            $row['sh']=(!empty($_POST['sh']) && in_array($v,$_POST['sh']))?1:0;
            $db->save($row);
        }
    }
    to('../admin.php?do=news');
?>