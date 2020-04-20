<?php
    session_start();
    require_once ('processcheck.php');
    
     if(!empty($_SESSION['message'])){
        echo"<span style= 'color:green'>". $message= $_SESSION['message']."</span>";
    }
?>
<h2>Welcome to Dashboard<h2>
<?php
if((@$_SESSION['position'] == "Medical Director") || (@$_SESSION['position'] == "Medical TM")){
    echo '<a href="checkpatient.php"><button type="submit">Check all appointment</button></a>';
}else{
    echo  '<a href="appointment.php"><button type="submit">Book an appointment</button></a>';
}
?>
<p>
<label>Username :<?php if(isset($_SESSION['firstname_login'])&& !empty($_SESSION['firstname_login']) && isset($_SESSION['lastname_login'])&& !empty($_SESSION['lastname_login'])){
          $_SESSION['loged_in']; echo $_SESSION['firstname_login']."  ".$_SESSION['lastname_login'];}?>
</label>
</p>
<p>
<label>Position:<?php if(isset($_SESSION['position'])&& !empty($_SESSION['position'])){
           echo $_SESSION['position'];}?>
</label>
</p>
<p>
<label>login email:<?php if(isset( $_SESSION['email_login'])&& !empty( $_SESSION['email_login'])){
           echo  $_SESSION['email_login'];}?>
</label>
</p>

<p>
<label>login time:<?php echo $logout_time=date('D M Y  H:i', time()); 
if(isset($_SESSION['logout_time']) && !empty($_SESSION['logout_time'])){
    //use to take logout time
    $_SESSION['log_time']= $logout_time;}
?></label>
</p>


<p>
<h4><a href="dashboard.php">Home</a>   <a href="logout.php">Logout</a>    <a href="reset.php">Reset password</a> </h4>
 
<?php if(@$_SESSION['position'] == "Medical Director"){
    checkuser();
             };?>
</p