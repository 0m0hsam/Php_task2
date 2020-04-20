<?php
    @session_start();

$errorcount= 0;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
@$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;

$_SESSION['email']= $email;
//check eamil and character length
  if(!empty($email)&& !empty($password)){

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
           //check user password 
           @$userstring= file_get_contents("db/User".$email.".json");
            @$userObject= json_decode($userstring);
            $DBpassword= $userObject->password;
           $Userpassword= password_verify($password, $DBpassword);
           if($password == $Userpassword){
            echo $_SESSION['loged_in']= $userObject->id;
            echo $_SESSION['firstname_login']= $userObject->firstname;
            echo $_SESSION['lastname_login']= $userObject->lastname;
            echo $_SESSION['email_login']= $userObject->email;
            echo $_SESSION['Reg_date_time']= $userObject->Reg_date_time;
            echo $_SESSION['position']= $userObject->position;
           
                           
            
            header('Location: dashboard.php');
            die();
           }else{
             $invalidpassworderror= "Invalid password create an account";
           }

       }else{
             $invalidemailerror= "Email not recognise create an account";
       }
     }
            
          }
  }else{
        echo "fill in all fields in the form";
      }
?>