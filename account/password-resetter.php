<?php
// Include config file
require_once "config.php";
require_once "../../geo.php";
 
// Define variables and initialize with empty values
 $password = $confirm_password = "";
$password_err = $confirm_password_err = "";




$geoplugin = new geoPlugin();
// If we wanted to change the base currency, we would uncomment the following line
// $geoplugin->currency = 'EUR';
 
$geoplugin->locate();
$stamper_2=date("Y-m-d");
$city=$geoplugin->city;
$country=$geoplugin->countryName;
$longitude=$geoplugin->longitude;
$latitude=$geoplugin->latitude;
$nearby=$geoplugin->locationAccuracyRadius;
$region=$geoplugin->region;


    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Password must have atleast 6 characters </div>";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = " <div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Please confirm password. </div>";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = " <div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                 Password did not match. </div>";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($password_err) && empty($confirm_password_err)){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    
    
    
}






$email=$_POST["email"];
$link2="https://boradesigns.co.ke/affiliate/";
$str=$row["jargon"];

 
       // Prepare an insert statement
        $sql = "UPDATE affiliate SET password =? WHERE email='$email'";
       
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_password);
            
            // Set parameters
           
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: https://boradesigns.co.ke/affiliate-login");
                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> Password Changed Successfully.  </div>";
            } else{
                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> Something went wrong.  </div>
                                                
                                               ";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
    
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Register | Bora Designs Affiliate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Bora Designs affiliate program, earn cash from your followers. " name="description" />
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

                            <div class="card-body p-4" style='background-color:<?php echo"$color"; ?>;'>
                                <div class="text-center">
                            <a href="https://boradesigns.co.ke" class="logo">
                                <img src="../assets/images/logo-light.png" alt="" height="44" class="logo-light mx-auto">
                               <img src="../assets/images/logo-dark.png" alt="" height="44" class="logo-dark mx-auto">
                            </a>
                            

                        </div><br>
                        
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0" style='color:<?php echo"$font"; ?>;'>Bora Designs <br>Reset Password</h4>
                                </div>

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                               
                                    
                                     <div class="form-group mb-3 " >
                                        <label for="email" style='color:<?php echo"$font"; ?>;'>Email</label>
                                        <input class="form-control" name="email" type="text" required=""  parsley-type="email"  id="email" value="<?php $email=mysqli_real_escape_string($con,$_GET["id"]);
                                        echo $email; ?>
                                        " placeholder="Enter your Email" >
                                        
                                    </div>
                                 

                                    <div class="form-group mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
                                        <label for="password"style='color:<?php echo"$font"; ?>;'>Password</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" value="<?php echo $password; ?>" placeholder="Enter your password" >
                                        
                                    </div>
                                    <div class="form-group mb-3 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" >
                                        <label for="password" style='color:<?php echo"$font"; ?>;'>Confirm Password</label>
                                        <input class="form-control" name="confirm_password" value="<?php echo $confirm_password; ?>" type="password" required="" id="password" placeholder="Enter your password" >
                                       
                                    </div>
                                    
                                   

                                    

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit" value="submit"> Update Password </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                
                                <p class="text-muted" style="color: <?php echo"$font;"?>">Have an account? <a href="https://boradesigns.co.ke/affiliate-login" class="text-dark ml-1" style="color: <?php echo"$font;"?>"><b style="color: <?php echo"$font;"?>" >Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>  <?php }} ?>
                        <!-- end row -->

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