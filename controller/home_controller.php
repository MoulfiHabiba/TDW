<?php
require_once("view/base_view.php");
class home_controller{
    public function show_home_page(){
        $base_view = new base_view();
        $base_view->home_page();
    }
}



?>