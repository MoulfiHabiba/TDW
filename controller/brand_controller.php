<?php
require_once('model/brands_model.php');
require_once('view/brand_view.php');
class brand_controller{
    public function get_all_brands(){
        $brands_model = new brands_model();
        $result = $brands_model->get_all_brands();
        return $result;
    }
    public function get_main_brands(){
        $brands_model = new brands_model();
        $result = $brands_model->get_main_brands();
        return $result;
    }
    public function get_singl_brand($brand_id){
        $brands_model = new brands_model();
        $result = $brands_model->get_singl_brand($brand_id);
        return $result;
    }

    public function get_brand_main_vehicles($brand_id){
        $brands_model = new brands_model();
        $result = $brands_model->get_brand_main_vehicles($brand_id);
        return $result;
    }

    public function get_brand_vehicles($brand_id){
        $brands_model = new brands_model();
        $result = $brands_model->get_brand_vehicles($brand_id);
        return $result;
    }
   

    public function show_brand_page($brand_id){
        $brands_view = new brand_view();
        $brands_view->brand_page($brand_id);
    }
}
?>