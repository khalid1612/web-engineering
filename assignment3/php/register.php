<?php

  // Include config file
  require_once "config.php";

  if ( ($_POST['email'] != "") && ($_POST['sid'] != "")){
    //collect data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sid = $_POST['sid'];
    $slot = $_POST['slot'];




     //check student id or email already exists or not
     $user_check_query = "SELECT * FROM students WHERE sid='$sid' OR email='$email' LIMIT 1";
     $result = mysqli_query($db, $user_check_query);
     $user = mysqli_fetch_assoc($result);

     if ($user) { // if user exists
       if ($user['sid'] === $sid) {
         echo "Student ID already exists";
       }
        elseif ($user['email'] === $email) {
          echo "Email already exists";
        }
     }
     else{
       //insert in db
       $query = "INSERT INTO students (name, email, sid, slot)
             VALUES('$name', '$email', '$sid', '$slot')";

             if (mysqli_query($db, $query)) {
               echo "Successfully register";
               //sendMail($email);//to student
               //sendMail();//to teacher
             }else {
               echo "Something wrong! Please try again";
             }
     }
  }


  function sendMail($to)
  {
    $subject = "AllPHPTricks Contact Form Email";
    $message = "<p>New email is received from $name.</p>
    <p>$message</p>";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <".$email.">" . "\r\n";
    $sent = mail($to,$subject,$message,$headers);
    if($sent){
    	echo "<span style='color:green; font-weight:bold;'>
    	Thank you for contacting us, we will get back to you shortly.
    	</span>";
    }
    else{
    	echo "<span style='color:red; font-weight:bold;'>
    	Sorry! Your form submission is failed.
    	</span>";
    }
  }

?>
