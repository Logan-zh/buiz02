<?php include_once '../base.php';
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $chk=$User->find(['acc'=>$acc,'pw'=>$pw]);
    if(!empty($chk)){
        echo 1;
        $_SESSION['login']=$acc;
    }else{
        echo 0;
    }
?>