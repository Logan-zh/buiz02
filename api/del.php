<?php include_once '../base.php';
    if(!empty($_POST['del'])){
        
        foreach($_POST['id'] as $id){
            
            if(in_array($id,$_POST['del'])){
                $User->del($id);
            }
        }
    }
    to('../admin.php?do=user');
?>