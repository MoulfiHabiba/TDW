<?php
require_once("controller/social_media_controller.php");
require_once("controller/slide_show_controller.php");
require_once("controller/sections_menu_controller.php");
require_once("controller/brands_controller.php");
require_once("controller/models_controller.php");
require_once("controller/trim_level_controller.php");
require_once("controller/comparing_controller.php");
require_once("controller/user_controller.php");
class base_view{
    public function navbar(){
        $social_media_controller = new social_media_controller();
        $result = $social_media_controller->get_all_social_media();
        $user_controller = new user_controller();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/AutoClash/styles/main.css">
            <title>AutoClash</title>
        </head>
        <body>
            <nav>
                <div class="logo">
                    <img src="/AutoClash/media/Logo_white1.svg" alt="logo">
                </div>
                <div class="social_media">
                    <ul>
                        <?php
                        foreach($result as $row){
                            $media_name = $row["media_name"];
                            $media_link = $row["media_link"];
                            $media_id = $row["id"];
                            echo '<li  id="'.$media_id.'"> <a href= "'.$media_link.'" target="_blank">'.$media_name.'</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
                <?php
                     session_start();

                     // Check if the form is submitted
                     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_session'])) {
                     // Clear specific session variables
                         unset($_SESSION['loggedin']);
                         unset($_SESSION['email']);
                    // Redirect back to the page
                         header("Location:user/login");
                         exit();
                    }
                                           

                     // Check if a session variable exists
                     if (isset($_SESSION['loggedin']) && isset($_SESSION['email'])) {
                         
                         $email = $_SESSION['email'];
                         $user =$user_controller->get_singl_user($email);
                         $first_name = $user['firstname'];
                         $last_name = $user['lastname'];
                         $profil_img = $user['img_url'];
                         echo '<div class="user-profil">
                                
                                 <a href="#" id="profile_img"> <img src="media/'.$profil_img.'" alt="user profil"></a>
                               </div>';
                               ?>
                               <div class="sub-menu-wrap" id="sub_menu">
                                <div class="sub-menu">
                                    <div class="user-info">
                                        <img src="media/<?php echo $profil_img; ?>" alt="user profile">
                                        <h3><?php echo $first_name.' '.$last_name ?></h3>
                                    </div>
                                    <hr>
                                    <a href="#" class="sub-menu-link">
                                        <img src="media/profile.png" alt="my profile">
                                        <p>My Profile</p>
                                        <span>></span>
                                    </a>
                                    <a href="#" class="sub-menu-link" id="logoutLink">
                                        <img src="media/logout.png" alt="logout">
                                        <p>Logout</p>
                                        <span>></span>
                                    </a>
                                    
                                </div>
                               </div>
                              

                               <?php
                     } else {
                         // Session variable 'username' doesn't exist
                         echo '<a class="auth_btn" href="user/login">Login</a>';
                     }

                ?>
                 <form id="logoutForm" action="" method="post">
                        <input type="hidden" name="clear_session" value="1">
                 </form>
            </nav>
            <!-- <div class="line"></div> -->
        
        <?php
    }
    public function navbar2(){
        $social_media_controller = new social_media_controller();
        $result = $social_media_controller->get_all_social_media();
        $user_controller = new user_controller();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/AutoClash/styles/main.css">
            <title>AutoClash</title>
        </head>
        <body>
            <nav class="nav2">
                <div class="logo">
                    <img src="/AutoClash/media/Logo_black1.svg" alt="logo">
                </div>
                <div class="social_media">
                    <ul>
                        <?php
                        foreach($result as $row){
                            $media_name = $row["media_name"];
                            $media_link = $row["media_link"];
                            $media_id = $row["id"];
                            echo '<li  id="'.$media_id.'"> <a href= "'.$media_link.'" target="_blank">'.$media_name.'</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
                <?php
                    //session_start();

                     //Check if the form is submitted
                    //  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_session'])) {
                    //  // Clear specific session variables
                    //      unset($_SESSION['loggedin']);
                    //      unset($_SESSION['email']);
                    // // Redirect back to the page
                    //      header("Location:/AutoClash/user/login");
                    //      exit();
                    // }
                                           

                     // Check if a session variable exists
                     if (isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])) {
                         
                         $email = $_SESSION['email'];
                         $user =$user_controller->get_singl_user($email);
                         $first_name = $user['firstname'];
                         $last_name = $user['lastname'];
                         $profil_img = $user['img_url'];
                         echo '<div class="user-profil">
                                
                                 <a href="#" id="profile_img"> <img src="media/'.$profil_img.'" alt="user profil"></a>
                               </div>';
                               ?>
                               <div class="sub-menu-wrap" id="sub_menu">
                                <div class="sub-menu">
                                    <div class="user-info">
                                        <img src="media/<?php echo $profil_img; ?>" alt="user profile">
                                        <h3><?php echo $first_name.' '.$last_name ?></h3>
                                    </div>
                                    <hr>
                                    <a href="#" class="sub-menu-link">
                                        <img src="media/profile.png" alt="my profile">
                                        <p>My Profile</p>
                                        <span>></span>
                                    </a>
                                    <a href="#" class="sub-menu-link" id="logoutLink" >
                                        <img src="media/logout.png" alt="logout">
                                        <p>Logout</p>
                                        <span>></span>
                                    </a>
                                    
                                </div>
                               </div>
                              

                               <?php
                     } else {
                         // Session variable 'username' doesn't exist
                         echo '<a class="auth_btn" href="/AutoClash/user/login">Login</a>';
                     }
                     
            
                    
                ?>
                 <form id="logoutForm" action="" method="post">
                        <input type="hidden" name="clear_session" value="1" id="logoutLink">
                 </form>
            </nav>
            <!-- <div class="line"></div> -->
        
        <?php
    }
    public function footer(){
        $social_media_controller = new social_media_controller();
        $result = $social_media_controller->get_all_social_media();
        ?>
        <div class="footer">
        <div class="social_media">
                    <ul>
                        <?php
                        foreach($result as $row){
                            $media_name = $row["media_name"];
                            $media_link = $row["media_link"];
                            $media_id = $row["id"];
                            echo '<li  id="'.$media_id.'"> <a href= "'.$media_link.'" target="_blank">'.$media_name.'</a> </li>';
                        }
                        ?>
                    </ul>
                </div>

        </div>
        <script src="/AutoClash/app.js"></script>
        </body>
        </html>
        <?php
    }
    public function slide_show(){
        $slide_show_controller = new slide_show_controller();
        $result = $slide_show_controller->get_all_slide_show();
        ?>
        <div class="slider">
            <div class="list">
                <?php
                foreach($result as $row){
                    $img_url = $row["img_url"];
                    $id = $row['id'];
                    $title = $row["title"];
                    $description = $row["description"];
                    $link = $row["link"];
                    if($id==1){
                        echo '<div class="item active">';
                    }
                    else{
                        echo '<div class="item ">';
                    }
                    echo '
                    <img src="media/'.$img_url.'" alt="slide item 1">
                    <div class="content">
                        <p>design</p>
                        <h2>'.$title.'</h2>
                        <p>
                        '.$description.' 
                        <a href="'.$link.'">More</a>
                        </p>
                    </div>
                </div>';
                }
                ?>
            
            </div>
            <div class="arrows">
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
            <div class="thumbnail">
            <?php
            $result2 = $slide_show_controller->get_all_slide_show();
                foreach($result2 as $row){
                    $img_url = $row["img_url"];
                    $id = $row['id'];
                    $title = $row["title"];
                    $description = $row["description"];
                    $link = $row["link"];
                    if($id==1){
                        echo '<div class="item active">';
                    }
                    else{
                        echo '<div class="item ">';
                    }
                    echo '
                    <img src="media/'.$img_url.'" alt="slide item 1">
                    <div class="content">
                        '.$title.'
                    </div>
                </div>';
                }
                ?>
                <!-- <div class="item active">
                    <img src="media/img1.jpg" alt="item1" >
                    <div class="content">
                        Name Slider
                    </div>
                </div>
                <div class="item">
                    <img src="media/img2.jpg" alt="item2" >
                    <div class="content">
                        Name Slider
                    </div>
                </div>
                <div class="item">
                    <img src="media/img3.jpg" alt="item3" >
                    <div class="content">
                        Name Slider
                    </div>
                </div>
                <div class="item">
                    <img src="media/img4.jpg" alt="item4" >
                    <div class="content">
                        Name Slider
                    </div>
                </div>
                <div class="item">
                    <img src="media/img5.jpg" alt="item5" >
                    <div class="content">
                        Name Slider
                    </div>
                </div> -->
            </div>
        </div>
        <?php
    }
    public function sections_menu(){
        $sections_menu_controller = new sections_menu_controller();
        $result = $sections_menu_controller->get_all_sections();
        ?>
        <div class="sections_menu">
            <ul>
                <?php 
                foreach($result as $row){
                    echo '<li id ="'.$row['id'].'"> <a href="/AutoClash/'.$row['section_link'].'">'.$row['section_name'].'</a> </li>';
                }
                ?>
            </ul>
        </div>
        <?php

    }
    public function brands(){
        $brands_controller = new brands_controller();
        $result = $brands_controller->get_main_brands();
        ?>
        <div class="brands">
            <h2>Major Players in the Auto Industry</h2>
            <ul>
            <?php 
                foreach($result as $row){
                    echo '<li id ="'.$row['id'].'"> <a href="#"><img src="/AutoClash/media/'.$row['img_url'].'" alt="'.$row['brand_name'].'"></a>
                    <p>'.$row['brand_name'].'</p>
                          </li>';
                }
                ?>
                
            </ul>
        </div>
        <?php
    }
    public function comparator(){
        $models_controller = new models_controller();
        $brands_controller = new brands_controller();
        $trim_level_controller = new trim_level_controller();
        $result1 = $brands_controller->get_all_brands();
        $result2 = $brands_controller->get_all_brands();
        $result3 = $brands_controller->get_all_brands();
        $result4 = $brands_controller->get_all_brands();
        $result = $models_controller->get_models_for_brand();
        $result_trim = $trim_level_controller->get_trim_level_for_model();
        $result_vehicle = $trim_level_controller->get_year_for_trim_level();
        
        ?>
        <div class="container" id="container">
        <h2>Compare Cars Side-by-Side</h2>
        <div class="comparator-section">
    <div class="plus-button default-style" id="plus-button1" >+ Add a vehicle</div>
    <div class="form-container" id="form1">
    <span class="close-btn">×</span>
    <h2>Add Vehicle</h2>
    <form id="form-1" action="#" method="post">
        <label for="brand1">Select a Brand:</label>
        <select class="brand option1" id="brand1" name="brand">
        <option value="">Select a brand</option>
        <?php
        
        foreach($result1 as $row){
            $brand_name=$row['brand_name'];
            echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
        }
        ?>
        
        </select>
        <label for="model1">Select a Model:</label>
        <select id="model1" name="model" class="model option1">
            <option value="" selected>Select a model</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a trim level:</label>
        <select id="trim1" class="trim option1" name="trim">
            <option value="" selected>Select a trim level</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a year:</label>
        <select id="year1" class="year option1" name="year">
            <option value="" selected>Select a year</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>

        <input type="submit"  value="Add" class="submit" id="submit1">
    </form>
    </div>

    <div class="plus-button default-style" id="plus-button2">+ Add a vehicle</div>
    <div class="form-container" id="form2">
        <span class="close-btn">×</span>
        <h2>Add Vehicle</h2>
        
        <form id="form-2" action="#" method="post">
        <label for="brand2">Select a Brand:</label>
        <select class="brand option2" id="brand2" name="brand">
        <option value="">Select a brand</option>
        <?php
        
        foreach($result2 as $row){
            $brand_name=$row['brand_name'];
            echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
        }
        ?>
        
        </select>
        <label for="model2">Select a Model:</label>
        <select id="model2" name="model" class="model option2">
            <option value="" selected>Select a model</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a trim level:</label>
        <select id="trim2" class="trim option2" name="trim">
            <option value="" selected>Select a trim level</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a year:</label>
        <select id="year2" class="year option2" name="year">
            <option value="" selected>Select a year</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>

        <input type="submit"  value="Add" class="submit" id="submit2">
    </form>
    </div>
    <div class="plus-button default-style" id="plus-button3">+ Add a vehicle</div>
    <div class="form-container" id="form3">
        <span class="close-btn">×</span>
        <h2>Add Vehicle</h2>
        
        <form id="form-3">
            
        <label for="mySelect3">Select a Brand:</label>
        <select class="brand option3" id="brand3" name="brand">
        <option value="" selected>Select a brand</option>
        <?php
      
        foreach($result3 as $row){
            $brand_name=$row['brand_name'];
            echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
        }
        ?>
        </select>
        <label for="model3">Select a Model:</label>
        <select id="model3" name="model" class="model option3">
            <option value="" selected>Select a model</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a trim level:</label>
        <select id="trim3" class="trim option3" name="trim">
            <option value="" selected>Select a trim level</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a year:</label>
        <select id="year3" class="year option3" name="year">
            <option value="" selected>Select a year</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>

        <input type="submit" value="Add" class="submit" id="submit3">
        </form>
    </div>
    <div class="plus-button default-style" id="plus-button4">+ Add a vehicle</div>
    <div class="form-container" id="form4">
        <span class="close-btn">×</span>
        <h2>Add Vehicle</h2>
        
        <form id="form-4">
            
        <label for="mySelect4">Select a Brand:</label>
        <select class="brand option4" id="brand4" name="brand">
        <option value="" selected>Select a brand</option>
        <?php
        foreach($result4 as $row){
            $brand_name=$row['brand_name'];
            echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
        }
        ?>
        </select>
        <label for="model4">Select a Model:</label>
        <select id="model4" name="model" class="model option4">
            <option value="" selected>Select a model</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a trim level:</label>
        <select id="trim4" class="trim option4" name="trim" >
            <option value="" selected>Select a trim level</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label >Select a yaer:</label>
        <select id="year4" class="year option4" name="year">
            <option value="" selected>Select a year</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>

        <input type="submit" value="Add" class="submit" id="submit4">
        </form>
    </div>

    
</div>
    <div class="btn-container">
        <a class="compare-btn"  id="compare-btn" href="#container">Compare</a>
    </div>
        </div>



<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Get all elements with the class "model"
     var modelSelects = document.getElementsByClassName('model');

// Disable all select elements with the class "model"
     function disableModelSelects() {
     for (var i = 0; i < modelSelects.length; i++) {
         modelSelects[i].disabled = true;
       }
     }
     var trimSelects = document.getElementsByClassName('trim');

    // Disable all select elements with the class "model"
     function disableTrimSelects() {
     for (var i = 0; i < trimSelects.length; i++) {
         trimSelects[i].disabled = true;
       }
     }
     var yearSelects = document.getElementsByClassName('year');

    // Disable all select elements with the class "model"
     function disableYearSelects() {
     for (var i = 0; i < yearSelects.length; i++) {
         yearSelects[i].disabled = true;
       }
     }
     disableModelSelects();
     disableTrimSelects();
     disableYearSelects();

    var phpResult = [<?php 
     $resultCount = $models_controller->get_models_nb();
     $counter = 0;
    foreach($result as $row){
        $brand_name = json_encode($row['brand_name']);
        $model_name = json_encode($row['model_name']);
        echo '{ brand_name:'.$brand_name.', model_name:'.$model_name.'}';
         $counter++;
         if ($counter < $resultCount) {
             echo ',';
         }
    }
          ?>];
          var phpResult2 = [<?php 
     $resultCount2 = $trim_level_controller->get_trim_level_nb();
     $counter2 = 0;
    foreach($result_trim as $row){
        $level_name = json_encode($row['level_name']);
        $model_name = json_encode($row['model_name']);
        echo '{ model_name:'.$model_name.', level_name:'.$level_name.'}';
         $counter2++;
         if ($counter2 < $resultCount2) {
             echo ',';
         }
    }
          ?>];
          var phpResult3 = [<?php 
     $resultCount3 = $trim_level_controller->get_vehicle_nb();
     $counter3 = 0;
    foreach($result_vehicle as $row){
        $level_name = json_encode($row['level_name']);
        $model_name = json_encode($row['model_name']);
        $year = json_encode($row['year']);
        echo '{ model_name:'.$model_name.', level_name:'.$level_name.', year:'.$year.'}';
         $counter3++;
         if ($counter3 < $resultCount3) {
             echo ',';
         }
    }
          ?>];
       

    
    // Now you can use the phpResult variable in your JavaScript code
    
    // console.log(phpResult2);
    // console.log(phpResult.length);

    // Function to filter the table data
    function filterTable(criteria) {
        return phpResult.filter(function (row) {
            // Customize the filtering logic based on your criteria
            return row.brand_name.toLowerCase() == criteria.toLowerCase();
        });
    }
    function filterTable2(criteria) {
        return phpResult2.filter(function (row) {
            // Customize the filtering logic based on your criteria
            return row.model_name.toLowerCase() == criteria.toLowerCase();
        });
    }
    function filterTable3(criteria1, criteria2) {
        return phpResult3.filter(function (row) {
            // Customize the filtering logic based on your criteria
            return (
            row.model_name.toLowerCase() === criteria1.toLowerCase() &&
            row.level_name.toLowerCase() === criteria2.toLowerCase()
        );

        });
    }

    // Example: Filter the table data based on the name containing 'John'
     //var filteredData3 = filterTable2('C40');

    // // Log the filtered data to the console
     //console.log(filteredData3);

    document.addEventListener("DOMContentLoaded", function () {
    var brands = document.querySelectorAll('.brand');

    brands.forEach(function (brand, index) {
        brand.addEventListener('change', function () {
            var formNumber = index + 1; // Adding 1 to make it 1-based
            updateModels(formNumber);
        });
    });

    function updateModels(formNumber) {
        // Get the selected brand
        var selectedBrand = document.getElementById('brand' + formNumber).value;

        // Get the model select element for the current form
        var modelSelect = document.getElementById('model' + formNumber);

        // Clear existing options
        modelSelect.innerHTML = '';
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Select a model';
        // Make it the default selected option
        modelSelect.appendChild(defaultOption);

        //If a brand is selected, enable the model select
        if (selectedBrand) {
            modelSelect.disabled = false;
            // You can dynamically populate model options based on the selected brand here
        }else{
            modelSelect.disabled = true;
        }

        // Dynamically add options based on the selected brand
        var filteredData = filterTable(selectedBrand);
        for (const item of filteredData) {
            addOption(modelSelect, item.model_name, item.model_name);
           }
      
    }

    function addOption(selectElement, value, text) {
        var option = document.createElement('option');
        option.value = value;
        option.text = text;
        selectElement.add(option);
    }
});
document.addEventListener("DOMContentLoaded", function () {
    var models = document.querySelectorAll('.model');

    models.forEach(function (model, index) {
        model.addEventListener('change', function () {
            var formNumber = index + 1; // Adding 1 to make it 1-based
            updateTrims(formNumber);
        });
    });

    function updateTrims(formNumber) {
        // Get the selected model
        var selectedModel = document.getElementById('model' + formNumber).value;

        // Get the trim select element for the current form
        var trimSelect = document.getElementById('trim' + formNumber);

        // Clear existing options
        trimSelect.innerHTML = '';
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Select a trim level';
        // Make it the default selected option
        trimSelect.appendChild(defaultOption);

        // If a brand is selected, enable the model select
        if (selectedModel) {
            trimSelect.disabled = false;
            // You can dynamically populate model options based on the selected brand here
        }else{
            trimSelect.disabled = true;
        }

        // Dynamically add options based on the selected model
        var filteredData2 = filterTable2(selectedModel);
        for (const item of filteredData2) {
            addOption(trimSelect, item.level_name, item.level_name);
           }
      
    }

    function addOption(selectElement, value, text) {
        var option = document.createElement('option');
        option.value = value;
        option.text = text;
        selectElement.add(option);
    }
});
document.addEventListener("DOMContentLoaded", function () {
    var trims = document.querySelectorAll('.trim');

    trims.forEach(function (trim, index) {
        trim.addEventListener('change', function () {
            var formNumber = index + 1; // Adding 1 to make it 1-based
            updateYears(formNumber);
        });
    });

    function updateYears(formNumber) {
        // Get the selected model
        var selectedTrim = document.getElementById('trim' + formNumber).value;
        var selectedModel = document.getElementById('model' + formNumber).value;

        // Get the trim select element for the current form
        var yearSelect = document.getElementById('year' + formNumber);

        // Clear existing options
        yearSelect.innerHTML = '';
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Select a year';
        // Make it the default selected option
        yearSelect.appendChild(defaultOption);

        // If a brand is selected, enable the model select
        if (selectedTrim) {
            yearSelect.disabled = false;
            // You can dynamically populate model options based on the selected brand here
        }else{
            yearSelect.disabled = true;
        }

        // Dynamically add options based on the selected model
        var filteredData3 = filterTable3(selectedModel,selectedTrim);
        for (const item of filteredData3) {
            addOption(yearSelect, item.year, item.year);
           }
      
    }

    function addOption(selectElement, value, text) {
        var option = document.createElement('option');
        option.value = value;
        option.text = text;
        selectElement.add(option);
    }
});
let submitedFormNb=0;

document.addEventListener("DOMContentLoaded", function () {
    var submitButtons = document.querySelectorAll('.submit');
    console.log(submitButtons);
    submitButtons.forEach(function (button, index) {
        button.addEventListener('click', function (event) {
            event.preventDefault(); 
            console.log("click");
            var formNumber = index + 1; // Adding 1 to make it 1-based
            checkAndSubmit(formNumber);
        });
    });


    function checkAndSubmit(formNumber) {
        var selects = document.getElementsByClassName('option' + formNumber);
        var submitButton =document.getElementById('submit' + formNumber);
        var allSelected = Array.from(selects).every(select => select.value !== '');
       // console.log(selects);
        //console.log(allSelected);
        if (allSelected) {
            // closeform(formNumber);
            // changeStyle(formNumber);
            // submitedFormNb++;
        
        if (hasDifferentValues(formNumber, ['brand', 'model', 'trim', 'year'])) {
        
        console.log('Form  submitted successfully.');
        closeform(formNumber);
        changeStyle(formNumber);
        // if(submitedFormNb==0){
        //     localStorage.removeItem("is_submited"+formNumber);
        //     localStorage.setItem("submitedFormNb",0 );
        // }
        let is_submited = localStorage.getItem("is_submited"+formNumber);

        if(!is_submited ){
        submitedFormNb++;
        localStorage.setItem("is_submited"+formNumber,formNumber );
        localStorage.setItem("submitedFormNb",submitedFormNb );
        }
        
        // submitedFormNb++;
        // localStorage.setItem("is_submited"+formNumber,formNumber );
        // localStorage.setItem("submitedFormNb",submitedFormNb );
         } else {
        alert('Please ensure that at least one input value is different from other forms.');
        }


        } else {
        // Disable the submit button if any dropdown is not selected
        //submitButton.disabled = true;
        alert('Please select values for all dropdowns.');
        }
    }
    function hasDifferentValues(formId, fieldNames) {
      var formData = {};
      var formElements = document.getElementById('form-'+formId).elements;
      //console.log(formElements);
      for (var i = 0; i < formElements.length; i++) {
        if (formElements[i].type !== 'submit') {
          var fieldName = formElements[i].name;
          formData[fieldName] = formElements[i].value;
        }
      }
      console.log(formData);

      // Check if there is at least one unique value
      var nb = 0;
      for (var i = 0; i < fieldNames.length; i++) {
        var fieldName = fieldNames[i];
        for (var j = 1; j < 5; j++) {
            if(j!==formId){
                if (document.getElementById(fieldName+j).value ) {
                    if(formData[fieldName] !== document.getElementById(fieldName+j).value){
                        localStorage.setItem(formId, JSON.stringify(formData));
                         console.log("local storage"+formId);
                        return true;
                        // Store form data in local storage with a unique key
                         
                    }
                  
                }else{nb++;}
            }
        
        }
      }
      if(nb==12){
        // Store form data in local storage with a unique key
         localStorage.setItem(formId, JSON.stringify(formData));
        return true;
    }
      console.log("false");
      return false;
      
    }

    function closeform(formNumber) {
    var form = document.getElementById('form' + formNumber);
    
    
    if (form) {
        form.style.display = 'none';
    }
   }
   function changeStyle(formNumber) {
    var div = document.getElementById('plus-button' + formNumber);
    div.textContent = 'Vehicle Added';

        // Change background color
    // div.style.backgroundColor = '#03071E';

    //     // Change text color
    // div.style.color = 'white';
    div.classList.remove('default-style');

    // Add the new style class
    div.classList.add('added-style');
    
   }
});
//console.log(submitedFormNb);
document.addEventListener("DOMContentLoaded", function () {
    var btn = document.getElementById('compare-btn');

    btn.addEventListener('click', function () {
        let check = localStorage.getItem("submitedFormNb");
       
        if ( check>=2 && submitedFormNb>=2){
            //btn.disabled = false; 
            btn.href="comparing";
        }else{
            alert("You must add two vehiclea at least to start comparing ");
        }
    });
});
function clearLocalStoreg(){
    if(submitedFormNb==0){
        localStorage.setItem("submitedFormNb",0 );
        for(var i=1;i<=4;i++){
            localStorage.removeItem("is_submited"+i);
        }
    }
};
clearLocalStoreg();

</script>



        <?php
    }
    public function buying_guide(){
        ?>

        <div class="buying-guide">
            <img src="/AutoClash/media/buying-guide.jpg" alt="buying guide" >
            <div class="content">
                <h2>Navigate the World of Vehicles with Ease</h2>
                <p>Our Buying Guide streamlines your journey to the perfect car. Discover practical tips, model comparisons, and tricks to make informed decisions. Whether you're looking for maintenance advice, financing options, or the latest trends, we've got everything to guide you.</p>
                <a href="#">Buying Guide</a>
            </div>
        </div>
        <?php
    }
    public function most_popular_comparisons(){
        ?>
        <div class="warper">
        <h2>Popular car comparisons</h2>
        <div class="popular">
        <?php
        $comparing_controller = new comparing_controller();
        $result = $comparing_controller->get_most_compare_cars();
        foreach($result as $row){
            $vehicle1_id = $row['vehicle1_id'];
            $vehicle2_id = $row['vehicle2_id'];
            
            $vehicle1 = $comparing_controller->get_vehicle_name1($vehicle1_id);
            $vehicle2 = $comparing_controller->get_vehicle_name1($vehicle2_id);
            echo'<div class="child">'.$vehicle1['year'].' '.$vehicle1['brand_name'].' '.$vehicle1['model_name'].' '.$vehicle1['level_name'].' <span>VS</span>  '.$vehicle2['year'].' '.$vehicle2['brand_name'].' '.$vehicle2['model_name'].' '.$vehicle2['level_name'].'</div>';

            // foreach($vehicle1 as $vehicle1){
            //     echo $row['year'];
            //     //echo'<div class="child">'.$row['year'].' '.$row['brand_name'].' '.$row['model_name'].' '.$row['level_name'].' <span>VS</span>  '.$row['year'].' '.$row['brand_name'].' '.$row['model_name'].' '.$row['level_name'].'</div>';

            // }


        }
          
        
        ?>
        </div>
        </div>
        
        
        <?php
    }

    public function home_page(){
        $this->navbar();
        $this->slide_show();
        $this->sections_menu();
        $this->brands();
        $this->comparator();
        $this->buying_guide();
        $this->most_popular_comparisons();
        $this->footer();
    }
}



?>