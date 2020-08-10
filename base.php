<?php
    date_default_timezone_set('asia/taipei');
    session_start();
    class DB{
        private $table;
        private $pdo;
        function __construct($table){
            $this->table=$table;
            $this->pdo=new PDO('mysql:host=localhost;charset=utf8;dbname=db02','root','');
        }
        function all(...$arg){
            if(!empty($arg[0])){
                foreach($arg[0] as $k =>$v){
                    $tmp[]=sprintf("`%s` = '%s'",$k,$v);
                }
                $sql="select * from `$this->table` where ".implode(' && ',$tmp);
            }else{
                $sql="select * from `$this->table` ";
            }
            if(!empty($arg[1])){
                $sql.=$arg[1];
            }
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }
        function find($arg){
            if(is_array($arg)){
                foreach($arg as $k =>$v){
                    $tmp[]=sprintf("`%s` = '%s'",$k,$v);
                }
                $sql="select * from `$this->table` where ".implode(' && ',$tmp);
            }else{
                $sql="select * from `$this->table` where `id` = ".$arg;
            }
            return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        }

        function save($arg){
            if(!empty($arg['id'])){
                foreach($arg as $k =>$v){
                    $tmp[]=sprintf("`%s` = '%s'",$k,$v);
                }
                $sql="update `$this->table` set ".implode(',',$tmp)." where `id` = ".$arg['id'];
            }else{
                $sql="insert into `$this->table` (`".implode("`,`",array_keys($arg))."`) values ('".implode("','",$arg)."')";
            }
            return $this->pdo->exec($sql);
        }
        function del($id){
            return $this->pdo->exec("delete from `$this->table` where `id` =".$id);
        }
        function q($sql){
            return $this->pdo->query($sql)->fetchAll();
        }
    }

    function to($u){
        header('location:'.$u);
    }

    $Visited=new DB('visited');

    if(empty($_SESSION['visited'])){
        $chk=$Visited->find(['date'=>date('Y-m-d')]);
        if(empty($chk)){
            $Visited->save(['date'=>date('Y-m-d'),'visited'=>1]);
            $now=$Visited->find(['date'=>date('Y-m-d')]);
        }else{
            $chk['visited']++;
            $Visited->save($chk);
        }
        $_SESSION['visited']=$now['visited'];
    }

    $User=new DB('user');
    $Visited=new DB('visited');
    $News=new DB('news');
    $Que=new DB('que');
    $Log=new DB('log');
?>