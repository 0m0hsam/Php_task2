<?php session_start();
include ('processcheck.php');
    
?>
<h2>Welcome to SNH Hospital App<h2>
<?php   @homepage_alart();?>
<p>
<label>Username :<?php if(isset($_SESSION['firstname_login'])&& !empty($_SESSION['firstname_login']) && isset($_SESSION['lastname_login'])&& !empty($_SESSION['lastname_login'])){
          $_SESSION['loged_in']; echo ucfirst($_SESSION['firstname_login'])."  ".ucfirst($_SESSION['lastname_login']);}?>
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
<label>login time:</label>
<?php 
if(isset($_SESSION['email_login']) && !empty($_SESSION['email_login'])){
    //use to take logout time
    echo date('D M Y  H:i', time());
} 
?>
</p>

<p>
<?php
//<label>Last logout time:</label>logout_checker();?>
</p>

<form method="POST" action="Dashboard.php">
<button type="logout" style="color:red" value="<?php $_SESSION['email_login']; ?>"name="logout" >Log out</button>&nbsp;&nbsp;
</form>
<p><h4><a href="dashboard.php">Home</a>      <a href="reset.php">Reset password</a> </h4></p>
<?php
 if(@$_SESSION['position'] == "Medical Director"){
    checkuser();
 };             
 alartPatient();
 ?>