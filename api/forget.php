<?php include_once '../base.php';
    $email=$_POST['email'];
    $chk=$User->find(['email'=>$email]);
    if(!empty($chk)){
        echo "您的密碼是:".$chk['pw'];
    }else{
        echo "查無此資料";
    }
?>