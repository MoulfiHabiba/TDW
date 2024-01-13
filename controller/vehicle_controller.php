<?php
require_once('model/vehicle_model.php');
require_once('view/vehicle_view.php');
class vehicle_controller{
    
    
    public function get_vehicle_informations($vehicle_id){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_vehicle_informations($vehicle_id);
        return $result;
    }

    public function get_vehicle_features($vehicle_id){
            $vehicle_model = new vehicle_model();
            $result = $vehicle_model->get_vehicle_features($vehicle_id);
            return $result;
    }

    public function get_vehicle_engine($vehicle_id){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_vehicle_engine($vehicle_id);
        return $result;
    }

    public function get_vehicle_interior_images($vehicle_id){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_vehicle_interior_images($vehicle_id);
        return $result;
    }

    public function get_vehicle_exterior_images($vehicle_id){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_vehicle_exterior_images($vehicle_id);
        return $result;
    }

    public function get_vehicle_interior_colors($vehicle_id){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_vehicle_interior_colors($vehicle_id);
        return $result;
    }

    public function get_vehicle_exterior_colors($vehicle_id){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_vehicle_exterior_colors($vehicle_id);
        return $result;
    }

    public function get_all_features_name(){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_all_features_name();
        return $result;
    }

    public function get_vehicle_nb(){
        $vehicle_model = new vehicle_model();
        $result = $vehicle_model->get_vehicle_nb();
        return $result;
    }

    public function show_vehicle_page($vehicle_id){
        $vehicle_view = new vehicle_view();
        $vehicle_view->vehicle_page($vehicle_id);
    }
}
?>