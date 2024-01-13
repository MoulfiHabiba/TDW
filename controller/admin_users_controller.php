<?php
require_once('model/user_model.php');
require_once("view/admin_users_view.php");
class admin_users_controller{
    public function  get_all_users(){
        $user_model = new user_model();
        $result = $user_model->get_all_users();
        return $result;
    }
    public function show_admin_users_page(){
        $admin_users_view = new admin_users_view();
        $admin_users_view->admin_users_page();
    }
}


?>