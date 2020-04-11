<?php   session_start();
        include ('processreg.php');
        session_destroy();
        ?>
   <?php if(!empty($_SESSION['message1'])){
         echo"<span style= 'color:red'>". $message= $_SESSION['message1']."</span>";
         }
    ?>
<form action="reg.php" method="POST" >
    <p>
        Firstame:<br><input type="text" name="firstname" placeholder="Enter firstname"
       <?php  if(isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['firstname'];
     };?>><?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?>   
    </p>
    <p>
        <label>Lastame:</label><br>
        <input type="text" name="lastname" placeholder="Enter lastname"
        <?php  if(isset($_SESSION['lastname']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['lastname'];
     };?>> <?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?><br>
    </p>
    </p>
        phone number:<br><input type="text" name="phone" placeholder="Enter phone Offered"
        <?php  if(isset($_SESSION['phone']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['phone'];
     };?>><br> 
    </p>
    <p>  
        <label>Email:</label><br>
        <input type="text" name="email" placeholder="Enter email"
        <?php  if(isset($_SESSION['email']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['email'];
     }?>><?php echo "<span style= 'color:red'>".@$emailerror,@$emaillenerror."</span>";?><br>
    </p>
    <p>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="Enter password">
    </p>
    <p>
        <label>Select Department:</label><br>
        <select name="department">
            <label>Select Department:</label><br>
            <option>Select your department</option>
            <option <?php if(isset($_SESSION['UX/UI Design']) && !empty($_SESSION['department'])){
           echo "Socail Media";
        };?>>Social Media</option>
            <option <?php if(isset($_SESSION['frontend Design']) && !empty($_SESSION['department'])){
           echo "frontend Design";
        };?>>Frontend Design</option>
            <option <?php if(isset($_SESSION['Backend/Coding']) && !empty($_SESSION['department'])){
           echo "Backend/Coding";
        };?>>Backend/Coding</option>
            <option <?php if(isset($_SESSION['Mobile']) && !empty($_SESSION['Mobile'])){
           echo "Grapic Design";
        };?>>Grapics Desigin</option>
        </select><br>
    </p>
    <p>
        <label>Select Position:</label><br>
        <select name="position">
            <label>Select</label>
            <option>Select your position</option>
        <option <?php if(isset($_SESSION['position']) && $_SESSION['position']){
           echo "valu= HOD";
        };?>>HOD</option>
            <option <?php  if(isset($_SESSION['position']) && $_SESSION['position']){
           echo "value= REP";
        };?>>REP</option>
            <option <?php  if(isset($_SESSION['position']) && $_SESSION['position']){
           echo "value= Member";
        };?>>MEMBE</option>
        </select><br><br>
        <input type="submit" name="Sign up">
    </p>
       </form>
<p>    
    <label> Click here for forget password</label>
   <a href="forgetpassword.php"><button type="submit">Forget password</button></a>
</p>
