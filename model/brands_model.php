<?php
require_once('base.php');
class brands_model{
    public function get_all_brands(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * , b.id brand_id FROM brands b JOIN images i JOIN years y WHERE b.logo_url_id = i.id AND b.year_id = y.id";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }
    public function get_main_brands(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT *  FROM brands b JOIN images i WHERE b.logo_url_id = i.id AND is_main=1";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }
    public function get_singl_brand($brand_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * , b.id brand_id FROM brands b JOIN images i  JOIN years y WHERE b.logo_url_id = i.id AND b.year_id=y.id AND b.id = ?");
        $query->bindParam(1,$brand_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_brand_main_vehicles($brand_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * , v.id vehicle_id FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b  JOIN images i WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id  AND v.main_img_url=i.id AND v.is_main=1 AND b.id = ?");
        $query->bindParam(1,$brand_id);
       
        $result = $model->execute2($query);
        $model->disconect($c);
        return $result;
    }
    public function get_brand_vehicles($brand_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * , v.id vehicle_id FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b  JOIN images i WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id  AND v.main_img_url=i.id  AND b.id = ?");
        $query->bindParam(1,$brand_id);
       
        $result = $model->execute2($query);
        $model->disconect($c);
        return $result;
    }
    public function get_brand_models($brand_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM  models WHERE  brand_id = ?");
        $query->bindParam(1,$brand_id);
       
        $result = $model->execute2($query);
        $model->disconect($c);
        return $result;
    }

    public function get_brands_nb(){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("SELECT COUNT(id) nb FROM brands");
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    
}


?>