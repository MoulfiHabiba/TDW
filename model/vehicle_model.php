<?php
require_once('base.php');
class vehicle_model{
   
   
public function get_vehicle_informations($vehicle_id){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN vehicle_price vp  JOIN images i WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vp.vehicle_id = v.id AND v.main_img_url=i.id AND v.id = ?");
    $query->bindParam(1,$vehicle_id);
    
    $result = $model->execute($query);
    $model->disconect($c);
    return $result;
  
}
public function get_all_vehicles(){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT *  FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN vehicle_price vp  JOIN images i WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vp.vehicle_id = v.id AND v.main_img_url=i.id ");
    
    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
  
}
public function get_all_features_name(){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT feature_name FROM features GROUP BY feature_name");
    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_features($vehicle_id){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN vehicle_features vf  JOIN features f WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vf.vehicle_id = v.id AND vf.feature_id = f.id AND v.id=?");
    $query->bindParam(1,$vehicle_id);
    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_engine($vehicle_id){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN engine e WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND v.engine_id=e.id AND v.id=?");
    $query->bindParam(1,$vehicle_id);
    $result = $model->execute($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_interior_colors($vehicle_id){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN interior_colors ic JOIN vehicle_interior_colors vic WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vic.vehicle_id=v.id AND vic.interior_color_id=ic.id AND v.id=?");
    $query->bindParam(1,$vehicle_id);


    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_exterior_colors($vehicle_id){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN exterior_colors ec JOIN vehicle_exterior_colors vec WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vec.vehicle_id=v.id AND vec.exterior_color_id=ec.id AND v.id_?");
    $query->bindParam(1,$vehicle_id);
    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_interior_images($vehicle_id){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN images i JOIN vehicle_images vi WHERE v.id=vi.vehicle_id AND vi.img_id = i.id AND vi.is_interior =1 AND v.id=?");
    $query->bindParam(1,$vehicle_id);


    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_exterior_images($vehicle_id){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN images i JOIN vehicle_images vi WHERE v.id=vi.vehicle_id AND vi.img_id = i.id AND vi.is_interior =0 AND v.id=?");
    $query->bindParam(1,$vehicle_id);


    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}

public function get_vehicle_nb(){
    $model = new base();
    $c = $model->connect();
    $query =  $c->prepare("SELECT COUNT(id) nb FROM vehicle");
    $result = $model->execute($query);
    $model->disconect($c);
    return $result;
}
}
?>