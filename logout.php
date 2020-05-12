<?php

//include('processlogin.php');
 
 echo $email=$_SESSION['email_login'];
$id=$_SESSION['id'];
$id=$id+1;
$logout_timer=date('d m Y', time());
echo $log_id=str_ireplace(" ","",$logout_timer);
 if($email){
     $logoutobject=[
         'logout_counter'=>$id,
         'logout_time'=>$logout_time,
         'logout_email'=>$email
     ];
     file_put_contents("logtime/$log_id".$email.".json",json_encode($logoutobject));
     echo "Data saved";
     if($email){
 session_unset();
 session_destroy();
 header("Location: index.php");
     }
    }
?>