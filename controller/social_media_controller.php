<?php
require_once("model/social_media_model.php");
class social_media_controller{
    
    public function get_all_social_media(){
        $socila_media_model = new social_media_model();
        $result = $socila_media_model->get_all_social_media();
        return $result;
     
    }
    public function get_single_social_media($media_id){
        $socila_media_model = new social_media_model();
        $result = $socila_media_model->get_single_social_media($media_id);
        return $result;
     
    }
    public function add_social_media($media_name, $media_link){
        $socila_media_model = new social_media_model();
        $result = $socila_media_model->add_social_media($media_name, $media_link);
        return $result;
     
    }
    public function update_social_media($media_name, $media_link, $media_id){
        $socila_media_model = new social_media_model();
        $result = $socila_media_model->update_social_media($media_name, $media_link, $media_id);
        return $result;
     
    }
}



?>