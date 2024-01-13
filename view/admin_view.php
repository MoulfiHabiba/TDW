<?php
require_once("controller/admin_controller.php");
require_once("controller/user_controller.php");
require_once("controller/brands_controller.php");
require_once("controller/vehicle_controller.php");
require_once("controller/slide_show_controller.php");
class admin_view{
    public function register_page(){
        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/AutoClash/styles/register_style.css">
            <title>Register Page</title>
            <div class="box">
               <h1>Welcome Admin</h1>
               <a href="/AutoClash"><img class="logo" src="/AutoClash/media/logo.svg" alt="logo"></a>
                
            
           
            </div>
            

                <?php
                 $admin_controller = new admin_controller();
                 $err_message = "";
                 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                  $admin_name= trim($_POST['admin_name']);
                  $password =trim( $_POST['password']);
                 
                  $err_message = $admin_controller->register($admin_name,$password);
                 }
                  ?>
                              <form action="" method="post">
                <h2>Register</h2>
                <div class="form_item" class="form_item">
                <label for="firstname">Name:</label>
                <input type="text" name="admin_name" id="admin_name" value="<?php echo isset($admin_name) ? htmlspecialchars($admin_name) : ''; ?>" required  >
                
                </div>
                
                <div class="form_item">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>" required >
                </div>
                <input class="submit_btn" type="submit" name = "submit">
                
              
                
                <p>Already have an account? <a class="link" href="login">Login here</a>.</p>
                  <?php
                  if($err_message){
                     
                    
                         echo '<p class="error_message">'.$err_message.'</p>';
                     
                     
                  }elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                     // Redirect to login page
                     header("Location:/AutoClash/admin/login");
                     
                  }
         
                 
                ?>

            </form>
        </head>
        <body>
            
        </body>
        </html>
        <?php
       
        
    }
    public function login_page(){
        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/AutoClash/styles/register_style.css">
            <title>Login Page</title>
            
                <?php
                 $err_message = "";
                 $admin_controller = new admin_controller();
                 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                  $admin_name =trim( $_POST['admin_name']);
                  $password =trim( $_POST['password']);
                  $err_message = $admin_controller->login($admin_name,$password);
                 }
                  ?>
                 <form class="login" action="" method="post">
            
            <h2>Login</h2>
            
            <div class="form_item">
            <label for="admin_name">Name:</label>
            <input type="text" name="admin_name" id="admin_name" value="<?php echo isset($admin_name) ? htmlspecialchars($admin_name) : ''; ?>" required>
            </div>
            <div class="form_item">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>" required >
            </div>
            <input class="submit_btn" type="submit" name = "submit" value="login">
            
            <p>Don't have an account? <a class="link" href="register">Register here</a>.</p>
                  <?php
                  if($err_message){
                    
                         echo '<p class="error_message">'.$err_message.'</p>';
                     
                     
                  }elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                    header("Location:/AutoClash/admin/home");
                     
                  }
         
                     
                ?>

            </form>
            <div class="box">
               <h1>Welcome Back Admin</h1>
               <a href="/AutoClash"><img class="logo" src="/AutoClash/media/logo.svg" alt="logo"></a>
                
                
            
           
            </div>
        </head>
        <body>
            
        </body>
        </html>
        <?php
       
      
        
    }
    function home_page(){
        session_start(); 
        if(!isset($_SESSION['admin_loggedin']) ){
        header("Location: login");
        die();
        }
        $user_controller = new user_controller();
        $brands_controller = new brands_controller();
        $vehicle_controller = new vehicle_controller();
        $slide_show_controller = new slide_show_controller();
        $users_nb = $user_controller->get_all_users_nb();
        $registered_users = $user_controller->get_registered_users_nb();
        $non_registered_users = $user_controller->get_non_registered_users_nb();
        $blocked_users = $user_controller->get_blocked_users_nb();
        $non_blocked_users = $user_controller->get_non_blocked_users_nb();
        $brands_nb = $brands_controller->get_brands_nb();
        $vehicle_nb = $vehicle_controller->get_vehicle_nb();
        $slide_show_nb = $slide_show_controller->get_slide_show_nb();
        //session_start();

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_session'])) {
        // Clear specific session variables
            unset($_SESSION['admin_loggedin']);
            unset($_SESSION['admin_name']);
        // Redirect back to the page
            header("Location:login");
            exit();
    }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/AutoClash/styles/admin.css">
            <title>Admin</title>
        </head>
        <body>
        <div class="admin-nav">
            <ul>
                <li> <a href="/AutoClash"> <img src="/AutoClash/media/Logo_black1.svg" alt="logo"> </a> </li>
                
                <li><a class="dashbord" href="home">DashBord</a></li>
                <li> <a href="#" id="logoutLink">logout</a></li>
            </ul>
        </div>
        <form id="logoutForm" action="" method="post">
            <input type="hidden" name="clear_session" value="1">
        </form>
        <div class="admin">
            <a class="category" href="/AutoClash/admin_users">
                <h2>Users</h2>
                <div class="numbers">
                    <div  class="item-number">
                        <img src="/AutoClash/media/multiple-users-silhouette.png" alt="user">
                        <div class="content">
                            <p class="number"><?php echo $users_nb['nb']; ?></p>
                            <p>users</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/multiple-users-silhouette (3).png" alt="">
                        <div class="content">
                            <p class="number"><?php echo $registered_users['nb']; ?></p>
                            <p class="name">Registered users</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/multiple-users-silhouette (2).png" alt="">
                        <div class="content">
                            <p class="number"><?php echo $non_registered_users['nb']; ?></p>
                            <p class="name">Non Registered Users</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/multiple-users-silhouette (1).png" alt="">
                        <div class="content">
                            <p class="number"><?php echo $blocked_users['nb']; ?></p>
                            <p class="name">Blocked users</p>
                        </div>
                    </div>
                    
                </div>
            </a>
            <a class="category" href="/AutoClash/admin_brands">
                <h2>Brands And Vehicles</h2>
                <div class="numbers">
                    <div class="item-number">
                        <img src="/AutoClash/media/racing (1).png" alt="">
                        <div class="content">
                            <p class="number"><?php echo $brands_nb['nb']; ?></p>
                            <p class="name">brands</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/car.png" alt="">
                        <div class="content">
                            <p class="number"><?php echo $vehicle_nb['nb']; ?></p>
                            <p class="name">vehicles</p>
                        </div>
                    </div>
                   
                    
                </div>
            </a>
            <a class="category" href="#">
                <h2>Comments</h2>
                <div class="numbers">
                    <div class="item-number">
                        <img src="/AutoClash/media/chat.png" alt="">
                        <div class="content">
                            <p class="number">230</p>
                            <p class="name">Total Comments</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/chat (1).png" alt="">
                        <div class="content">
                            <p class="number">230</p>
                            <p class="name">Accepted Comments</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/chat (3).png" alt="">
                        <div class="content">
                            <p class="number">230</p>
                            <p class="name">Waiting Comments</p>
                        </div>
                    </div>
                    
                </div>
            </a>
            <a class="category" href="#">
                <h2>News</h2>
                <div class="numbers">
                    <div class="item-number">
                        <img src="/AutoClash/media/megaphone.png" alt="">
                        <div class="content">
                            <p class="number">230</p>
                            <p class="name">Total News</p>
                        </div>
                    </div>
                    
                    
    
                </div>
            </a>
            <a class="category" href="#">
                <h2>Settings</h2>
                <div class="numbers">
                    <div class="item-number">
                        <img src="/AutoClash/media/shopping-list.png" alt="">
                        <div class="content">
                            <p class="number">230</p>
                            <p class="name">Buying guides</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/contact-us.png" alt="">
                        <div class="content">
                            <p class="number">230</p>
                            <p class="name">Contact</p>
                        </div>
                    </div>
                    <div class="item-number">
                        <img src="/AutoClash/media/slideshow.png" alt="">
                        <div class="content">
                            <p class="number"><?php echo $slide_show_nb['nb']; ?></p>
                            <p class="name">Slideshow</p>
                        </div>
                    </div>
                    
                </div>
            </a>
        </div>
        <script src="/AutoClash/app.js"></script>   
        </body>
        </html>
        
        <?php
    }
}


?>