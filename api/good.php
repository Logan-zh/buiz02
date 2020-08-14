<?php include_once '../base.php';
    $id=$_POST['id'];
    $user=$_POST['user'];
    $type=$_POST['type'];
    if($type==1){
        $Log->save(['user'=>$user,'news'=>$id]);
        $new=$News->find($id);
        $new['good']++;
        $News->save($new);
    }else{
        $Log->del(['user'=>$user,'news'=>$id]);
        $new=$News->find($id);
        $new['good']--;
        $News->save($new);
    }
?>