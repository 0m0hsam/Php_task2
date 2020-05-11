<?php
if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['department'])&&isset($_POST['amount'])&&isset($_POST['pay_reasons'])){
session_start();
  $firstname =$_POST['firstname'];
  @$lastname = $_POST['lastname'];
  @$phone = $_POST['phone'];
  @$email = $_POST['email'];
 @$amount = $_POST['amount'];
  @$department = $_POST['department'];
  @$pay_reasons= $_POST['pay_reasons'];
  
$_SESSION['firstname']=ucfirst(str_replace('  ','',$firstname));
$_SESSION['lastname']=ucfirst(str_replace('  ','',$lastname));
$_SESSION['phone']= $phone;
$_SESSION['email']=$email;
$_SESSION['amount']= $amount;
$_SESSION['department']=$department;
$_SESSION['pay_reasons']= $pay_reasons;

  //remove for whitespace and check numeric input
  if (!empty($firstname)&&!empty($lastname)&&!empty($phone)&&!empty($email)&&!empty($amount)&&!empty($department)&&!empty($pay_reasons)){
    
    if(strlen($firstname)>=2 && strlen($lastname)>=2){
      
      if (ctype_alpha($firstname) && ctype_alpha($lastname) ){
            
            if (preg_match("/[@]/",$email)){

                if(ctype_digit($phone)&ctype_digit($amount)){
                
                if(strlen($email)<5){
                    $emaillenerror= " invalid less than five character";
                }else{
            //Checking database
            echo $allUsers= scandir("payment");
            $countallUsers= count($allUsers);
           echo $nextUserid=($countallUsers-2);
            $userobject=[
            'id'=> $nextUserid,
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'pay_reasons'=>$pay_reasons,
            'department'=>$department,
            'amount'=>$amount,
            'phone'=>$phone,
            'Reg_date_time'=> date('D M Y / H:i',time()),
            ];
                    //save Pay histroy into file
                        $time= date('H i', time());
                    if(file_put_contents("payment/$time pay".$email . ".json",json_encode($userobject))){
                    $_SESSION['message']="Succesfully signup! you can now login ";
                        header("Location: test.php");
                        die();
                    }else{
                       echo"Pay not successful try again" ;
                       die();
                    }
                    
                    }
                }else{
                    $errornum="must be number";
                   
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
        echo "<span style='color:red'>fill in all fields in the form</span>";
  }
} 
?>