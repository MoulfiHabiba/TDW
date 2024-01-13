<?php
require_once("model/user_model.php");
require_once("view/user_view.php");
class user_controller{
    public function register($firstname,$lastname,$email,$password,$sexe,$birthdate){
      $user_model = new user_model();
      $email_result = $user_model->verify_email($email);
      if ($email_result){
        //echo $email_result;
        $message = "This email is already used.";
        return $message;
      } else {
        $user_model->add_user($firstname,$lastname,$email,$password,$sexe,$birthdate);
        return "";
      }
      
    } 
    public function update_user($firstname,$lastname,$email,$password,$sexe,$birthdate,$user_id){
      $user_model = new user_model();
      $email_result = $user_model->verify_email2($email);
      if ($email_result){
        //echo $email_result;
        $message = "This email is already used.";
        return $message;
      } else {
        $user_model->update_user($firstname,$lastname,$email,$password,$sexe,$birthdate,$user_id);
        return "";
      }
      
    } 
    public function login ($email, $password){
        $user_model = new user_model();
        $email_result = $user_model->verify_email($email);
        $login_err="";
        if ($email_result){
            $hashed_password = $user_model->get_password($email);
            if(password_verify($password,$hashed_password)){
                session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                           
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                           // header("location: index.php");
            }else{
                $login_err = "Invalid email or password.";
            }
          }else{
               $login_err = "Invalid email";
          }
            return $login_err;
    }
    public function get_singl_user($user_email){
      $user_model = new user_model();
      $result = $user_model->get_singl_user($user_email);
      return $result;
    }
     
    public function  get_all_users_nb(){
      $user_model = new user_model();
      $result = $user_model->get_all_users_nb();
      return $result;
    }

    public function  get_registered_users_nb(){
      $user_model = new user_model();
      $result = $user_model->get_registered_users_nb();
      return $result;
    }

    public function  get_non_registered_users_nb(){
      $user_model = new user_model();
      $result = $user_model->get_non_registered_users_nb();
      return $result;
    }

    public function  get_blocked_users_nb(){
      $user_model = new user_model();
      $result = $user_model->get_blocked_users_nb();
      return $result;
    }

    public function  get_non_blocked_users_nb(){
      $user_model = new user_model();
      $result = $user_model->get_non_blocked_users_nb();
      return $result;
    }

    public function  delete_user($user_id){
      $user_model = new user_model();
      $result = $user_model->delete_user($user_id);
      return $result;
    }

    public function show_register_page(){
       $user_view = new user_view();
       $user_view->register_page();
    }
    public function show_login_page(){
        $user_view = new user_view();
        $user_view->login_page();
     }
}



?>