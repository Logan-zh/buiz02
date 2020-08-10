<?php include_once '../base.php';
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $db=new DB('user');
    $chk=$db->find(['acc'=>$acc,'pw'=>$pw]);
    if(!empty($chk)){
        $_SESSION['login']=$acc;
        echo 1;
    }else{
        echo 0;
    }
?>