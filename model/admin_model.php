<?php
require_once("base.php");

class admin_model {
    
    public function add_admin ($admin_name,$password){
        $model = new base();
        $c = $model->connect();
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $query = $c->prepare("INSERT INTO admin (admin_name, `password`) VALUES (?,?)");
        $query->bindParam(1,$admin_name);   
        $query->bindParam(2,$param_password);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function verify_admin_name($admin_name){
        $model = new base();
        $c = $model->connect();
        $query =$c->prepare("SELECT id FROM `admin` WHERE admin_name = ?");
        $query->bindParam(1,$admin_name);
        $result = $model->execute($query);
        if ($result !== false) {
            // The query was successful, proceed to get the id
            $id = $result['id'];
           
            return $id;
        }else{ 
            return $result;
        }
        $model->disconect($c);
    }

    public function get_password ($admin_name){
        $model = new base();
        $c = $model->connect();
        $query =$c->prepare("SELECT `password` FROM `admin` WHERE admin_name = ?");
        $query->bindParam(1,$admin_name);
        $result = $model->execute($query);
        $model->disconect($c);
        $password = $result['password'];
        return $password;
    }
   
   
}
?>