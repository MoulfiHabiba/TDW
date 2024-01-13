<?php
require_once("base.php");
class social_media_model {
    public function get_all_social_media(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM social_media";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }
    public function get_singl_social_media($media_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT * FROM social_media WHERE id = ?");
        $query->bindParam(1,$media_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function add_social_media($media_name, $media_link){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("INSERT INTO social_media (media_name, media_link) VALUES (?,?)");
        $query->bindParam(1,$media_name);
        $query->bindParam(2,$media_link);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function update_social_media($media_name, $media_link, $media_id){
        $model = new base();
        $c = $model->connect();
        $query = "UPDATE social_media SET media_name = ?, media_link= ? WHERE id = ?";
        $query->bindParam(1,$media_name);
        $query->bindParam(2,$media_link);
        $query->bindParam(3,$media_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
}


?>