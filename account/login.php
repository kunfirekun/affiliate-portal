<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location:../home.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM affiliate WHERE username = ? AND process ='process' AND status_on='on' AND del_acc !='1' ";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: https://boradesigns.co.ke/affiliate/home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = " <span style='color: orange;'>Your account is not activated. </span>";
                }
            } else{
                echo "Somethings Wrong Please Try Again Later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Sign In | Bora Business Assistant </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta content="Bora Business Assistant, earn cash from your online followers. " name="description" />
        <meta content="Bora Designs" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />
        <script>
  window.callbellSettings = {
    token: "8PFCJbqkCGDgA9HhDxkPyhea"
  };
</script>
<script>
  (function(){var w=window;var ic=w.callbell;if(typeof ic==="function"){ic('reattach_activator');ic('update',callbellSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Callbell=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://dash.callbell.eu/include/'+window.callbellSettings.token+'.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()
</script>




<script data-ad-client="ca-pub-2204694268557273" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script async >
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142109273-2');
</script> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142109273-2"></script>
<!-- End of Async Callbell Code -->

    </head>

<?php
include '../../throughpass.php';
 $result = mysqli_query($con,"SELECT * FROM background order by id desc limit 1  ");
 $queryResult = mysqli_num_rows($result);
  if ($queryResult > 0) {
while($row = mysqli_fetch_array($result)) 

{ 

$bg=$row['image'];
$color=$row['last_name'];
$date=$row['first_name'];
$font=$row['font'];

$url='https://boradesigns.co.ke/wazito/upload/';

$bg1=$url.$bg;

?>
    <body class="authentication-bg" style="background-image: url('<?php echo "$bg1";?>');background-size: auto; ">
  

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        
                        <div class="card">

                            <div class="card-body p-4" style="background-color: <?php echo"$color";?>;">
                                <div class="text-center">
                            <a href="https://boradesigns.co.ke" class="logo">
                                <img src="../assets/images/logo-light.png" alt="" height="44" class="logo-light mx-auto">
                               <img src="../assets/images/logo-dark.png" alt="" height="44" class="logo-dark mx-auto">
                            </a>
                            

                        </div><br>
                        
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0" style="color: <?php echo"$font";?>;">Bora Designs<br>Sign In</h4>
                                </div>

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                    <div class="form-group mb-3  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label for="username" style="color: <?php echo"$font";?>;">Username</label>
                                        <input class="form-control" data-parsley-type="alphanum" name="username" type="text" id="Username" required="" value="<?php echo $username; ?>" placeholder="Enter your Username">
                                        <span class="help-block" style="color: red;"><?php echo $username_err; ?></span>
                                    </div>

                                    <div class="form-group mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
                                        <label for="password" style="color: <?php echo"$font";?>;">Password</label>
                                        <input class="form-control" data-parsley-type="alphanum" name="password" type="password" required="" id="password" placeholder="Enter your password" >
                                        <span class="help-block" style="color: red;"><?php echo $password_err; ?></span>
                                    </div>

                                    

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit" value="Login"> Log In </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p style="color: <?php echo"$font;"?>"> <a href="reset-password.php" class="text ml-1" style="color: <?php echo"$font;"?>"><i class="fa fa-lock mr-1" style="color: <?php echo"$font;"?>"></i>Forgot your password?</a></p>
                                <p class="text" style="color: <?php echo"$font;"?>">Don't have an account? <a href="register_affiliate.php" class="text"  style="color: <?php echo"$font;"?>"><b >Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>  <?php }} ?>
                        <!-- end row -->
 <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-fb+5w+4e-db+86"
     data-ad-client="ca-pub-2204694268557273"
     data-ad-slot="4032510203"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
         <script src="../assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- validation init -->
        <script src="../assets/js/pages/form-validation.init.js"></script>

        
    </body>


</html>