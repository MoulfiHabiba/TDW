<?php
require_once("controller/admin_brands_controller.php");
require_once("admin_users_view.php");
class admin_brands_view{
    public function small_navbar(){
        ?>  <div class="nav-box">
            <div class="small-navbar">
                <div id="brandsButton" class="active-btn">Brands</div>
                <div id="vehiclesButton">Vehicles</div>
            </div>
            </div>
        <?php
    }
    public function all_brands_section(){
        $admin_brands_controller = new admin_brands_controller();
        $result = $admin_brands_controller->get_all_brands();
        ?>
          <div class="table" id="brandsSection">
      <table id="example" class="display example" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Logo</th>
                <th>Brand Name</th>
                <th>Country of origin</th>
                <th>Production year</th>
                <th>is_main</th>
                <th>created_at</th>
                
            </tr>
        </thead>
        <tbody>
          <?php
          foreach($result as $row){
            $brand_id = $row['brand_id'];
            $img_url = $row['img_url'];
            $brand_name = $row['brand_name'];
            $Country_of_origin = $row['Country_of_origin'];
            $year = $row['year'];
            $is_main = $row['is_main'];
            $created_at = $row['created_at'];
            echo'
            <tr>
                <td>'.$brand_id.'</td>
                <td><img class="logo" src="/AutoClash/media/'.$img_url.'" alt="'.$brand_name.'"></td>
                <td>'.$brand_name.'</td>
                <td>'.$Country_of_origin.'</td>
                <td>'.$year.'</td>
                <td>'.$is_main.'</td>
                <td>'.$created_at.'</td>
            </tr>
                 
            ';
          }
          ?>
          
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Logo</th>
                <th>Brand Name</th>
                <th>Country of origin</th>
                <th>Production year</th>
                <th>is_main</th>
                <th>created_at</th>
            </tr>
        </tfoot>
      </table>

  </div>   
        <?php
    }

    public function all_vehicles_section(){
        $admin_brands_controller = new admin_brands_controller();
        $result = $admin_brands_controller->get_all_vehicles();
        ?>
          <div class="table" id="vehiclesSection" >
      <table id="example1" class="display example" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Year</th>
                <th>Trim Level</th>
                <th>Model Name</th>
                <th>Brand Name</th>
                <th>Price Start</th>
                <th>Price End</th>
               
                
            </tr>
        </thead>
        <tbody>
          <?php
          foreach($result as $row){
            $vehicle_id = $row['vehicle_id'];
            $year = $row['year'];
            $level_name = $row['level_name'];
            $model_name = $row['model_name'];
            $brand_name = $row['brand_name'];
            $start_price = $row['start_price'];
            $end_price = $row['end_price'];
            //$created_at = $row['created_vehicle'];
            echo'
            <tr>
                <td>'.$vehicle_id.'</td>
                <td>'.$year.'</td>
                <td>'.$level_name.'</td>
                <td>'.$model_name.'</td>
                <td>'.$brand_name.'</td>
                <td>'.$start_price.'</td>
                <td>'.$end_price.'</td>
                
            </tr>
                 
            ';
          }
          ?>
          
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Year</th>
                <th>Trim Level</th>
                <th>Model Name</th>
                <th>Brand Name</th>
                <th>Price Start</th>
                <th>Price End</th>
                
            </tr>
        </tfoot>
      </table>

  </div>   
        <?php
    }

    public function admin_brands_page(){
        $admin_users_view = new admin_users_view();
        $admin_users_view->navbar();
        $this->small_navbar();
        $this->all_brands_section();
        $this->all_vehicles_section();
        $admin_users_view->footer();

    }
}

?>