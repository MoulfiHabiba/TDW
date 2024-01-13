<?php
require_once("controller/brand_controller.php");
require_once("base_view.php");
class brand_view{
    public function main_section($brand_id){
        $brands_controller = new brands_controller();
        $result = $brands_controller->get_singl_brand($brand_id);
        $brand_name = $result['brand_name'];
        $country_of_origin = $result['Country_of_origin'];
        $year = $result['year'];
        $logo = $result['img_url'];
        ?>
        <div class="single-brand">
            <div class=" item main-item"> 
                <h2><?php echo $brand_name; ?></h2>
                <img src="/AutoClash/media/<?php echo $logo; ?>" alt="">
            </div>
            <div class="item">
                <p>Country of origin</p>
                <p class="value"><?php echo $country_of_origin; ?></p>
            </div>
            <div class="item">
                <p>Production years</p>
                <p class="value"><?php echo $year; ?></p>
            </div>
        </div>
        <?php

        
    }
    public function main_vehicles($brand_id){
        $brand_controller = new brand_controller();
        $result = $brand_controller->get_brand_main_vehicles($brand_id);

        ?>
        <div class="vehicles">
        <h2>Main Vehicles</h2>

            <ul>
            <?php
            foreach($result as $vehicle){
                $brand_name = $vehicle['brand_name'];
                $model_name = $vehicle['model_name'];
                $level_name = $vehicle['level_name'];
                $year = $vehicle['year'];
                $img_url = $vehicle['img_url'];
                $vehicle_id = $vehicle['vehicle_id'];
            ?>
            <li>
                 <a href="/AutoClash/vehicle/<?php echo $vehicle_id ;?>">
                  <img src="/AutoClash/media/<?php echo $img_url; ?>" alt="">
                </a>
                <p><?php  echo $year.' '.$brand_name.' '.$model_name.' '.$level_name; ?></p>
            </li>


            
            </ul>
        </div>
        <?php
            




        }

        

    }
    public function all_vehicles($brand_id){
        $brand_controller = new brand_controller();
        $result = $brand_controller->get_brand_vehicles($brand_id);

        ?>
        <div class="all-vehicles">
        <h2>All Vehicles</h2>

            <ul>
            <?php
            foreach($result as $vehicle){
                $brand_name = $vehicle['brand_name'];
                $model_name = $vehicle['model_name'];
                $level_name = $vehicle['level_name'];
                $year = $vehicle['year'];
                $img_url = $vehicle['img_url'];
                $vehicle_id = $vehicle['vehicle_id'];
            ?>
            <li>
                 <a href="/AutoClash/vehicle/<?php echo $vehicle_id ;?>">
                  <img src="/AutoClash/media/<?php echo $img_url; ?>" alt="">
                </a>
                <p><?php  echo $year.' '.$brand_name.' '.$model_name.' '.$level_name; ?></p>
            </li>


            
            </ul>
        </div>
        <?php
            




        }

        

    }

    public function brand_page($brand_id){
        $base_view = new base_view();
        $base_view->navbar2();
        $base_view->sections_menu();
        //$base_view->brands();
        $this->main_section($brand_id);
        $this->main_vehicles($brand_id);
        $this->all_vehicles($brand_id);
        $base_view->buying_guide();
        $base_view->most_popular_comparisons();
        $base_view->footer();
    }
    
}


?>