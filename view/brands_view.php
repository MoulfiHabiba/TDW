<?php
require_once("controller/brands_controller.php");
require_once("base_view.php");
class brands_view{
    public function all_brands(){
        $brands_controller = new brands_controller();
        $result = $brands_controller->get_all_brands();
        ?>
        <div class="all-brands">
            <h2>Car brands</h2>
            <ul>
            <?php 
                foreach($result as $row){
                    echo '<li id ="'.$row['id'].'"> <a href="brand/'.$row['brand_id'].'"><img src="/AutoClash/media/'.$row['img_url'].'" alt="'.$row['brand_name'].'"></a>
                    <p>'.$row['brand_name'].'</p>
                          </li>';
                }
                ?>
                
            </ul>
        </div>
        <?php
    }
    public function brands_page(){
        $base_view = new base_view();
        $base_view->navbar2();
        $base_view->sections_menu();
        //$base_view->brands();
       $this->all_brands();
        $base_view->buying_guide();
        $base_view->most_popular_comparisons();
        $base_view->footer();
    }
    
}


?>