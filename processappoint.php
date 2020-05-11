<h3>Patient appointment form</h3>
<?php
@session_start();
echo "SHN MEDICAL BOOKING APPOINTMENT FORM <br>";
$errorcount = 0;
@$firstname = $_POST['firstname'] != "" ? $_POST['firstname'] : $errorcount++;
@$lastname = $_POST['lastname'] != "" ? $_POST['lastname'] : $errorcount++;
@$phone = $_POST['phone'] != "" ? $_POST['phone'] : $errorcount++;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
@$appointment = $_POST['appointment'] != "" ? $_POST['appointment'] : $errorcount++;
@$appointment_date = $_POST['appointment_date'] != "" ? $_POST['appointment_date'] : $errorcount++;
@$appointment_time = $_POST['appointment_time'] != "" ? $_POST['appointment_time'] : $errorcount++;
@$department = $_POST['department'] != "" ? $_POST['department'] : $errorcount++;
@$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorcount++;
@$complain = $_POST['complain'] != "" ? $_POST['complain'] : $errorcount++;

$_SESSION['firstname']= str_replace(" ",'',ucfirst($firstname));
$_SESSION['lastname']=str_replace(" ",'',ucfirst($lastname));
$_SESSION['phone']= $phone;
$_SESSION['email']=$email;
$_SESSION['appointment']=$appointment;
$_SESSION['appointment_date']= $appointment_date;
$_SESSION['appointment_time']= $appointment_time;
$_SESSION['department']=str_replace(" ",'',ucfirst($department));
$_SESSION['gender']=$gender;
$_SESSION['complain']= $complain;

  //remove for whitespace and check numeric input
  if (!empty($firstname)&&!empty($lastname)&&!empty($phone)&&!empty($email)&&!empty($appointment)&&!empty($appointment_date)&&!empty($appointment_time)&&!empty($department)&&!empty($gender)&&!empty($complain)){
    
    if(strlen($firstname)>=2 && strlen($lastname)>=2){
    
      if (ctype_alpha($firstname) && ctype_alpha($lastname) ){
        
        if (preg_match("/[@]/",$email)){
                   
           if(strlen($email)<5){
            $emaillenerror= " invalid less than five character";
          }else{
      //Checking database
      $allUsers= scandir("appointmentDB");
      $countallUsers= count($allUsers);
      $nextUserid=($countallUsers-2);
      //patient data
     $patient_file=[
      'id'=> $nextUserid,
      'firstname'=>$firstname,
      'lastname'=>$lastname,
      'phone'=>$phone,
      'email'=>$email,
      'appointment'=>$appointment,
      'appointment_date'=>$appointment_date,
      'appointment_time'=>$appointment_time,
      'department'=>$department,
      'gender'=>$gender,
      'complain'=>$complain,
     ];
              

              //save patient data into file
              file_put_contents("appointmentDB/patient".$department.$email. ".json",json_encode($patient_file));
              $_SESSION['message']="You have Succesfully booked your appointment ";
                  header("Location: dashboard.php");
                  die();
            
            }
        }else{
          $emailerror= "$email incorrect email <br>";
        }
     }else{
      $alphanumerror= "Enter only alphabet ";
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