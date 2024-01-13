<?php
require_once('model/brands_model.php');
require_once('model/vehicle_model.php');
require_once("view/admin_brands_view.php");
class admin_brands_controller{
    public function  get_all_brands(){
        $brands_model = new brands_model();
        $result = $brands_model->get_all_brands();
        return $result;
    }
    public function get_all_vehicles(){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_all_vehicles();
        return $result;
    }
    public function show_admin_brands_page(){
        $admin_brands_view = new admin_brands_view();
        $admin_brands_view->admin_brands_page();
    }
}


?>