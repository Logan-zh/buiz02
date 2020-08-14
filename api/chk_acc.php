<?php include_once '../base.php';
    $acc=$_POST['acc'];
    $chk=$User->find(['acc'=>$acc]);
    if(!empty($chk)){
        echo 1;
    }else{
        echo 0;
    }
?>