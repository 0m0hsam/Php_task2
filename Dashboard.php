<?php
    session_start();
    include_once ('processlog.php');
    
    
?>
<h2>Welcome to Dashboard<h2>
<p>
<label>Username :<?php if(isset($_SESSION['firstname'])&& !empty($_SESSION['firstname']) && isset($_SESSION['lastname'])&& !empty($_SESSION['lastname'])){
          $_SESSION['id']; echo $_SESSION['firstname']."  ".$_SESSION['lastname'];}?>
</label>
</p>
<p>
<label>Position:<?php if(isset($_SESSION['position'])&& !empty($_SESSION['position'])){
           echo $_SESSION['position'];}?>
</label>
</p>
<p>
<label>login email:<?php if(isset( $_SESSION['email'])&& !empty( $_SESSION['email'])){
           echo  $_SESSION['email'];}?>
</label>
</p>

<p>
    //use to take logout time
<label>login time:<?php echo $logout_time=date('D M Y  H:i', time()); 
if(isset($_SESSION['logout_time']) && !empty($_SESSION['logout_time'])){
    $_SESSION['logout_time']= $logout_time;}
?></label>
</p>


<p>
<h4>Home   <a href="logout.php">Logout</a>    <a href="rest.php">Reset password</a></h4>
</p>
