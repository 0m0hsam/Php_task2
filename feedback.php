<?php   session_start();
        include ('processfeedback.php');
        
        ?>
<form action="feedback.php" method="POST" >
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
    <p>
        <label>Region:</label><br>
        <input type="text" name="region" placeholder="Enter region"
        <?php  if(isset($_SESSION['region']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['region'];
     };?>>
    </p>
    <p>
        <label>Province:</label><br>
        <input type="text" name="province" placeholder="Enter province"
        <?php  if(isset($_SESSION['province']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['province'];
     };?>>
    </p>

    </p>
        Phone number:<br><input type="text" name="phone" placeholder="Enter phone Offered"
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
        <label>Select Department:</label><br>
        <select name="department">
            <label>Select Department:</label><br>
            <option>Select your department</option>
            <option <?php if(isset($_SESSION['Social Media']) && !empty($_SESSION['department'])){
           echo "Social Media";
        };?>>Social Media</option>
            <option <?php if(isset($_SESSION['Frontend']) && !empty($_SESSION['department'])){
           echo "Frontend";
        };?>>Frontend</option>
            <option <?php if(isset($_SESSION['Backend/Coding']) && !empty($_SESSION['department'])){
           echo "Backend/Coding";
        };?>>Backend/Coding</option>
            <option <?php if(isset($_SESSION['Graphics Design']) && !empty($_SESSION['department'])){
           echo "Graphics Design";
        };?>>Graphics Design</option>
        </select><br>
    </p>
    <p>
        <label>Select gender:</label><br>
        <select name="gender">
            <label>Select Department:</label><br>
            <option>Select Gender</option>
            <option <?php if(isset($_SESSION['female']) && !empty($_SESSION['gender'])){
           echo "Female";
        };?>>Female</option>
            <option <?php if(isset($_SESSION['male']) && !empty($_SESSION['gender'])){
           echo "Male";
        };?>>Male</option>
        </select><br>
    </p>
    <p>
        <label>Suggesstion and Complain box</label><br>
        
        <textarea name="complain" rows="10" col="30"></textarea><br><br>
    </p>
    <button type="submit">Submit</button>
       </form>
<p>    
    <label> Click home to cancel appointment</label>
   <a href="dashboard.php"><button type="submit">Home</button></a>
</p>
