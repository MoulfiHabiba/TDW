<?php
require_once("controller/vehicle_controller.php");
require_once('base_view.php');
class vehicle_view{
    public function main_section($vehicle_id){
        $vehicle_controller = new vehicle_controller();
        $vehicle_informations = $vehicle_controller->get_vehicle_informations($vehicle_id);
        $brand = $vehicle_informations['brand_name'];
        $model = $vehicle_informations['model_name'];
        $trim = $vehicle_informations['level_name'];
        $year = $vehicle_informations['year'];
        $main_img = $vehicle_informations['img_url'];
        ?>
        <div class="vehicle_main">
            <div class="vehicle_content">
                
                <h2><?php echo $year.'  '.$brand.'  '.$model.'  '.$trim; ?></h2>
                <p>like</p>
                <p>comment</p>
                
            </div>
            <img src="<?php echo '/AutoClash/media/'.$main_img; ?>" alt="">

        </div>
        <?php

    }
    public function vehicle_features($vehicle_id){
        $vehicle_controller = new vehicle_controller();
        $vehicle_informations = $vehicle_controller->get_vehicle_informations($vehicle_id);
        $start_price = $vehicle_informations['start_price'];
        $end_price = $vehicle_informations['end_price'];
        $vehicle_features = $vehicle_controller->get_vehicle_features($vehicle_id);
        $vehicle_engine = $vehicle_controller->get_vehicle_engine($vehicle_id);
        $engine_power = $vehicle_engine['engine_power'];
        $engine_torque = $vehicle_engine['engine_torque'];
        $engine_displacement = $vehicle_engine['engine_displacement'];
        $engine_configuration = $vehicle_engine['engine_configuration'];
        $drivetrain = $vehicle_engine['drivetrain'];
        $transmission = $vehicle_engine['transmission'];
        $tire_size_front = $vehicle_engine['tire_size_front'];
        $tire_size_rear = $vehicle_engine['tire_size_rear'];
        $fuel_type = $vehicle_engine['fuel_type'];
        $vehicle_interior_images = $vehicle_controller->get_vehicle_interior_images($vehicle_id);
        $vehicle_exterior_images = $vehicle_controller->get_vehicle_exterior_images($vehicle_id);

        ?>
        <div class="features">
            <h2>Features</h2>
           <div class="feature">
            <p class="title">Price</p>
            <p class="value"><?php echo '$ '.$start_price.' $ '.$end_price.''; ?></p>
           </div>
            <?php
            foreach($vehicle_features as $feature){
                $feature_name = $feature['feature_name'];
                $feature_value = $feature['feature_value'];
                echo '<div class="feature">
                       <p class="title">'.$feature_name.'</p>
                       <p class="value">'.$feature_value.'</p>
                      </div>';
            }
            ?>
          <h2>Engine</h2>
          <div class="feature">
            <p class="title">Engine Power</p>
            <p class="value"><?php echo $engine_power; ?></p>
           </div>
           <div class="feature">
            <p class="title">Engine Torque</p>
            <p class="value"><?php echo $engine_torque; ?></p>
           </div>
           <div class="feature">
            <p class="title">Engine Displacement</p>
            <p class="value"><?php echo $engine_displacement; ?></p>
           </div>
           <div class="feature">
            <p class="title">Engine Configuration</p>
            <p class="value"><?php echo $engine_configuration; ?></p>
           </div>
           <div class="feature">
            <p class="title">Drivetrain</p>
            <p class="value"><?php echo $drivetrain; ?></p>
           </div>
           <div class="feature">
            <p class="title">Transmission</p>
            <p class="value"><?php echo $transmission; ?></p>
           </div>
           <div class="feature">
            <p class="title">Tire Size Front</p>
            <p class="value"><?php echo $tire_size_front; ?></p>
           </div>
           <div class="feature">
            <p class="title">Tire Size Rear</p>
            <p class="value"><?php echo $tire_size_rear; ?></p>
           </div>
           
           <div class="feature">
            <p class="title">Fuel Type</p>
            <p class="value"><?php echo $fuel_type; ?></p>
           </div>


        </div>
        <div class="images_container">
        <h2>Images</h2>
        <h3>1.Exterior Images</h3>
        <div class="images">
            <?php
            foreach($vehicle_exterior_images as $image) {
                echo'<img src="/AutoClash/media/'.$image['img_url'].'" alt="vehicle">';
            }
            ?>
        </div>
        <h3>2.Interior Images</h3>
        <div class="images">
            <?php
            foreach($vehicle_interior_images as $image) {
                echo'<img src="/AutoClash/media/'.$image['img_url'].'" alt="vehicle">';
            }
            ?>
        </div>
        </div>

        <?php

    }
    public function compare_vehicle($vehicle_id){

        $vehicle_controller = new vehicle_controller();
        $vehicle_informations = $vehicle_controller->get_vehicle_informations($vehicle_id);
        $brand = $vehicle_informations['brand_name'];
        $js_brand = json_encode($brand);
        $model = $vehicle_informations['model_name'];
        $js_model = json_encode($model);
        $trim = $vehicle_informations['level_name'];
        $js_trim = json_encode($trim);
        $year = $vehicle_informations['year'];
        $js_year = json_encode($year);
        ?>
        <div class="btn-container">
        <a class="compare-btn"  id="compare-btn-vehicle" href="#container">Compare</a>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
              var btn = document.getElementById('compare-btn-vehicle');

              btn.addEventListener('click', function () {
                var formData = {};
                formData['brand'] = <?php echo $js_brand ; ?>;
                formData['model'] = <?php echo $js_model ; ?>;
                formData['trim'] = <?php echo $js_trim ;?>;
                formData['year'] = <?php echo $js_year ;?>;
                localStorage.setItem(1, JSON.stringify(formData));
                localStorage.setItem("is_submited"+1,1 );
                localStorage.setItem("submitedFormNb",1 );
                btn.href="/AutoClash/comparing";
            
    });
});
        </script>
        <?php
        
    }
    public function vehicle_page($vehicle_id){
        $base_view = new base_view();
        $base_view->navbar2();
        $base_view->sections_menu();
        //$base_view->brands();
        $this->main_section($vehicle_id);
        $this->vehicle_features($vehicle_id);
        $this->compare_vehicle($vehicle_id);
        $base_view->buying_guide();
        $base_view->most_popular_comparisons();
        $base_view->footer();
    }
}


?>