
<?php session_start();
include ('processreset.php');
//echo $_SESSION['token'];


    if(!isset($_SESSION['loged_in'])&&!isset($_GET['token']) && !isset($_SESSION['token'])){
    $_SESSION['token_error']="You are not authorised to access this page";
    header("Location: index.php");

    die();
    }

    if(isset($_SESSION['email_error']) && !empty($_SESSION['email_error'])){
        echo"<span style= 'color:red'>".$_SESSION['email_error']."</span>";
         }

?>
<h3>Reset Password</h3><br>
<a href="dashboard.php"><button type="submit">Home</button></a><br>
<p>Reset Password associated with your accoount email</p>
<?php   if (isset($_SESSION['try'])){
    echo "<span style= color:red>".$_SESSION['email_match']."</span>";
} ?>
<form action="reset.php" method="POST">
<?php  if(!isset($_SESSION['loged_in'])){?>
<p>
    <input type="hidden" name="token" 
    <?php
    if(isset($_SESSION['token'])){
     echo "value='".$_SESSION['token']."'";
    }else{
        echo "value='".$_GET['token']."'";
    }?>
    />
 </p>
<?php }?>
 <p>
     <label>Email</label><br/>
     <input type="text" name="email" placeholder="Email" />
     <?php echo "<span style= 'color:red'>".@$emailerror,@$emaillenerror,@$invalidemailerror."</span>";?><br>
 </p>
 <p>
     <label>Enter New Password</label><br/>
     <input type="password" name="password" placeholder="password" />
 </p>
 <p>
     <input type="submit" value="Reset Password">
 </p>
</form>



