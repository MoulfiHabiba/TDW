<?php
require_once('model/comparing_model.php');
require_once('view/comparing_view.php');
class comparing_controller{
    public function get_most_compare_cars(){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_most_compare_cars();
        return $result;
    }
    public function get_vehicle_name1($vehicle_id){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_vehicle_name1($vehicle_id);
        return $result;
    }
    public function get_vehicle_name2($vehicle_id){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_vehicle_name2($vehicle_id);
        return $result;
    }
    public function get_vehicle_informations($brand_name,$model_name,$trim_level,$year){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_vehicle_informations($brand_name,$model_name,$trim_level,$year);
        return $result;
    }

    public function get_vehicle_features($brand_name,$model_name,$trim_level,$year){
            $comparing_model = new comparing_model();
            $result = $comparing_model->get_vehicle_features($brand_name,$model_name,$trim_level,$year);
            return $result;
    }

    public function get_vehicle_engine($brand_name,$model_name,$trim_level,$year){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_vehicle_engine($brand_name,$model_name,$trim_level,$year);
        return $result;
    }

    public function get_vehicle_interior_colors($brand_name,$model_name,$trim_level,$year){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_vehicle_interior_colors($brand_name,$model_name,$trim_level,$year);
        return $result;
    }

    public function get_vehicle_exterior_colors($brand_name,$model_name,$trim_level,$year){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_vehicle_exterior_colors($brand_name,$model_name,$trim_level,$year);
        return $result;
    }

    public function get_all_features_name(){
        $comparing_model = new comparing_model();
        $result = $comparing_model->get_all_features_name();
        return $result;
    }

    public function show_comparing_page(){
        $comparing_view = new comparing_view();
        $comparing_view->comparing_page();
    }
}
?>