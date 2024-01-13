<?php
require_once('model/trim_level_model.php');
class trim_level_controller{
    public function get_all_trim_level(){
        $trim_level_model = new trim_level_model();
        $result = $trim_level_model->get_all_trim_level();
        return $result;
    }

    public function get_singl_trim_level($trim_level_id){
        $trim_level_model = new trim_level_model();
        $result = $trim_level_model->get_singl_trim_level($trim_level_id);
        return $result;
    }
    public function get_trim_level_for_model(){
        $trim_level_model = new trim_level_model();
        $result = $trim_level_model->get_trim_level_for_model();
        return $result;

    }
    public function get_year_for_trim_level(){
        $trim_level_model = new trim_level_model();
        $result = $trim_level_model->get_year_for_trim_level();
        return $result;

    }
    public function get_trim_level_nb(){
        $trim_level_model = new trim_level_model();
        $result = $trim_level_model->get_trim_level_nb();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $nb =  $row['nb'];
        return $nb;

    }
    public function get_vehicle_nb(){
        $trim_level_model = new trim_level_model();
        $result = $trim_level_model->get_vehicle_nb();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $nb =  $row['nb'];
        return $nb;

    }
}
?>