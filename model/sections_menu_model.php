<?php
require_once("base.php");
class sections_menu_model{
    public function get_all_sections(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM sections_menu";
        $result = $model->request($c, $query);
        $model->disconect($c);
        return $result;
    }
    public function add_section($section_name, $section_link){
        $model = new $base();
        $c = $model->connect();
        $query = $c->prepare("INSERT INTO sections_menu (section_name, section_link) VALUES(?,?)");
        $query->bindParam(1,$section_name);
        $query->bindParam(2,$section_link);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function update_section($section_name, $section_link, $section_id){
        $model = new $base();
        $c = $model->connect();
        $query = $c->prepare("UPDATE sections_menu SET section_name = ?, section_link = ? WHERE id = ?");
        $query->bindParam(1,$section_name);
        $query->bindParam(2,$section_link);
        $query->bindParam(3,$section_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    
}



?>