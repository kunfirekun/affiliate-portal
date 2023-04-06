<?php

        $uname=$_GET['uname'];

         $to = "kunfirekun@gmail.com";
         $subject = "Confirm Your Account";
         
         $message = "<b>Hello, </b><br>Kindly, click on the link to verify your account before proceeding. <br><a href='https://boradesigns.co.ke/email-confirm/$uname'>Verify My Account</a>";
      
         
         $header = "From:social@boradesigns.co.ke \r\n";

         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            header("location: login.php");
         }else {
             header("location: register.php");
         }
      ?>