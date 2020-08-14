<?php include_once '../base.php';
    foreach($_POST['id'] as $k=>$id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            $n=$News->find($id);
            $n['sh']=(in_array($id,$_POST['sh']))?1:0;
            $News->save($n);
        }
    }
    to('../admin.php?do=news');
?>