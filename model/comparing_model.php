<?php
require_once('base.php');
class comparing_model{
    public function get_most_compare_cars(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM comparing ORDER BY count DESC LIMIT 5";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }
    public function get_vehicle_name1($vehicle_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b WHERE v.id=?  AND v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id LIMIT 1");
        $query->bindParam(1,$vehicle_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_vehicle_name2($vehicle_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM comparing c JOIN vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b WHERE c.vehicle2_id=?  AND v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id LIMIT 1");
        $query->bindParam(1,$vehicle_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function get_vehicle_informations($brand_name,$model_name,$trim_level,$year){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN vehicle_price vp  JOIN images i WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vp.vehicle_id = v.id AND v.main_img_url=i.id AND b.brand_name =? AND m.model_name=? AND t.level_name =? AND y.year =?");
        $query->bindParam(1,$brand_name);
        $query->bindParam(2,$model_name);
        $query->bindParam(3,$trim_level);
        $query->bindParam(4,$year);

        $result = $model->execute($query);
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
public function get_vehicle_features($brand_name,$model_name,$trim_level,$year){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN vehicle_features vf  JOIN features f WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vf.vehicle_id = v.id AND vf.feature_id = f.id AND b.brand_name =? AND m.model_name=? AND t.level_name =? AND y.year =?");
    $query->bindParam(1,$brand_name);
    $query->bindParam(2,$model_name);
    $query->bindParam(3,$trim_level);
    $query->bindParam(4,$year);

    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_engine($brand_name,$model_name,$trim_level,$year){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN engine e WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND v.engine_id=e.id AND b.brand_name =? AND m.model_name=? AND t.level_name =? AND y.year =?");
    $query->bindParam(1,$brand_name);
    $query->bindParam(2,$model_name);
    $query->bindParam(3,$trim_level);
    $query->bindParam(4,$year);

    $result = $model->execute($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_interior_colors($brand_name,$model_name,$trim_level,$year){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN interior_colors ic JOIN vehicle_interior_colors vic WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vic.vehicle_id=v.id AND vic.interior_color_id=ic.id AND b.brand_name =? AND m.model_name=? AND t.level_name =? AND y.year =?");
    $query->bindParam(1,$brand_name);
    $query->bindParam(2,$model_name);
    $query->bindParam(3,$trim_level);
    $query->bindParam(4,$year);

    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
public function get_vehicle_exterior_colors($brand_name,$model_name,$trim_level,$year){
    $model = new base();
    $c = $model->connect();
    $query = $c->prepare("SELECT * FROM  vehicle v JOIN years y JOIN trim_level t JOIN models m JOIN brands b JOIN exterior_colors ec JOIN vehicle_exterior_colors vec WHERE  v.year_id=y.id AND v.trim_level_id=t.id AND t.model_id = m.id AND m.brand_id=b.id AND vec.vehicle_id=v.id AND vec.exterior_color_id=ec.id AND b.brand_name =? AND m.model_name=? AND t.level_name =? AND y.year =?");
    $query->bindParam(1,$brand_name);
    $query->bindParam(2,$model_name);
    $query->bindParam(3,$trim_level);
    $query->bindParam(4,$year);

    $result = $model->execute2($query);
    $model->disconect($c);
    return $result;
}
}
?>