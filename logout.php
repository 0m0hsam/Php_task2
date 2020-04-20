<?php
 session_start();
 include('Dashboard.php');
 
 $email=$_SESSION['email'];
$id=$_SESSION['id'];
$id=$id+1;
$log_timer=date('d m Y', time());
$log_id=str_ireplace(" ","",$log_timer);

 if(session_unset() && session_destroy()){
     $logoutobject=[
         'logout_counter'=>$id,
         'logout_time'=>$logout_time,
         'logout_email'=>$email,
     ];
     file_put_contents("logtime/$log_id".$email. ".json",json_encode($logoutobject));
     echo "Data saved";
 session_unset();
 session_destroy();
 header("Location: index.php");
 }
?>