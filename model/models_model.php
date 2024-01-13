<?php
require_once('base.php');
class models_model{
    public function get_all_models(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM models";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }

    public function get_singl_model($model_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM models WHERE id = ?");
        $query->bindParam(1,$model_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_models_for_brand(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM models m JOIN brands b WHERE m.brand_id=b.id";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    
    }
    public function get_models_nb(){
        $model = new base();
        $c = $model->connect();
        $query ="SELECT COUNT(m.id) nb FROM models m JOIN brands b WHERE m.brand_id=b.id";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
        
    }
    
}


?>