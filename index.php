<?php
    session_start();
    include ('processlogin.php');
    session_destroy();
?>
    <h3>Login</h3>
   <?php if(isset($_SESSION['message'])){
             echo"<span style= 'color:green'>".$_SESSION['message']."</span>";
                  }
                if(isset($_SESSION['reset_error'])){
          echo"<span style= 'color:red'>".$_SESSION['reset_error']."</span>";
         }
         if(isset($_SESSION['reset'])){
            echo"<span style= 'color:green'>".$_SESSION['reset']."</span>";
         }
         if(isset($_SESSION['reset_fk'])){
            echo"<span style= 'color:red'>".$_SESSION['reset']."</span>";
         }
    ?>
    <form action="index.php" method="POST">
<p>
    <lable>Email:</label><br> 
    <input type="text" name="email"
    <?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        echo "value=".$_SESSION['email'];
     }?>><?php echo "<span style= 'color:red'>".@$emailerror,@$emaillenerror,@$invalidemailerror."</span>";?><br>
</p>
<p>
    <label>Password:</label> <br> 
    <input type="password" name="password">
    <?php echo "<span style= 'color:red'>".@$invalidpassworderror."</span>";?><br></br>
    <input type="submit" value="Login" name="login"><br>
    </form>
</p>
<p>    
    <label>Sign up Create an account</label>
   <a href="reg.php"><button type="submit" name="signup">Sign up</button></a>
</p>
<p>    
    <label>Forget password click here</label>
   <a href="forgetpassword.php"><button type="submit">Forget password</button></a>
</p>
