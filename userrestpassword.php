<?php
    session_start();
    include ('processlogin.php');
    session_destroy();
?>
    <h3>User reset password</h3>
<p>    
    <label><a href="dashboard.php">HOME</a> <br> <a href="logout.php">Logout</a></label>  
</p>

    <form action="index.php" method="POST">
<p>
    <lable>Email:</label><br> 
    <input type="text" name="email"
    <?php
        if(isset($_SESSION['email'])&& !empty($_SESSION['email'])){
           echo "value=".$_SESSION['email'];
        }?>><?php echo "<span style= 'color:red'>".@$emailerror,@$emaillenerror,@$invalidemailerror."</span>";?><br>
</p>
<p>
    <label>Password:</label> <br> 
    <input type="text" name="password">
    <?php echo "<span style= 'color:red'>".@$invalidpassworderror."</span>";?><br></br>
    <input type="submit" value="Login" name="login"><br>
    </form>
</p>
