<?php
require_once("model/admin_model.php");
require_once('view/admin_view.php');
class admin_controller{
    public function register($admin_name,$password){
      $admin_model = new admin_model();
      $name_result = $admin_model->verify_admin_name($admin_name);
      if ($name_result){
        $message = "This name is already used.";
        return $message;
      } else {
        $admin_model->add_admin($admin_name,$password);
        return "";
      }
      
    } 
    public function login ($admin_name,$password){
        $admin_model = new admin_model();
        $name_result = $admin_model->verify_admin_name($admin_name);
        $login_err="";
        if ($name_result){
            $hashed_password = $admin_model->get_password($admin_name);
            if(password_verify($password,$hashed_password)){
                session_start();
                            
                            // Store data in session variables
                            $_SESSION["admin_loggedin"] = true;
                           
                            $_SESSION["admin_name"] = $admin_name;                            
                            
                            // Redirect user to welcome page
                           // header("location: index.php");
            }else{
                $login_err = "Invalid name or password.";
            }
          }else{
               $login_err = "Invalid name";
          }
            return $login_err;
    }
  

    // public function show_register_page(){
    //    $admin_view = new admin_view();
    //    $admin_view->register_page();
    // }
    public function show_login_page(){
        $admin_view = new admin_view();
        $admin_view->login_page();
     }

     public function show_home_page(){
        $admin_view = new admin_view();
        $admin_view->home_page();
     }

}



?>