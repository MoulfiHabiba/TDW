<?php
require_once("controller/user_controller.php");
class user_view{
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
               <h1>Welcome To</h1>
               <a href="/AutoClash"><img class="logo" src="/AutoClash/media/logo.svg" alt="logo"></a>
                
            
           
            </div>
            

                <?php
                 $user_controller = new user_controller();
                 $err_message = "";
                 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                  $firstname= trim($_POST['firstname']);
                  $lastname =trim( $_POST['lastname']);
                  $email =trim( $_POST['email']);
                  $password =trim( $_POST['password']);
                  $sexe =trim( $_POST['sexe']);
                  $birthdate =trim( $_POST['birthdate']);
                  $err_message = $user_controller->register($firstname,$lastname,$email,$password,$sexe,$birthdate);
                 }
                  ?>
                              <form action="" method="post">
                <h2>Register</h2>
                <div class="form_item" class="form_item">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo isset($firstname) ? htmlspecialchars($firstname) : ''; ?>" required  >
                
                </div>
                <div class="form_item">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo isset($lastname) ? htmlspecialchars($lastname) : ''; ?>" required >
                </div>
                <div class="form_item">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required >
                </div>
                <div class="form_item">
                <label for="birthdate">Birth Date:</label>
                <input type="date" name="birthdate" id="birthdate" required >
                </div>
                <div class="form_item">
                <label for="gender">Gender:</label>
                <div  class="gender_box">
                <div>
                <input type="radio" name="sexe" id="male" value="male" <?php echo (isset($sexe) && $sexe === 'male') ? 'checked' : ''; ?> required>
                <label for="male">Male</label>
                </div>
               <div>
               <input type="radio" name="sexe" id="female" value="female" <?php echo (isset($sexe) && $sexe === 'female') ? 'checked' : ''; ?> required>
                <label for="male">Female</label>
               </div>
                
                </div>
                </div>
                <div class="form_item">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>" required >
                </div>
                <input class="submit_btn" type="submit" name = "submit">
                
                <script>
                //  To set the date input value with JavaScript after the page has loaded insted of using the value attribut because browsers often ignore the value attribute for the date input
                document.addEventListener('DOMContentLoaded', function() {
                var birthdateInput = document.getElementById('birthdate');
                <?php if (isset($birthdate)): ?>
                // Set the value only if $birthdate is set
                birthdateInput.value = "<?php echo htmlspecialchars($birthdate); ?>";
                <?php endif; ?>
                      });
                </script>
                
                <p>Already have an account? <a class="link" href="login">Login here</a>.</p>
                  <?php
                  if($err_message){
                     
                    
                         echo '<p class="error_message">'.$err_message.'</p>';
                     
                     
                  }elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                     // Redirect to login page
                     header("Location:/AutoClash/user/login");
                     
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
                 $user_controller = new user_controller();
                 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                  $email =trim( $_POST['email']);
                  $password =trim( $_POST['password']);
                  $err_message = $user_controller->login($email,$password);
                 }
                  ?>
                 <form class="login" action="" method="post">
            
            <h2>Login</h2>
            
            <div class="form_item">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
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
                    header("Location:/AutoClash");
                     
                  }
         
                     
                ?>

            </form>
            <div class="box">
               <h1>Welcome Back To</h1>
               <a href="/AutoClash"><img class="logo" src="/AutoClash/media/logo.svg" alt="logo"></a>
                
                
            
           
            </div>
        </head>
        <body>
            
        </body>
        </html>
        <?php
       
      
        
    }
}


?>