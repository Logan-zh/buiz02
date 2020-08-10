<?php include_once '../base.php';
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $email=$_POST['email'];
    $db=new DB('user');
    $chk=$db->find(['acc'=>$acc]);

        if(empty($chk)){
            $db->save(['acc'=>$acc,'pw'=>$pw,'email'=>$email]);
            echo 1;
        }else{
            echo 0;
        }

?>