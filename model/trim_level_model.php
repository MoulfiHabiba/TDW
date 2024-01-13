<?php
require_once('base.php');
class trim_level_model{
    public function get_all_trim_level(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM trim_level";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }

    public function get_singl_trim_level($trim_level_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM trim_level WHERE id = ?");
        $query->bindParam(1,$trim_level_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_trim_level_for_model(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM trim_level t JOIN models m WHERE t.model_id=m.id";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    
    }
    public function get_year_for_trim_level(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM `trim_level` `t` JOIN models m JOIN `vehicle` `v` JOIN `years` `y` WHERE t.model_id = m.id AND `t`.`id`=`v`.`trim_level_id` AND `v`.`year_id`=`y`.`id`";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    
    }
    public function get_trim_level_nb(){
        $model = new base();
        $c = $model->connect();
        $query ="SELECT COUNT(m.id) nb FROM trim_level t JOIN models m WHERE t.model_id=m.id";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
        
    }
    public function get_vehicle_nb(){
        $model = new base();
        $c = $model->connect();
        $query ="SELECT COUNT(v.id) nb FROM `trim_level` `t` JOIN models m JOIN `vehicle` `v` JOIN `years` `y` WHERE t.model_id = m.id AND `t`.`id`=`v`.`trim_level_id` AND `v`.`year_id`=`y`.`id`";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
        
    }
    
}


?>