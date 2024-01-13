<?php
require_once('model/brands_model.php');
require_once('view/brands_view.php');
class brands_controller{
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
    public function get_brands_nb(){
        $brands_model =new brands_model();
        $result = $brands_model->get_brands_nb();
        return $result;
    }
    public function show_brands_page(){
        $brands_view = new brands_view();
        $brands_view->brands_page();
    }
}
?>