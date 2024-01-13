<?php
require_once("controller/admin_users_controller.php");
require_once("controller/user_controller.php");
class admin_users_view{
    public function all_users_section(){
        $admin_users_controller = new admin_users_controller();
        $user_controller = new user_controller();
        $result = $admin_users_controller->get_all_users();
        $edit_id = '';
        $edit_firstname = '';
        $edit_lastname = '';
        $edit_email = '';
        $edit_password = '';
        $edit_sexe = '';
        $edit_birthdate = '';
        
        ?>
  <div class="table" id="all-section">
      <table id="example" class="display example" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>is_blocked</th>
                <th>is_register</th>
                <th>created_at</th>
                <th>Actions</th>

            </tr>
            
        </thead>
        <tbody>
          <?php
          foreach($result as $row){
            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $sexe = $row['sexe'];
            $birthdate = $row['birthdate'];
            $is_register = $row['is_register'];
            $is_blocked = $row['is_blocked'];
            $created_at = $row['created_at'];
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'.$id])) {
              // Clear specific session variables
                  $user_controller->delete_user($id);
              // Redirect back to the page
                  // header("Location:/AutoClash/admin_users");
                  // exit();
          }
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'.$id])) {
            
            $edit_id = $row['id'];
            $edit_firstname = $row['firstname'];
            $edit_lastname = $row['lastname'];
            $edit_email = $row['email'];
            $edit_password = $row['password'];
            $edit_sexe = $row['sexe'];
            $edit_birthdate = $row['birthdate'];
        }
          

            echo'
            
            <div id="deletePopup'.$id.'" class="popup">
              <div class="popup-content">
                <p>Are you sure you want to delete this user?</p>
                <div>
                <a href="#" class="yes">Yes</a>
                <a href="#" class="no">No</a>
                </div>
              </div>
            </div>
            <div>
            <form id="deleteForm'.$id.'" action="" method="post" class="deleteForm1">
                <input type="hidden" name="delete'.$id.'" value="1" >
            </form>
            </div>
            <div>
            <form id="editForm'.$id.'" action="" method="post" class="editForm1">
                <input type="hidden" name="edit'.$id.'" value="1" >
            </form>
            </div>
            
       
            <tr>
              
                
                <td>'.$id.'</td>
                <td>'.$firstname.'</td>
                <td>'.$lastname.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                <td>'.$sexe.'</td>
                <td>'.$birthdate.'</td>
                <td>'.$is_register.'</td>
                <td>'.$is_blocked.'</td>
                <td>'.$created_at.'</td>
                <td class="actions">
                <a href="#" class="delete" id="'.$id.'"><img src="/AutoClash/media/delete.png" alt="delete">delete</a>
                <span href="#" class="edit "><img src="/AutoClash/media/draw.png" alt="edit">edit</span>
                </td>
            </tr>
                 
            ';
          }
          ?>
           
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>is_blocked</th>
                <th>is_register</th>
                <th>created_at</th>
            </tr>
        </tfoot>
      </table>

  </div>
  
  <div id="add-section">
    <?php
                 $user_controller = new user_controller();
                 $err_message = "";
                  
                 if(isset($edit_id)){
                  echo $edit_id;
                  $user_id = $edit_id;
                  $firstname= $edit_firstname;
                  $lastname =$edit_lastname;
                  $email =$edit_email;
                  $password =$edit_password;
                  $sexe =$edit_sexe;
                  $birthdate =$edit_birthdate;
                  // $err_message = $user_controller->update_user($firstname,$lastname,$email,$password,$sexe,$birthdate,$user_id);

                 }
                 
                 elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                  echo 'add';
                  $firstname= trim($_POST['firstname']);
                  $lastname =trim( $_POST['lastname']);
                  $email =trim( $_POST['email']);
                  $password =trim( $_POST['password']);
                  $sexe =trim( $_POST['sexe']);
                  $birthdate =trim( $_POST['birthdate']);
                  $err_message = $user_controller->register($firstname,$lastname,$email,$password,$sexe,$birthdate);
                 }
                 echo $firstname.'f';
                  ?>
                <h2>Add new User</h2>

                <form action="" method="post">
                <div class="form_item" class="form_item">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo isset($firstname) ? htmlspecialchars($firstname) : ''; ?>" required  >
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo isset($lastname) ? htmlspecialchars($lastname) : ''; ?>" required >
                </div>
                <div class="form_item">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required >
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
                <div class="form_item2">
                <input class="submit_btn" type="submit" name = "submit" value="Add">

                </div>
                
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
                
                  <?php
                  if($err_message){
                     
                    
                         echo '<p class="error_message">'.$err_message.'</p>';
                     
                     
                  }elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
                     // Redirect to login page
                     $edit_id='';
                      $user_id = '';
                      $firstname= '';
                      $lastname ='';
                      $email ='';
                      $password ='';
                      $sexe ='';
                      $birthdate ='';

                     //header("Location:/AutoClash/admin_users");
                     
                  }
         
                 
                ?>

            </form>

  </div> 
        <?php
    }
    public function navbar(){
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
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
                <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> -->
                <link rel="stylesheet" href="/AutoClash/styles/admin.css">

                <title>Admin</title>
            </head>
            <body>
            <div class="admin-nav">
                <ul>
                    <li> <a href="/AutoClash"> <img src="/AutoClash/media/Logo_black1.svg" alt="logo"> </a> </li>
                    <li><a class="dashbord" href="admin/home">DashBord</a></li>
                    <li> <a href="#" id="logoutLink">logout</a></li>
                </ul>
            </div>
            <form id="logoutForm" action="" method="post">
                <input type="hidden" name="clear_session" value="1">
            </form>
            <?php
    }
    public function add_section(){
      ?>
      <div class="sub-menu">
       <div id="all" class="active-menu">All Users</div>
       <div id="add">Add</div>
      </div>
      <?php
    }
    public function footer(){
        ?>
        <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> -->
         <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
         <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
         <!-- <script>
          // $('#example').DataTable();
          $('#example').DataTable({
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                var column = this;
 
                // Create select element and listener
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = DataTable.util.escapeRegex($(this).val());
 
                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });
 
                // Add list of options
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.append(
                            '<option value="' + d + '">' + d + '</option>'
                        );
                    });
            });
    }
});
         </script> -->
        <script src="/AutoClash/app.js"></script>   
        </body>
        </html>
  
        <?php
    }
    public function admin_users_page(){
        $this->navbar();
        $this->add_section();
        $this->all_users_section();
        $this->footer();
    }
}
?>