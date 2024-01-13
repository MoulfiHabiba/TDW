<?php
require_once("model/sections_menu_model.php");
class sections_menu_controller{
    public function get_all_sections(){
        $sections_menu_model = new sections_menu_model();
        $result = $sections_menu_model->get_all_sections();
        return $result;
    }
    public function add_section($section_name, $section_link){
        $sections_menu_model = new sections_menu_model();
        $result = $sections_menu_model->add_section($section_name, $section_link);
        return $result;
    }
    public function update_section($section_name, $section_link, $section_id){
        $sections_menu_model = new sections_menu_model();
        $result = $sections_menu_model->update_section($section_name, $section_link, $section_id);
        return $result;
    }
}



?>