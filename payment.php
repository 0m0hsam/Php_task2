<?php
   include_once('processpay.php');

?>
<h3>
Medical Payment Portal
</h3>
<form method="POST" action="payment.php">
   <p>
        <label>Firstname:</label><br><input type="text" name="firstname" placeholder="Enter firstname"
       <?php  if(isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['firstname'];
     };?>><?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?>
    </p>
 <p>
        <label>Lastname:</label><br><input type="text" name="lastname" placeholder="Enter lastname"
       <?php  if(isset($_SESSION['lastname']) && !empty($_SESSION['lastname'])){
        echo "value=".$_SESSION['lastname'];
     };?>><?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?>
    </p>
    <p>
        <label>Email:</label><br>
        <input type="text" name="email" placeholder="Enter Email"
        <?php  if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        echo "value=".$_SESSION['email'];
     };?>> <?php echo "<span style= 'color:red'>".@$emaillenerror."</span>";?><br>
    </p>
 <p>
        <label>Phone number:</label><br>
        <input type="text" name="phone" placeholder="Enter Phone number"
        <?php  if(isset($_SESSION['phone']) && !empty($_SESSION['phone'])){
        echo "value=".$_SESSION['phone'];
     };?>> <?php echo "<span style= 'color:red'>".@$errornum."</span>";?><br>
    </p>
    <p>
        <label>Amount to pay:</label><br>
        <input type="text" name="amount" placeholder="Enter Amount to pay"
        <?php  if(isset($_SESSION['amount']) && !empty($_SESSION['amount'])){
        echo "value=".$_SESSION['amount'];
     };?>> <?php echo "<span style= 'color:red'>".@$errornum."</span>";?><br>
    </p>

  <p><label>Department To Pay</label><br>
<select name="department" id="" value="0">
<option value="">Select Your Department</option>
<option value="Pharmacy">Pharmacy</option>
<option value="Surgery">Surgery</option>
<option value="Maternity">Maternity</option>
<option value="Radiology">Radiology</option>
</select>
</p>
<label>Reasons For Making Payment</label><br>
<textarea name="pay_reasons" rows="10" cols="30">Reasons for payment</textarea><br>
<p>
<button type="submit" name="ravepay">Pay</button>
</p>
</form>
<p> <a href="dashboard.php">Home<a>    <a href="">Payment Complain Unit</a> </p>