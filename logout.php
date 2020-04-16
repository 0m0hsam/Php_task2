<?php
 session_start();
 include('Dashboard.php');
 // Create a logtime folder to save a user logout 
 $email=$_SESSION['email'];
$id=$_SESSION['id'];
$log_timer=date('H:i', time());
$log_id=str_ireplace(":","",$log_timer);

 if(session_unset() && session_destroy()){
     $logoutobject=[
         'logout_counter'=>$log_count,
         'logout_time'=>$logout_time,
         'logout_email'=>$email,
     ];
     file_put_contents("logtime/$log_id.LogoutTime".$_SESSION['email'] . ".json",json_encode($logoutobject));
     echo "Data saved";
 session_unset();
 session_destroy();
 header("Location: index.php");
 }
?>
