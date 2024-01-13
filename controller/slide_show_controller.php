<?php
require_once("model/slide_show_model.php");
class slide_show_controller{
    public function get_all_slide_show(){
        $slide_show_model = new slide_show_model();
        $result = $slide_show_model->get_all_slide_show();
        return $result;
    }
    public function add_slide_show($img_url, $link){
        $slide_show_model = new slide_show_model();
        $result = $slide_show_model->add_slide_show($img_url, $link);
        return $result;
    }
    public function update_slide_show($img_url, $link, $id){
        $slide_show_model = new slide_show_model();
        $result = $slide_show_model->update_slide_show($img_url, $link, $id);
        return $result;
    }

    public function get_slide_show_nb(){
        $slide_show_model = new slide_show_model();
        $result = $slide_show_model->get_slide_show_nb();
        return $result;
    }
}



?>