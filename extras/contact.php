<?php 
        //Message vars
    $msg = '';
    $msgClass= '';
  if(filter_has_var(INPUT_POST,'submit')){
      // GET FORM DATA
      $name = htmlspecialchars($_POST['fname']);
      $email = htmlspecialchars($_POST['email']);
      $subjects = htmlspecialchars($_POST['subject']); 
      $message = htmlspecialchars($_POST['message']);
      //Check Requires Fields
      if(!empty($email) && !empty($name) && !empty($message))
      {
          //Passed
          //Check Email
          if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
          {
              //failed
              $msg = 'Please use a valid email';
              $msgClass = 'alert-danger';
          }
          else {
              //Passed
              $toEmail = 'singhalshubh4@gmail.com';
              $subject = 'Contact Request From'.$name;
              $body = '<h2>Contact Request</h2>
            <h4>Name</h4><p>'.$name.'</p>
            <h4>Email</h4><p>'.$email.'</p>
            <h4>Subject</h4><p>'.$subjects.'</p>
          <h4>Message</h4><p>'.$message.'</p>';
          
          $headers = "MIME-Version: 1.0"."\r\n";
          $headers.= "Content-Type:text/html;charset=UTF-8"."\r\n";
              
              $headers.="From: ".$name."<".$email.">"."\r\n";
            
              if(mail($toEmail,$subject,$body,$headers))
              {
                  $msg = 'Youe email has been sent';
                  $msgClass = 'alert-success';
              }
              else {
                  $msg = 'Your email was not sent';
                  $msgClass = 'alert-danger';
              }
          }
      }
      else {
          //Failed
          $msg = 'Please fill in all fields';
          $msgClass = 'alert-danger';
      }
  }
    header("Location:index.html");
?>