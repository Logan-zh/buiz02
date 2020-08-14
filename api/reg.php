<?php include_once '../base.php';
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $email=$_POST['email'];

    $chk=$User->find(['acc'=>$acc]);
    if(!empty($chk)){
        echo 0;
    }else{
        echo $User->save(['acc'=>$acc,'pw'=>$pw,'email'=>$email]);
    }
?>