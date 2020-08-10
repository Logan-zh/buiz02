<?php include_once '../base.php';
    $acc=$_POST['acc'];
    $db=new DB('user');
    $chk=$db->find(['acc'=>$acc]);
    if(!empty($chk)){
        echo 1;
    }else{
        echo 0;
    }
?>