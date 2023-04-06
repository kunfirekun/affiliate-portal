<?php
include "../throughpass.php";
   if(isset($_POST['submit']) )
   {
      $mail_to=$_POST['email'];
      $result = mysqli_query($con,"SELECT * FROM affiliate where email='$mail_to' ");
 $queryResult = mysqli_num_rows($result);
  if ($queryResult > 0) {
while($row = mysqli_fetch_array($result)) 
{ 
       $mailer= $_POST["email"];
       $true=$row["username"];
           
            header("location: https://boradesigns.co.ke/affiliate/email-confirm/email_confirmation.php?id=$true&&dur=$mailer");
         
      
  }

}
   }
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Verify Account | Bora Designs Affiliate</title>
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

                            <div class="card-body p-4" style="background-color: <?php echo"$color;"?>">
                                <div class="text-center">
                            <a href="https://boradesigns.co.ke" class="logo">
                                <img src="../assets/images/logo-light.png" alt="" height="44" class="logo-light mx-auto">
                               <img src="../assets/images/logo-dark.png" alt="" height="44" class="logo-dark mx-auto">
                            </a>
                            

                        </div><br>
                        
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0"style="color: <?php echo"$font;"?>"  >Bora Designs<br>Verify Account </h4>
                                </div>

                                <form action="verify.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress" style="color: <?php echo"$font;"?>">Email address</label>
                                        <input class="form-control" parsley-type="email" type="email" parsley-type="email" id="email" name='email'required=""value="<?php echo $email; ?>"  placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" value="submit" name='submit' type="submit"> Verify </button>
                                    </div>

                                </form>
                                

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                       <?php }} ?>
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
