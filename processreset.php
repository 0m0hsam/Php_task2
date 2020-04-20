<?php  

$errorcount=0;
if(!isset($_SESSION['loged_in'])){
@$token = $_POST['token'] != "" ? $_POST['token'] : $errorcount++;
$_SESSION['token1']= $token;
}
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
@$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;


$_SESSION['email']=$email;
$_SESSION['password']=$password;

if(isset($_SESSION['loged_in'])){
    $token= true;
}

    if (!empty($token)&&!empty($email)&&!empty($password)){


    if (preg_match("/[@]/",$email)){
     

          if(strlen($email)<5){
            $emaillenerror= " invalid less than five character";
            
          }else{
      //Checking database
      $allUsers= scandir("db");
      $countallUsers= count($allUsers);
            
              //check if email already exist
              for($counter=0; $counter < $countallUsers; $counter++){
                $currentUsers= $allUsers[$counter];

                if(isset($_SESSION['loged_in'])){
                  if($_SESSION['email_login'] != $email){
                    $_SESSION['try']=$_SESSION['email_login'];
                    $_SESSION['email_match']="Your entered email don't match! please your account email please";
                    header("Location: reset.php");
                      die(); 
                    }
                  }else{
                    if(isset($_SESSION['forget_email'])){
                      if($_SESSION['forget_email'] != $email){
                        $_SESSION['try']=$_SESSION['forget_email'];
                        $_SESSION['email_match']="Your entered email don't match! please enter your account email.";
                        header("Location: reset.php");
                          die();
                      }
                    }
                  }
          
                if($currentUsers == "User".$email.".json"){
                 
                 
                  if($token){

                    @$userstring= file_get_contents("db/User".$email.".json");
                    @$userObject= json_decode($userstring);

                   
                    $resetUser=[
                        'id'=> $nextUserid = $userObject->id,
                        'firstname'=>$firstname = $userObject->firstname,
                        'lastname'=>$lastname = $userObject->lastname,
                        'email'=>$email = $userObject->email,
                        'password'=> password_hash($password, PASSWORD_DEFAULT),
                        'department'=>$department= $userObject->department,
                        'position'=>$position= $userObject->position,
                        'phone'=>$phone= $userObject->phone,
                        'Reg_date_time'=>$Reg_date_time = $userObject->Reg_date_time,
                       ];

                   
                       unlink("db/User".$currentUsers);
                       
                      
                       file_put_contents("db/User".$email . ".json",json_encode($resetUser));

                       $_SESSION['reset']="Password Reset Successful! Login with new password";

                       $subject = "password Reset Link";
                       $message = "You have successfully Reset Password if you did not please log in and reset your password
                       click <a href='localhost/index.php'>here</a> to Sign In localhost/index.php";
                       $header = "From: reply@snh.org \n CC: incrediblesam.org";
                       
          
          
                       $try= mail($email,$subject,$message,$header);
                    
                  header("Location: index.php");
                  die();

                  }else{
                    $_SESSION['reset_fk']="Unauthorized access to password reset! ";
                    header("Location: index.php");
                    die();
                  }
                }
              } 
               
              
            }
        }else{
          $emailerror= "$email not correct";
        }
  }else{
        echo "fill in all fields in the form";
      } 
  
?>