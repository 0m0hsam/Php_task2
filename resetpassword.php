<?php 
session_unset();
$errorcount= 0;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;

$_SESSION['forget_email']= $email;
//check eamil and character length
  if(isset($email)&&!empty($email)){

        if (!preg_match("/[@]/",$email)){
          $emailerror= " Email $email not correct";
        }
          if(strlen($email)<5){
            $emaillenerror= " invalid less than five character";
          }else{
            $allUsers= scandir("db");
            $countallUsers= count($allUsers);
            $nextUserid=($countallUsers-2);
            
            
           //check if user already exist
            for($counter=0; $counter < $countallUsers; $counter++){
             $currentUsers= $allUsers[$counter];
  
             if($currentUsers == "User".$email.".json"){
             echo "Your email is valid check mail for your Reset code";
              //token
              $token="";
              $code=['a','A','b','B','c','C','d','D','e','E','f','F','g','G',
              'h','H','i','I','j','J','k','K','l','L','m','M','n','N'];

              for($i = 0; $i < 25; $i++){
                $index = mt_rand(0,count($code)-1);
               $_SESSION['token'] = $token .= $code[$index];
              }

              

             $subject = "password Reset Link";
             $message = "A password rest has been initiated from your account, if you did not initiate this reset, please ignore this message, otherwise 
             click <a href='localhost/passwordprocess.php'>here</a> to reset passsword localhost/passwordprocess.php";
             $header = "From: reply@snh.org \n CC: incrediblesam.org";
             
          
             file_put_contents("tokendb/Token".$email.".json", json_encode(['token'=>$token]));


             $try= mail($email,$subject,$message,$header);
          

             if($try){
               $_SESSION['email_error']="Your email is valid check mail for your Reset code";
               header("Location: reset.php");
             }else{
              $_SESSION['email_error']="Your Password Reset email Failed! Try again.";
              header("Location: reset.php");
             } 

             die();
           }
       }
     
          }
       $create_acct_error= "Invalid Email!!! create an account";
}
?>