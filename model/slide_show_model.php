<?php
require_once("base.php");
class slide_show_model{
    public function get_all_slide_show(){
        $model = new base();
        $c = $model->connect();
        $query = "SELECT * FROM slide_show s JOIN images i WHERE s.img_id = i.id";
        $result = $model->request($c,$query);
        $model->disconect($c);
        return $result;
    }
    private function insert_img($img_url){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("INSERT INTO images (img_url) values(?)");
        $query->bindParam(1,$img_url);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    private function update_img($img_url, $img_id){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("UPDATE images SET img_url = ? WHERE id = ?");
        $query->bindParam(1,$img_url);
        $query->bindParam(1,$img_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }

    private function get_img_id($img_url){
        $model = new base();
        $c = $model->connect();
        $query = $c->prepare("SELECT id FROM images WHERE img_url = ?");
        $query->bindParam(1,$img_url);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function add_slide_show($img_url, $link){
        $model = new base();
        $c = $mode->connect();
        $this->insert_img($img_url);
        $img_id = $this->get_img_id($img_url);
        $img_id = $img_id['id'];
        $query = $c->prepare("INSERT INTO slide_show (link, img_id) VALUES (?,?)");
        $query->bindParam(1,$link);
        $query->bindParam(2,$img_id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;

    }
    public function get_single_slide_show($id){
        $model = new base();
        $c = $mode->connect();
        $query = $c->prepare("SELECT  FROM slide_show WHERE id = ?");
        $query->bindParam(1,$id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
    public function update_slide_show($img_url, $link, $id){
        $model = new base();
        $c = $mode->connect();
        $slide = $this->get_single_slide_show($id);
        $img_id = $slide['img_id'];
        $this->update_img($img_url, $img_id);
        $query = $c->prepare("UPDATE slide_show SET link = ? WHERE id = ?");
        $query->bindParam(1,$id);
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }

    public function get_slide_show_nb(){
        $model = new base();
        $c = $model->connect();
        $query =  $c->prepare("SELECT COUNT(id) nb FROM slide_show");
        $result = $model->execute($query);
        $model->disconect($c);
        return $result;
    }
   
}



?>