<?php
require_once('base_view.php');
require_once("controller/social_media_controller.php");
require_once("controller/slide_show_controller.php");
require_once("controller/sections_menu_controller.php");
require_once("controller/brands_controller.php");
require_once("controller/models_controller.php");
require_once("controller/trim_level_controller.php");
require_once("controller/comparing_controller.php");
require_once("controller/user_controller.php");
require_once("controller/comparing_controller.php");
class comparing_view{
   
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
    $comparing_controller = new comparing_controller();
    $vehicle1 = array();  
    $vehicle2 = array();  
    $vehicle3 = array();  
    $vehicle4 = array(); 
    $is_submit = '';
    $brand = '';
    $vehicle1_informations = '';
    $vehicle2_informations = '';
    $vehicle3_informations = '';
    $vehicle4_informations = '';
    $vehicle1_features = '';
    $vehicle1_engine = '';
    $vehicle1_interior_colors = '';
    $vehicle1_exterior_colors = '';
    $vehicle2_features = '';
    $vehicle2_engine = '';
    $vehicle2_interior_colors = '';
    $vehicle2_exterior_colors = '';
    $vehicle3_features = '';
    $vehicle3_engine = '';
    $vehicle3_interior_colors = '';
    $vehicle3_exterior_colors = '';
    $vehicle4_features = '';
    $vehicle4_engine = '';
    $vehicle4_interior_colors = '';
    $vehicle4_exterior_colors = '';
    $form_nb = 0;
    $response = ''; // Add this line to define $response
    $form_id = '';
    $features = '';
    $engine = '';
    $interior_colors = '';
    $exterior_colors = ''; 
    $features_names = $comparing_controller->get_all_features_name();
    $js_features_names = json_encode($features_names);

    
   // session_start(); 
   session_start();

   // Check if the form is submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_session'])) {
   // Clear specific session variables
       unset($_SESSION['loggedin']);
       unset($_SESSION['email']);
  // Redirect back to the page
       header("Location:/AutoClash/user/login");
       exit();
 }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check which form was submitted
            if (isset($_POST["year1"])) {
                
                // Form 1 was submitted
                $vehicle1['brand'] = $_POST["brand1"];
                $vehicle1['model'] = $_POST["model1"];
                $vehicle1['trim'] = $_POST["trim1"];
                $vehicle1['year'] = $_POST["year1"];
                $vehicle1_informations = $comparing_controller->get_vehicle_informations($vehicle1['brand'],$vehicle1['model'],$vehicle1['trim'],$vehicle1['year']);
                $vehicle1_features = $comparing_controller->get_vehicle_features($vehicle1['brand'],$vehicle1['model'],$vehicle1['trim'],$vehicle1['year']);
                $vehicle1_engine = $comparing_controller->get_vehicle_engine($vehicle1['brand'],$vehicle1['model'],$vehicle1['trim'],$vehicle1['year']);
                $vehicle1_interior_colors = $comparing_controller->get_vehicle_interior_colors($vehicle1['brand'],$vehicle1['model'],$vehicle1['trim'],$vehicle1['year']);
                $vehicle1_exterior_colors = $comparing_controller->get_vehicle_exterior_colors($vehicle1['brand'],$vehicle1['model'],$vehicle1['trim'],$vehicle1['year']);

                //echo 'form one submit';
            $form_nb = $form_nb +1;
            $form_id = 1;
            // Seting session variable to indicate that the table should be displayed
            $_SESSION['display_table'] = true;
            // Redirect to the same page to prevent form resubmission
            //header("Location:comparing");
            $response = $vehicle1_informations;
//             $features = array(); // or $features = [];

// foreach ($vehicle1_features as $row) {
//     $feature_name = $row["feature_name"];
//     $feature_value = $row["feature_value"];
    
//     // Create an array for each row and add it to the $features array
//     $features = $feature_value;
// }

            $features = $vehicle1_features;
            $engine = $vehicle1_engine;
            $interior_colors = $vehicle1_interior_colors;
            $exterior_colors = $vehicle1_exterior_colors;
            }
            // else{
            //     echo 'form did not submit';
            //     print_r($_POST);


            // } 
            if (isset($_POST["year2"])) {
               
                // Form 2 was submitted
                $vehicle2['brand'] = $_POST["brand2"];
                $vehicle2['model'] = $_POST["model2"];
                $vehicle2['trim'] = $_POST["trim2"];
                $vehicle2['year'] = $_POST["year2"];
                $vehicle2_informations = $comparing_controller->get_vehicle_informations($vehicle2['brand'],$vehicle2['model'],$vehicle2['trim'],$vehicle2['year']);
                $vehicle2_features = $comparing_controller->get_vehicle_features($vehicle2['brand'],$vehicle2['model'],$vehicle2['trim'],$vehicle2['year']);
                $vehicle2_engine = $comparing_controller->get_vehicle_engine($vehicle2['brand'],$vehicle2['model'],$vehicle2['trim'],$vehicle2['year']);
                $vehicle2_interior_colors = $comparing_controller->get_vehicle_interior_colors($vehicle2['brand'],$vehicle2['model'],$vehicle2['trim'],$vehicle2['year']);
                $vehicle2_exterior_colors = $comparing_controller->get_vehicle_exterior_colors($vehicle2['brand'],$vehicle2['model'],$vehicle2['trim'],$vehicle2['year']);
                $form_nb = $form_nb +1;
                $form_id = 2;
                $_SESSION['display_table'] = true;
                //print_r($vehicle2);
                //print_r($vehicle1);
                $response = $vehicle2_informations;
                $features = $vehicle2_features;
                $engine = $vehicle2_engine;
                $interior_colors = $vehicle2_interior_colors;
                $exterior_colors = $vehicle2_exterior_colors;




            }
            if (isset($_POST["year3"])) {
               
                // Form 3 was submitted
                $vehicle3['brand'] = $_POST["brand3"];
                $vehicle3['model'] = $_POST["model3"];
                $vehicle3['trim'] = $_POST["trim3"];
                $vehicle3['year'] = $_POST["year3"];
                $vehicle3_informations = $comparing_controller->get_vehicle_informations($vehicle3['brand'],$vehicle3['model'],$vehicle3['trim'],$vehicle3['year']);
                $vehicle3_features = $comparing_controller->get_vehicle_features($vehicle3['brand'],$vehicle3['model'],$vehicle3['trim'],$vehicle3['year']);
                $vehicle3_engine = $comparing_controller->get_vehicle_engine($vehicle3['brand'],$vehicle3['model'],$vehicle3['trim'],$vehicle3['year']);
                $vehicle3_interior_colors = $comparing_controller->get_vehicle_interior_colors($vehicle3['brand'],$vehicle3['model'],$vehicle3['trim'],$vehicle3['year']);
                $vehicle3_exterior_colors = $comparing_controller->get_vehicle_exterior_colors($vehicle3['brand'],$vehicle3['model'],$vehicle3['trim'],$vehicle3['year']);
                $form_nb = $form_nb +1;
                $form_id = 3;
                $_SESSION['display_table'] = true;
                //print_r($vehicle3);
                //print_r($vehicle1);
                $response = $vehicle3_informations;
                $features = $vehicle3_features;
                $engine = $vehicle3_engine;
                $interior_colors = $vehicle3_interior_colors;
                $exterior_colors = $vehicle3_exterior_colors;




            }
            if (isset($_POST["year4"])) {
               
                // Form 4 was submitted
                $vehicle4['brand'] = $_POST["brand4"];
                $vehicle4['model'] = $_POST["model4"];
                $vehicle4['trim'] = $_POST["trim4"];
                $vehicle4['year'] = $_POST["year4"];
                $vehicle4_informations = $comparing_controller->get_vehicle_informations($vehicle4['brand'],$vehicle4['model'],$vehicle4['trim'],$vehicle4['year']);
                $vehicle4_features = $comparing_controller->get_vehicle_features($vehicle4['brand'],$vehicle4['model'],$vehicle4['trim'],$vehicle4['year']);
                $vehicle4_engine = $comparing_controller->get_vehicle_engine($vehicle4['brand'],$vehicle4['model'],$vehicle4['trim'],$vehicle4['year']);
                $vehicle4_interior_colors = $comparing_controller->get_vehicle_interior_colors($vehicle4['brand'],$vehicle4['model'],$vehicle4['trim'],$vehicle4['year']);
                $vehicle4_exterior_colors = $comparing_controller->get_vehicle_exterior_colors($vehicle4['brand'],$vehicle4['model'],$vehicle4['trim'],$vehicle4['year']);
                $form_nb = $form_nb +1;
                $form_id = 4;
                $_SESSION['display_table'] = true;
                //print_r($vehicle4);
                //print_r($vehicle1);
                $response = $vehicle4_informations;
                $features = $vehicle4_features;
                $engine = $vehicle4_engine;
                $interior_colors = $vehicle4_interior_colors;
                $exterior_colors = $vehicle4_exterior_colors;




            }
           

    header('Content-Type: application/json');

    // Your response data
    $responseData = ['response' => $response,'features' => $features,'engine' => $engine,'interior_colors' => $interior_colors,'exterior_colors' => $exterior_colors, 'formNb' => $form_nb, 'formId' => $form_id];
    
    // Output the JSON-encoded response
    echo json_encode($responseData);
    exit;
    
}
        //     if($vehicle1){echo $vehicle1['brand'];}
            
        
        // if($vehicle1){
        // }
        // if($vehicle2){
        // }
        // if($vehicle3){
        // $vehicle3_informations = $comparing_controller->get_vehicle_informations($vehicle3['brand'],$vehicle3['model'],$vehicle3['trim'],$vehicle3['year']);
        // }
        // if($vehicle4){
        //     $vehicle4_informations = $comparing_controller->get_vehicle_informations($vehicle4['brand'],$vehicle4['model'],$vehicle4['trim'],$vehicle4['year']);
        // }
        $base_view = new base_view();
        $base_view->navbar2();
        $base_view->sections_menu();
        $base_view->brands();
    
    ?>
    <div class="container" id="container">
    <h2>Compare Cars Side-by-Side</h2>
    <div class="comparator-section">
<div class="plus-button default-style" id="plus-button1" >+ Add a vehicle</div>
<div class="form-container" id="form1">
<span class="close-btn">×</span>
<h2>Add Vehicle</h2>
<form id="form-1" action="" method="post">
    <label for="brand1">Select a Brand:</label>
    <select class="brand option1" id="brand1" name="brand1">
    <option value="">Select a brand</option>
    <?php
    
    foreach($result1 as $row){
        $brand_name=$row['brand_name'];
        echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
    }
    ?>
    
    </select>
    <label for="model">Select a Model:</label>
    <select id="model1" name="model1" class="model option1">
       
    </select>
    <label >Select a trim level:</label>
    <select id="trim1" class="trim option1" name="trim1">
        <option value="" selected>Select a trim level</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <label >Select a year:</label>
    <select id="year1" class="year option1" name="year1">
        <option value="" selected>Select a year</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>

    <input name="form1_submit" type="submit"  value="Add" class="submit" id="submit1">
</form>
</div>

<div class="plus-button default-style" id="plus-button2">+ Add a vehicle</div>
<div class="form-container" id="form2">
    <span class="close-btn">×</span>
    <h2>Add Vehicle</h2>
    
    <form id="form-2" action="" method="post">
    <label for="brand2">Select a Brand:</label>
    <select class="brand option2" id="brand2" name="brand2">
    <option value="">Select a brand</option>
    <?php
    
    foreach($result2 as $row){
        $brand_name=$row['brand_name'];
        echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
    }
    ?>
    
    </select>
    <label for="model2">Select a Model:</label>
    <select id="model2" name="model2" class="model option2">
        <option value="" selected>Select a model</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <label >Select a trim level:</label>
    <select id="trim2" class="trim option2" name="trim2">
        <option value="" selected>Select a trim level</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <label >Select a year:</label>
    <select id="year2" class="year option2" name="year2">
        <option value="" selected>Select a year</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>

    <input name="form2_submit" type="submit"  value="Add" class="submit" id="submit2">
</form>
</div>
<div class="plus-button default-style" id="plus-button3">+ Add a vehicle</div>
<div class="form-container" id="form3">
    <span class="close-btn">×</span>
    <h2>Add Vehicle</h2>
    
    <form id="form-3" action="" method="post">
        
    <label for="mySelect3">Select a Brand:</label>
    <select class="brand option3" id="brand3" name="brand3">
    <option value="" selected>Select a brand</option>
    <?php
  
    foreach($result3 as $row){
        $brand_name=$row['brand_name'];
        echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
    }
    ?>
    </select>
    <label for="model3">Select a Model:</label>
    <select id="model3" name="model3" class="model option3">
        <option value="" selected>Select a model</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <label >Select a trim level:</label>
    <select id="trim3" class="trim option3" name="trim3">
        <option value="" selected>Select a trim level</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <label >Select a year:</label>
    <select id="year3" class="year option3" name="year3">
        <option value="" selected>Select a year</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>

    <input name="form3_submit" type="submit" value="Add" class="submit" id="submit3">
    </form>
</div>
<div class="plus-button default-style" id="plus-button4">+ Add a vehicle</div>
<div class="form-container" id="form4">
    <span class="close-btn">×</span>
    <h2>Add Vehicle</h2>
    
    <form id="form-4" action="" method="post">
        
    <label for="mySelect4">Select a Brand:</label>
    <select class="brand option4" id="brand4" name="brand4">
    <option value="" selected>Select a brand</option>
    <?php
    foreach($result4 as $row){
        $brand_name=$row['brand_name'];
        echo '<option value="'.$brand_name.'">'.$brand_name.'</option>';
    }
    ?>
    </select>
    <label for="model4">Select a Model:</label>
    <select id="model4" name="model4" class="model option4">
        <option value="" selected>Select a model</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <label >Select a trim level:</label>
    <select id="trim4" class="trim option4" name="trim4" >
        <option value="" selected>Select a trim level</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <label >Select a yaer:</label>
    <select id="year4" class="year option4" name="year4">
        <option value="" selected>Select a year</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>

    <input name="form4_submit" type="submit" value="Add" class="submit" id="submit4">
    </form>
</div>


</div>
<div class="btn-container">
    <input type="submit" value="Compare" class="compare-btn"  id="compare-btn" name="submit">
    <!-- <a class="compare-btn"  id="compare-btn" href="#container" name="submit">Compare</a> -->
</div>
    </div>

<div id="responseArea" ></div>



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
 function disableFormElements(formId) {
  var form = document.getElementById('form-'+formId);

  if (form) {
    var formElements = form.elements;

    for (var i = 1; i < formElements.length; i++) {
      var element = formElements[i];

      // Check if the element is not a submit button
      if (element.type !== 'submit') {
        element.disabled = true;
      }
    }
  } 
 }
 function prefillForm(formId) {
            var storedFormData = localStorage.getItem(formId);
            if (storedFormData) {
              var formData = JSON.parse(storedFormData);
            dataExesit = formId;
              // Pre-fill the corresponding form fields on Page 2
              var formElements = document.getElementById('form-'+formId).elements;
              
                  formElements[0].value = formData['brand'];
                
              
              console.log(formElements);
              // Remove stored form data from local storage
            //   localStorage.removeItem(formId);
            }else{
                disableFormElements(formId) ;
            }
          }
// Call the prefillForm function for each form on Page 2
    prefillForm('1');
    prefillForm('2');
    prefillForm('3');
    prefillForm('4');      
//  disableModelSelects();
//  disableTrimSelects();
//  disableYearSelects();


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

 //console.log(phpResult2);
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
    var storedFormData = localStorage.getItem(formNumber);
    if (storedFormData) {
              var formData = JSON.parse(storedFormData);
           
              // Pre-fill the corresponding form fields on Page 2
             
              //console.log(formElements);
              // Remove stored form data from local storage
              //localStorage.removeItem(formNumber);
            
            
            defaultOption.value = formData['model'];
            defaultOption.text = formData['model'];
            // Make it the default selected option
            defaultOption.selected = true;
            
            }else{
                defaultOption.value = '';
                defaultOption.text = 'Select a model';
            }
            modelSelect.appendChild(defaultOption);
    

    //If a brand is selected, enable the model select
    if (selectedBrand) {
        modelSelect.disabled = false;
        // Dynamically add options based on the selected brand
       var filteredData = filterTable(selectedBrand);
       for (const item of filteredData) {
        addOption(modelSelect, item.model_name, item.model_name);
       }
        // You can dynamically populate model options based on the selected brand here
    }else{
        modelSelect.disabled = true;
    }

    
  
}

function addOption(selectElement, value, text) {
    var option = document.createElement('option');
    option.value = value;
    option.text = text;
    selectElement.add(option);
}
updateModels(1);
updateModels(2);
updateModels(3);
updateModels(4);
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
    var storedFormData = localStorage.getItem(formNumber);
    if (storedFormData) {
              var formData = JSON.parse(storedFormData);
           
              // Pre-fill the corresponding form fields on Page 2
             
              //console.log(formElements);
              // Remove stored form data from local storage
              //localStorage.removeItem(formNumber);
            
            
            defaultOption.value = formData['trim'];
            defaultOption.text = formData['trim'];
            // Make it the default selected option
            defaultOption.selected = true;
           
            }else{
                defaultOption.value = '';
                defaultOption.text = 'Select a trim level';
            }
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
updateTrims(1);
updateTrims(2);
updateTrims(3);
updateTrims(4);
});
var submitedFormNb=0;
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
    var storedFormData = localStorage.getItem(formNumber);
    localStorage.removeItem(formNumber);
    
    if (storedFormData) {
              var formData = JSON.parse(storedFormData);
           
              // Pre-fill the corresponding form fields on Page 2
             
              //console.log(formElements);
              // Remove stored form data from local storage
              //localStorage.removeItem(formNumber);
            
            
            defaultOption.value = formData['year'];
            defaultOption.text = formData['year'];
            // Make it the default selected option
            defaultOption.selected = true;
            changeStyle(formNumber);
            localStorage.removeItem(formNumber);
            submitedFormNb++;
            console.log(submitedFormNb);


            }else{
                defaultOption.value = '';
                defaultOption.text = 'Select a year';
            }
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
updateYears(1);
updateYears(2);
updateYears(3);
updateYears(4);
clearLocalStorage();
function changeStyle(formNumber) {
var div = document.getElementById('plus-button' + formNumber);
div.textContent = 'Vehicle Added';

    // Change background color
    div.classList.remove('default-style');

// Add the new style class
   div.classList.add('added-style');


}

});

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
    let is_submited = localStorage.getItem("is_submited"+formNumber);
    console.log(is_submited);
    if(!is_submited ){
        submitedFormNb++;
        localStorage.setItem("is_submited"+formNumber,formNumber );
        localStorage.setItem("submitedFormNb",submitedFormNb );
    }
    // submitedFormNb++;
    
    // localStorage.setItem("is_submited"+formNumber,formNumber );
    // localStorage.setItem("submitedFormNb",submitedFormNb );

    // var form= document.getElementById('form-'+formNumber);
    // form.submit();
    //submitForm(formNumber);

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
      var fieldName =  fieldNames[i];
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
                    //localStorage.setItem(formId, JSON.stringify(formData));
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
     //localStorage.setItem(formId, JSON.stringify(formData));
    return true;
}
  console.log("false");
  return false;
  
}

function closeform(formNumber) {
var form = document.getElementById('form' + formNumber);
var formm = document.getElementById('form-' + formNumber);
var formElements = formm.elements;

if (form) {
    
    form.style.display = 'none';
    
}
}
function changeStyle(formNumber) {
var div = document.getElementById('plus-button' + formNumber);
div.textContent = 'Vehicle Added';

    // Change background color
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
    console.log(check );
    if (check >=2){
        for (var i = 1;i<=4;i++){
            var form = document.getElementById('form-' + i);
            var element = form.elements[3].value;
            if(element){
                submitForm(i);

            }

        }
       
        
    }else{
        alert("You must add two vehicles at least to start comparing ");
       

    }
});

});
function submitForm(formId) {
        var form = document.getElementById('form-'+formId);
        var formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: 'comparing', // Submit to the same file
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Update the response area with the server's response
                console.log('Success:');

                displayDataInTable(response.response,response.features,response.engine,formId);
                addRowsToTable();
            },
            error: function(xhr, status, error,response) {
             console.error('Error:', status, error);
             console.log('Success:',response);

            }
        });
    }

    var features_names = <?php echo $js_features_names; ?>;
    console.log(features_names);

// Function to add rows to the table
function addRowsToTable() {
    var responseArea = document.getElementById('responseArea');
    var table ;

    if (responseArea.innerHTML.includes('<div class="table">')) {
        table = responseArea.innerHTML;
        for (var i = 0; i < features_names.length; i++) {
            var feature_name = features_names[i];

            // Check if the row with feature_name already exists
            var featureIndex = table.indexOf('<tr><td>' + feature_name + '</td>');

            if (featureIndex == -1) {
                console.log(feature_name);

                // If the row doesn't exist, add a new row
                table+= '<tr><td>' + feature_name + '</td></tr>';
                // table += '<tr><td>Images</td><td id="' + formId + '_images"><a href="#"><img src="media/' + data.img_url + '"></a></td></tr>';


                // Add corresponding <td> elements for Images and Price
                // (you may customize this part based on your requirements)
            }
        }
    }
}

function addOrUpdateRow(table, formId, variableName, variableValue, unit) {
    // Check if the row exists
    var rowIndex = table.indexOf('<tr><td>' + variableName + '</td>');
    if (rowIndex !== -1) {
        // Check if <td> with id=formId_variableName exists
        var tdIndex = table.indexOf('id="' + formId + '_' + variableName.toLowerCase() + '"');
        if (tdIndex !== -1) {
            // If it exists, update its content
            var startOfTd = table.lastIndexOf('<td', tdIndex);
            var endOfTd = table.indexOf('</td>', tdIndex) + '</td>'.length;
            table = table.slice(0, startOfTd) + '<td id="' + formId + '_' + variableName.toLowerCase() + '">' + variableValue + ' ' + unit + '</td>' + table.slice(endOfTd);
        } else {
            // If it doesn't exist, find the position to insert the new <td> element
            let len = variableName.length;
            var index = table.indexOf('<tr><td>' + variableName + '</td>') + '<tr><td></td>'.length + len;

            // Add a new <td> element just after the last one in the Images row
            table = table.slice(0, index) + '<td id="' + formId + '_' + variableName.toLowerCase() + '">' + variableValue + ' ' + unit + '</td>' + table.slice(index);
        }
    } else {
        // Add a new row and corresponding <td>
        table += '<tr><td>' + variableName + '</td><td id="' + formId + '_' + variableName.toLowerCase() + '">' + variableValue + ' ' + unit + '</td></tr>';
    }

    return table;
}


function displayDataInTable(data,features,engine, formId) {
    var responseArea = document.getElementById('responseArea');
    var table;

    // Check if this is the first time displaying data
    if (!responseArea.innerHTML.includes('<div class="table">')) {
        // If it's the first time, create a new table structure
        table = '<div class="table"><table border><thead><tr><th>Features</th>';

        // Add <th> elements based on the new data
        table += '<th id="' + formId + '">' + data.year + ' ' + data.brand_name + ' ' + data.model_name + ' ' + data.level_name + '</th>';

        table += '</tr></thead><tbody>';
    } else {
        // If the table already exists, retrieve the existing structure
        table = responseArea.innerHTML;
        

        // Check if a column with the formId already exists
        var columnIndex = table.indexOf('id="' + formId + '"');
        
        if (columnIndex !== -1) {
            // If the column exists, update its content
            var startOfColumn = table.lastIndexOf('<th', columnIndex);
            var endOfColumn = table.indexOf('</th>', columnIndex) + '</th>'.length;
            table = table.slice(0, startOfColumn) + '<th id="' + formId + '">' + data.year + ' ' + data.brand_name + ' ' + data.model_name + ' ' + data.level_name + '</th>' + table.slice(endOfColumn);
        } else {
            // If the column doesn't exist, find the position to insert the new <th> element
            var index = table.indexOf('<tr><th>Features</th>')+'<tr><th>Features</th>'.length;

            // Add another <th> element just after the last one
            table = table.slice(0, index) + '<th id="' + formId + '">' + data.year + ' ' + data.brand_name + ' ' + data.model_name + ' ' + data.level_name + '</th>' + table.slice(index);
            
        }
    }

    // Check if "Images" row exists
    var imageIndex = table.indexOf('<tr><td>Images</td>');
    if (imageIndex !== -1) {
        // Check if <td> with id=formId_images exists
        var imageTdIndex = table.indexOf('id="' + formId + '_images"');
        if (imageTdIndex !== -1) {
            // If it exists, update its content
            var startOfImageTd = table.lastIndexOf('<td', imageTdIndex);
            var endOfImageTd = table.indexOf('</td>', imageTdIndex) + '</td>'.length;
            table = table.slice(0, startOfImageTd) + '<td id="' + formId + '_images"><a href="vehicle/'+data.vehicle_id+'"><img src="media/' + data.img_url + '"></a></td>' + table.slice(endOfImageTd);
        } else {
            // If it doesn't exist, find the position to insert the new <td> element
        var index = table.indexOf('<tr><td>Images</td>') + '<tr><td>Images</td>'.length;

        // Add a new <td> element just after the last one in the Images row
        table = table.slice(0, index) + '<td id="' + formId + '_images"><a href="vehicle/'+data.vehicle_id+'"><img src="media/' + data.img_url + '"></a></td>' + table.slice(index);
        }
    }else{
                // Add "Images" row and corresponding <td>
         table += '<tr><td>Images</td><td id="' + formId + '_images"><a href="vehicle/'+data.vehicle_id+'"><img src="media/' + data.img_url + '"></a></td></tr>';

//         // Add "Price" row and corresponding <td>
//         table += '<tr><td>Price</td><td id="' + formId + '_price">$' + data.start_price + '-$' + data.end_price + '</td></tr>';
    }

    // Check if "Price" row exists
    var priceIndex = table.indexOf('<tr><td>Price</td>');
    if (priceIndex !== -1) {
        // Check if <td> with id=formId_price exists
        var priceTdIndex = table.indexOf('id="' + formId + '_price"');
        if (priceTdIndex !== -1) {
            // If it exists, update its content
            var startOfPriceTd = table.lastIndexOf('<td', priceTdIndex);
            var endOfPriceTd = table.indexOf('</td>', priceTdIndex) + '</td>'.length;
            table = table.slice(0, startOfPriceTd) + '<td id="' + formId + '_price">$' + data.start_price + '-$' + data.end_price + '</td>' + table.slice(endOfPriceTd);
        } else {
            // If it doesn't exist, find the position to insert the new <td> element
            var index = table.indexOf('<tr><td>Price</td>') + '<tr><td>Price</td>'.length;

           // Add a new <td> element just after the last one in the Images row
            table = table.slice(0, index) + '<td id="' + formId + '_price">$' + data.start_price + '-$' + data.end_price + '</td>' + table.slice(index);
        }
    }else{
        //         // Add "Images" row and corresponding <td>
//         table += '<tr><td>Images</td><td id="' + formId + '_images"><a href="#"><img src="media/' + data.img_url + '"></a></td></tr>';

        // Add "Price" row and corresponding <td>
        table += '<tr><td>Price</td><td id="' + formId + '_price">$' + data.start_price + '-$' + data.end_price + '</td></tr>';
    }
    for (var i = 0; i < features_names.length; i++) {
    var feature_name = features[i].feature_name;
    var feature_value = features[i].feature_value;
    console.log(feature_value);
    var featureIndex = table.indexOf('<tr><td>' + feature_name + '</td>');
    if (featureIndex === -1) {
        table += '<tr><td>' + feature_name + '</td><td id="' + formId + feature_name + '_feature">'+feature_value+'</td></tr>';
    }else{
        var featureTdIndex = table.indexOf('id="' + formId + feature_name + '_feature"');
        if (featureTdIndex !== -1) {
            // If it exists, update its content
            var startOfFeatureTd = table.lastIndexOf('<td', featureTdIndex);
            var endOfFeatureTd = table.indexOf('</td>', featureTdIndex) + '</td>'.length;
            table = table.slice(0, startOfFeatureTd) + '<td id="' + formId + feature_name + '_feature">' + feature_value + '</td>' + table.slice(endOfFeatureTd);
        } else {
            // If it doesn't exist, find the position to insert the new <td> element
            console.log(feature_name);
            let len = feature_name.length;
            var index = table.indexOf('<tr><td>' + feature_name + '</td>') + '<tr><td></td>'.length+len;

            // Add a new <td> element just after the last one in the Images row
            table = table.slice(0, index) + '<td id="' + formId + feature_name + '_feature">' + feature_value + '</td>' + table.slice(index);
        }
    }
}
// var engine_power = engine.engine_power;
// var engine_torque = engine.engine_torque;
// var engine_displacement = engine.engine_displacement;
// var engine_configuration = engine.engine_configuration;
// var drivetrain = engine.drivetrain;
// var transmission = engine.transmission;
// var tire_size_front = engine.tire_size_front;
// var tire_size_rear = engine.tire_size_rear;
// var fuel_type = engine.fuel_type;
// var engine_powerIndex = table.indexOf('<tr><td>Engine Power</td>');
//     if (engine_powerIndex !== -1) {
//         // Check if <td> with id=formId_images exists
//         var engine_powerTdIndex = table.indexOf('id="' + formId + '_engine_power"');
//         if (engine_powerTdIndex !== -1) {
//             // If it exists, update its content
//             var startOfengine_powerTd = table.lastIndexOf('<td', engine_powerTdIndex);
//             var endOfengine_powerTd = table.indexOf('</td>', engine_powerTdIndex) + '</td>'.length;
//             table = table.slice(0, startOfengine_powerTd) + '<td id="' + formId + '_engine_power">'+engine_power+' hp</td>' + table.slice(endOfengine_powerTd);
//         } else {
//             // If it doesn't exist, find the position to insert the new <td> element
//         var index = table.indexOf('<tr><td>Engine Power</td>') + '<tr><td>Engine Power</td>'.length;

//         // Add a new <td> element just after the last one in the Images row
//         table = table.slice(0, index) + '<td id="' + formId + '_engine_power">'+engine_power+' hp</td>' + table.slice(index);
//         }
//     }else{
//                 // Add "Images" row and corresponding <td>
//          table += '<tr><td>Engine Power</td><td id="' + formId + '_engine_power">'+engine_power+' hp</td></tr>';

// //         // Add "Price" row and corresponding <td>
// //         table += '<tr><td>Price</td><td id="' + formId + '_price">$' + data.start_price + '-$' + data.end_price + '</td></tr>';
//     }
var engine_power = engine.engine_power;
var engine_torque = engine.engine_torque;

var engine_displacement = engine.engine_displacement;
var engine_configuration = engine.engine_configuration;
var drivetrain = engine.drivetrain;
var transmission = engine.transmission;
var tire_size_front = engine.tire_size_front;
var tire_size_rear = engine.tire_size_rear;
var tire_size = tire_size_front+'(FRONT), '+tire_size_rear+'(REAR)';
var fuel_type = engine.fuel_type;
table = addOrUpdateRow(table, formId, 'Engine Power', engine_power, 'hp');
if(engine_torque==0){
    engine_torque = 'Not available'
    table = addOrUpdateRow(table, formId, 'Engine Torque', engine_torque, '');
}else{
    table = addOrUpdateRow(table, formId, 'Engine Torque', engine_torque, 'lb-ft');

}


table = addOrUpdateRow(table, formId, 'Engine Displacement', engine_displacement, '');
table = addOrUpdateRow(table, formId, 'Engine Configuration', engine_configuration, '');
table = addOrUpdateRow(table, formId, 'Drivetrain', drivetrain, '');
table = addOrUpdateRow(table, formId, 'transmission', engine_torque, '');
table = addOrUpdateRow(table, formId, 'Tire size', tire_size , '');
table = addOrUpdateRow(table, formId, 'Flue Type',fuel_type, '');









    table += '</tbody></table></div>';

    responseArea.innerHTML = table;
}

function clearLocalStorage(){
    if(submitedFormNb==0 ){
        localStorage.setItem("submitedFormNb",0 );
        for(var i=1;i<=4;i++){
            localStorage.removeItem("is_submited"+i);
        }
    }else if(submitedFormNb==1){
        for(var i=2;i<=4;i++){
            localStorage.removeItem("is_submited"+i);
        }
    }
};
console.log(submitedFormNb);
//clearLocalStorage();
</script>




    <?php
    
}
    
        
      
      
      
    
   public function comparing_page(){
    $base_view = new base_view();
    
    $this->comparator();
    $base_view->buying_guide();
    $base_view->most_popular_comparisons();
    $base_view->footer();
   }

}


?>