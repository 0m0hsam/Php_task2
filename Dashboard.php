<?php 
include ('processcheck.php');
session_unset();
    
?>
<h2>Welcome to Dashboard<h2>
<?php session_start();  @homepage_alart();?>
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
   session_start();
    //use to take logout time
    $_SESSION['log_time']= $logout_time;}
?></label>
</p>


<p>
<a href="logout.php" ><button type="logout" style="color:red" name="logout" >Log out</button></a> &nbsp;&nbsp;<h4><a href="dashboard.php">Home</a>      <a href="reset.php">Reset password</a> </h4>
 
<?php if(@$_SESSION['position'] == "Medical Director"){
    checkuser();
             };
             
 alartPatient();?>
</p