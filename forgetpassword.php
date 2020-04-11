<?php session_start();
    
    include('resetpassword.php');
?>
<h3>Forget password</h3><br>
<h4>Enter valid email associated with your account</h4>
<form action="forgetpassword.php" method="POST">
<p>
    <lable>Email:</label><br> 
    <input type="text" name="email"
    <?php
        if(isset($_SESSION['email'])&& !empty($_SESSION['email'])){
           echo "value=".$_SESSION['email'];
        }?>><?php echo "<span style= 'color:red'>".@$emailerror,@$emaillenerror,@$invalidemailerror."</span>";?><br><br>
    <input type="submit"  value="Send Reset code"</button>
</p>
</form>
<?php echo "<span style= 'color:red'>".@$create_acct_error."</span>";?><br>
<a href="reg.php"><button type="submit">Create an account</button></a>
