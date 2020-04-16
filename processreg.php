<h3>Process Registration page</h3>
//Create a folder name db to save user registration data Json file
<?php
@session_start();

$errorcount = 0;
@$firstname = $_POST['firstname'] != "" ? $_POST['firstname'] : $errorcount++;
@$lastname = $_POST['lastname'] != "" ? $_POST['lastname'] : $errorcount++;
@$phone = $_POST['phone'] != "" ? $_POST['phone'] : $errorcount++;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
@$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;
@$department = $_POST['department'] != "" ? $_POST['department'] : $errorcount++;
@$position = $_POST['position'] != "" ? $_POST['position'] : $errorcount++;


$_SESSION['firstname']=str_replace('  ','',$firstname);
$_SESSION['lastname']=str_replace('  ','',$lastname);
$_SESSION['phone']= $phone;
$_SESSION['email']=$email;
$_SESSION['department']=$department;
$_SESSION['position']= $position;

  //remove for whitespace and check numeric input
  if (!empty($firstname)&&!empty($email)&&!empty($lastname)&&!empty($department)&&!empty($phone)&&!empty($password)&&!empty($position)){
    
    if(strlen($firstname)>=2 && strlen($lastname)>=2){
      
      if (ctype_alpha($firstname) && ctype_alpha($lastname) ){
        
        if (preg_match("/[@]/",$email)){
        
          if(strlen($email)<5){
            $emaillenerror= " invalid less than five character";
          }else{
      //Checking database
      $allUsers= scandir("db");
      $countallUsers= count($allUsers);
      $nextUserid=($countallUsers-2);
     $userobject=[
      'id'=> $nextUserid,
      'firstname'=>$firstname,
      'lastname'=>$lastname,
      'email'=>$email,
      'password'=> password_hash($password, PASSWORD_DEFAULT),
      'department'=>$department,
      'position'=>$position,
      'phone'=>$phone,
      'Reg_date_time'=> date('D M Y / H:i',time()),
     ];
              
              //check if user already exist
              for($counter=0; $counter < $countallUsers; $counter++){
                $currentUsers= $allUsers[$counter];
            
                if($currentUsers == "User".$email.".json"){
                  $_SESSION['message1']="Email already exist! can't be use try another email";
                  header("Location: Reg.php");
                  die();
                }
              }
              //create db folder to save user data into a Json file
              file_put_contents("db/User".$email . ".json",json_encode($userobject));
              $_SESSION['message']="Succesfully signup! you can now login ";
                  header("Location: index.php");
                  die();
            
            }
        }else{
          $emailerror= "$email not correct";
        }
     }else{
      $alphanumerror= "Enter only alphabet input";
     }
    }else{
      $nameerror= "Name enter less than 2";  
    }
  }else{
        echo "fill in all fields in the form";
      } 
    //}else{
    //  echo "Welcome";
   // } 
?>
