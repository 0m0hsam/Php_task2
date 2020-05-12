
<?php   session_start();
        include ('processappoint.php');
        
        ?>
<form action="appointment.php" method="POST" >
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
        <label>Nature of appointment:</label><br>
        <input type="text" name="appointment" placeholder="Nature of appointment"
        <?php  if(isset($_SESSION['appointment']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['appointment'];
     }?>>
    </p>
    <p>  
        <label>Appointment Date:</label><br>
        <input type="text" name="appointment_date" placeholder="Appointment Date"
        <?php  if(isset($_SESSION['appointment_date']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['appointment_date'];
     }?>>
     <p>  
        <label>Appointment Time:</label><br>
        <input type="text" name="appointment_time" placeholder="Appointment time"
        <?php  if(isset($_SESSION['appointment_time']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['appointment_time'];
     }?>>
    </p>
    </p>
    <p>
        <label>Select Department:</label><br>
        <select name="department">
            <label>Select Department:</label><br>
            <option>Select Medical department</option>
            <option <?php if(isset($_SESSION['Maternity']) && !empty($_SESSION['department'])){
           echo "MATERNITY";
        };?>>MATERNITY</option>
            <option <?php if(isset($_SESSION['Surgery']) && !empty($_SESSION['department'])){
           echo "SURGERY";
        };?>>SURGERY</option>
            <option <?php if(isset($_SESSION['Radiology']) && !empty($_SESSION['department'])){
           echo "RADIOLOGY";
        };?>>RADIOLOGY</option>
            <option <?php if(isset($_SESSION['Pharmacy']) && !empty($_SESSION['department'])){
           echo "PHARMACY";
        };?>>PHARMACY</option>
        </select><br>
    </p>
    <p>
        <label>Select gender:</label><br>
        <select name="gender">
            <label>Select Department:</label><br>
            <option>Select Medical department</option>
            <option <?php if(isset($_SESSION['female']) && !empty($_SESSION['gender'])){
           echo "Female";
        };?>>Female</option>
            <option <?php if(isset($_SESSION['male']) && !empty($_SESSION['gender'])){
           echo "Male";
        };?>>Male</option>
        </select><br>
    </p>
    <p>
        <label>Patient complain box <br> please fill in all medical complain and symptoms...</label><br>
        
        <textarea name="complain" rows="10" col="30"></textarea><br><br>
    </p>
    <button type="submit">Book appointment</button>
       </form>
<p>    
    <label> Click home to cancel appointment</label>
   <a href="dashboard.php"><button type="submit">Home</button></a>
</p>

