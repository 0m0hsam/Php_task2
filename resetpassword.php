<?php 


$errorcount= 0;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;

$_SESSION['email']= $email;
//check eamil and character length
  if(!empty($email)){

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
             die();
           }
       }
     
          }
       $create_acct_error= "Invalid Email!!! create an account";
}
?>