<?php
require_once('model/models_model.php');
class models_controller{
    public function get_all_models(){
        $models_model = new models_model();
        $result = $models_model->get_all_models();
        return $result;
    }

    public function get_singl_model($model_id){
        $models_model = new models_model();
        $result = $models_model->get_singl_model($model_id);
        return $result;
    }
    public function get_models_for_brand(){
        $models_model = new models_model();
        $result = $models_model->get_models_for_brand();
        return $result;

    }
    public function get_models_nb(){
        $models_model = new models_model();
        $result = $models_model->get_models_nb();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $nb =  $row['nb'];
        return $nb;

    }
}
?>