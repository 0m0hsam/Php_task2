<?php
// To accept patient appointment 
  function accept_appointment(){?>
  <form action="checkpatient.php" method="POST">

    <h3>Accept Patient Appointment</h3>
 <p> 
   fill in to reply patient appointment<br> 
    <label>Patient department</label><br>
    <input type="text" name="department" placeholder="Patient Department"><br>
</p>

<p>
    <label>Accepted email</label><br>
    <input type="text" name="email" placeholder="Accepted email"><br>
</p>
<p>
    <label>Patient feedback</label><br>
    <textarea rows="10" cols="30" type="text" name="feedback"></textarea>
</p>
    <input type="submit" value="Accept Appointment">
  </form>
<?php };?>

<?php
//Functions to check all SHN Hospital activties
 function patient(){

          // To check patient appointment
          if(isset($_POST['department'])&&!empty($_POST['department'])&&isset($_POST['email'])&&!empty($_POST['email'])){
            $department=str_replace( ' ','',str_replace('/','',$_POST['department']));
            $email=$_POST['email'];
  
            
             $alllogout= scandir("appointmentDB");
      $countalllogout= count($alllogout);
      $nextUserid=($countalllogout-2);
    
     
        for($counter=0 ; $counter < $countalllogout; $counter++){
         $currentlogout= $alllogout[$counter];
                
          if($currentlogout == "patient".$department.$email.".json"){
              //check patient file
              @$logoutstring= file_get_contents("appointmentDB/patient".$department.$email.".json");
              @$userObject= json_decode($logoutstring);
              $firstname= $userObject->firstname;
              $lastname= $userObject->lastname;
              $appointment= $userObject->appointment;
              $department= $userObject->department;
              $phone= $userObject->phone;
              $email= $userObject->email;
              $complain= $userObject->complain;
              $gender= $userObject->gender;
              $appointment_date= $userObject->appointment_date;
              $appointment_time= $userObject->appointment_time;

            //Printout patient appointment
              echo "Medical appointment for $department department";
              echo '<li> Name: '.$firstname.' '.$lastname.'</li>';
              echo '<li> Phone number: '.$phone.'</li>';
              echo '<li> Email: '.$email.'</li>';
              echo '<li> gender: '.$gender.'</li>';
              echo '<li> Appointment: '.$appointment.'</li>';
              echo '<li> Department: '.$department.'</li>';
              echo '<li> Complain: '.$complain.'</li>';
              echo '<li> Appointment Date: '.$appointment_date.'</li>';
              echo '<li> Appointment Time: '.$appointment_time.'</li>';
             
              accept_appointment();
            if(isset($_POST['department'])&&!empty($_POST['department'])&&isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['feedback'])&&!empty($_POST['feedback'])){
              $department=$_POST['department'];
              $email=$_POST['email'];
              $feedback=$_POST['feedback'];

                      $allUsers= scandir("acceptAppointment");
              $countallUsers= count($allUsers);
              $nextUserid=($countallUsers-2);
            $userobject=[
              'id'=> $nextUserid,
              'email'=>$email,
              'department'=>$department,
              'feedback'=>$feedback,
              'PersonsName'=>$_SESSION['firstname_login']." ".$_SESSION['lastname_login'],
              'Personsemail'=>$_SESSION['email_login'],
              'Reg_date_time'=> date('D M Y / H:i',time()),
            ];
                      
          //save user data into file
          $time= date('H i',time());
          file_put_contents("acceptAppointment/$time".$email . ".json",json_encode($userobject));
          $_SESSION['message']="Succesfully accepted patient appointment ";
              header("Location: dashboard.php");
              die();


            }
              
            die();
          }

          }
          echo "Please check back! $department  department has no pending patient appointment. ";

      }else{
        echo "<span style=color:blue>Fill in both department and patient email</span> ";

      }
    
    }

function checkuser(){
echo '<form action="dashboard.php" method="POST">
             <p>
             <h4>Search for logout time<h4>
             <label>Enter Logout Date:<br>in this format 02/05/2020</label><br> <input type="text" name="date"><br>
             <label> Enter User Email:</label><br> <input type="text" name="email">
             <button type="submit">search</button> </form>
             </p>';
             // Search for user in database
            echo'<form action="dashboard.php" method="POST">
            <p>
            <h4>Search for user in database<h4>
            <label>Enter user email:</label><br> <input type="text" name="searchdb" >
            <button type="submit">search</button> </form>
            </p>';
                if(isset($_POST['searchdb'])&&!empty($_POST['searchdb'])){
                  $searchdb=$_POST['searchdb'];
                  if(@$data= file_get_contents("db/User".$searchdb.".json")){
                  
                  @$userObject= json_decode($data);
                  $firstname= $userObject->firstname;
                  $lastname= $userObject->lastname;
                  $position= $userObject->position;
                  $phone= $userObject->phone;
                  $email= $userObject->email;
                  $Reg_date_time= $userObject->Reg_date_time;
                  echo '<li> Name: '.$firstname.' '.$lastname.'</li>';
                  echo '<li> Position Held: '.$position.'</li>';
                  echo '<li> Phone number: '.$phone.'</li>';
                  echo '<li> Email: '.$email.'</li>';
                  echo '<li> Registration Date: '.$Reg_date_time.'</li>';
                  }
                  die();
                }
                   //check user logout time
                if(isset($_POST['date'])&&!empty($_POST['date'])&&isset($_POST['email'])&&!empty($_POST['email'])){
                  $date=str_replace( ' ','',str_replace('/','',$_POST['date']));
                  $email=$_POST['email'];
        
                  
                   $alllogout= scandir("logtime");
            $countalllogout= count($alllogout);
            $nextUserid=($countalllogout-2);
          
           //check if user already exist
              for($counter=0 ; $counter < $countalllogout; $counter++){
               $currentlogout= $alllogout[$counter];

                if($currentlogout == $date.$email.".json"){
                    //check user logout 
                    @$logoutstring= file_get_contents("logtime/$date".$email.".json");
                    @$userObject= json_decode($logoutstring);
                    $logout_time= $userObject->logout_time;
                    echo '<li>'.$email.' last logout time '.$logout_time.'</li>';
                    

                }

                }
            } die();
        }

  function checkpay(){
        // To check patient appointment
      
       
        if(isset($_POST['department'])&&!empty($_POST['department'])){
          @$departmentPay=str_replace(' ','',$_POST['department']);   

          //Checking database
        $allPays = scandir("payment");
        $countallPays= count($allPays);
        $nextUserid=($countallPays-2);
        
        for($counter=3; $counter < $countallPays; $counter++){
            $currentallPays= $allPays[$counter];

            //check payment file
            @$logoutstring= file_get_contents("payment/$currentallPays");
            @$userObject= json_decode($logoutstring);
            $firstname= $userObject->firstname;
            $lastname= $userObject->lastname;
            $department= $userObject->department;
            $phone= $userObject->phone;
            $email= $userObject->email;
            $amount= $userObject->amount;
            $pay_time= $userObject->Reg_date_time;

          //Printout payment

                if($departmentPay == $department){
                  echo "Medical payment made and department";
                  echo "<li>Date/time:$pay_time Name:$firstname $lastname  Email: $email Phone: $phone <br> Department: $department Amount: $amount</li>";
              
                }
                if($departmentPay == "ALL"){
                  echo "Medical payment made and department";
                  echo "<li>Date/time:$pay_time Name:$firstname $lastname  Email: $email Phone: $phone <br> Department: $department Amount: $amount</li>"; 
              }
      
        }
           echo "Please check back! $department  department has no pending patient appointment";
        die();
  }
}
  
  function alartPatient(){
    //Checking database
    $allPays = scandir("acceptAppointment");
    $countallPays= count($allPays);
    $nextUserid=($countallPays);

    for($counter=0; $counter < $countallPays; $counter++){
        $currentallPays= $allPays[$counter];

        //check payment file
        @$logoutstring= file_get_contents("acceptAppointment/$currentallPays");
        @$userObject= json_decode($logoutstring);
        @$email= $userObject->email;
        if($email == $_SESSION['email_login']){
          @$department= $userObject->department;
          @$personsName= $userObject->PersonsName;
         @$personsemail= $userObject->Personsemail;
          @$feedback= $userObject->feedback;
          @$Reg_date_time= $userObject->Reg_date_time;
          echo "<h3>Acctepted appointment by SNH Hospital</h3>";
          echo '<li> Department: '.$department.'</li>';
          echo '<li> Persons Incharge Name: '.$personsName.'</li>';
          echo '<li> Persons Incharge Name: '.$personsemail.'</li>';
          echo '<li> Feedback: '.$feedback.'</li>';
          echo '<li> Registration Date: '.$Reg_date_time.'</li>';
        }
      
  }
}
function homepage_alart(){
    include_once('dashborad.php');
    if(isset($_POST['logout'])){
    echo $email=$_SESSION['email_login'];
$id=$_SESSION['id'];
$id=$id+1;
$logout_timer=date('d m Y', time());
echo $log_id=str_ireplace(" ","",$logout_timer);
     $logoutobject=[
         'logout_counter'=>$id,
         'logout_time'=>$logout_time,
         'logout_email'=>$email
     ];
     file_put_contents("logtime/$log_id".$email.".json",json_encode($logoutobject));
     echo "Data saved";
    }

  if(isset($_SESSION['email_login'])&&!empty($_SESSION['email_login'])){
    echo '<a href="payment.php"><button type="submit">Online Payment</button></a>';
  }
  if((@$_SESSION['position'] == "Medical Director") || (@$_SESSION['position'] == "Medical TM")){
    echo '<a href="checkpatient.php"><button type="submit">Check all appointment</button></a>';
  }else{
    echo  '<a href="appointment.php"><button type="submit">Book an appointment</button></a>';
  }
  if(@$_SESSION['position'] == "Medical Director"){
    echo '<a href="checkpay.php"><button type="submit">Check medical payment</button></a>';
  }
  if(isset($_SESSION['ravaalart'])&&!empty($_SESSION['ravaalart'])){
    echo "<span style='color:green'>". $_SESSION['ravaalart']."</span><br>";
}
if(!empty($_SESSION['message'])&&isset($_SESSION['message'])&&!isset($_SESSION['ravaalart'])){
  echo"<span style='color:green'>". $message= $_SESSION['message']."</span><br>";
}
}
           
?>