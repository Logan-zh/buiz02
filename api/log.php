<?php include_once '../base.php';
    $id=$_POST['id'];
    $user=$_POST['user'];
    $type=$_POST['type'];
    $Log=new DB('log');
    $News=new DB('news');
    $new=$News->find($id);
    if($type==1){
        $log=$Log->save(['user'=>$user,'news'=>$id]);
        $new['good']++;
        $News->save($new);
    }elseif($type==2){
        $log=$Log->find(['user'=>$user,'news'=>$id]);
        $Log->del($log['id']);
        $new['good']--;
        $News->save($new);
    }
?>