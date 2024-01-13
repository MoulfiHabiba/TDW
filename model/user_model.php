<?php
require_once("base.php");

class user_model {
    
    public function add_user ($firstname,$lastname,$email,$password,$sexe,$birthdate){
        $model = new base();
        $c = $model->connect();
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $query = $c->prepare("INSERT INTO users (firstname, lastname, email, `password`, sexe, birthdate) VALUES (?,?,?,?,?,?)");
        $query->bindParam(1,$firstname);
        $query->bindParam(2,$lastname);
        $query->bindParam(3,$email);
        $query->bindParam(4,$param_password);
        $query->bindParam(5,$sexe);
        $query->bindParam(6,$birthdate);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function verify_email ($email){
        $model = new base();
        $c = $model->connect();
        $query =$c->prepare("SELECT id FROM users WHERE email = ?");
        $query->bindParam(1,$email);
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
    public function update_user ($firstname,$lastname,$email,$password,$sexe,$birthdate,$user_id){
        $model = new base();
        $c = $model->connect();
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $query = $c->prepare("UPDATE users  SET firstname = ?, lastname=?, email=?, `password`=?, sexe=?, birthdate=? WHERE id=?");
        $query->bindParam(1,$firstname);
        $query->bindParam(2,$lastname);
        $query->bindParam(3,$email);
        $query->bindParam(4,$param_password);
        $query->bindParam(5,$sexe);
        $query->bindParam(6,$birthdate);
        $query->bindParam(7,$user_id);

        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function verify_email2 ($email, $user_id){
        $model = new base();
        $c = $model->connect();
        $query =$c->prepare("SELECT id FROM users WHERE email = ? AND id!=?");
        $query->bindParam(1,$email);
        $query->bindParam(2,$user_id);

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
    public function get_password ($email){
        $model = new base();
        $c = $model->connect();
        $query =$c->prepare("SELECT `password` FROM users WHERE email = ?");
        $query->bindParam(1,$email);
        $result = $model->execute($query);
        $model->disconect($c);
        $password = $result['password'];
        return $password;
    }
    public function get_all_users(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM users WHERE is_deleted=0";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }
    public function get_singl_user($user_email){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM users u JOIN images i WHERE u.profil_img_url=i.id AND u.email = ?");
        $query->bindParam(1,$user_email);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_all_users_nb(){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("SELECT COUNT(id) nb FROM users");
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_registered_users_nb(){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("SELECT COUNT(id) nb FROM users WHERE is_register=1");
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_non_registered_users_nb(){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("SELECT COUNT(id) nb FROM users WHERE is_register=0");
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_blocked_users_nb(){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("SELECT COUNT(id) nb FROM users WHERE is_blocked=1");
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_non_blocked_users_nb(){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("SELECT COUNT(id) nb FROM users WHERE is_blocked=0");
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function delete_user($user_id){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("UPDATE users SET is_deleted=1 WHERE id=?");
        $query->bindParam(1,$user_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;

    }
}
?>