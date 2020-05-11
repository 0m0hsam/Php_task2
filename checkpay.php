<?php session_start();
    include('processcheck.php');

    
?>
<h3> Medical Payment History</h3>
<p>
<a href="dashboard.php"><button type="submit">Home</button></a><br>
<?php echo "<span style='color:blue'> To check Medical payment enter Department name or All to check all payment made </span> "; ?>
</p>
<form action="checkpay.php" method="POST">
<p>
    <label>Search to Check all payment made online</label><br>
    <input type="text" name="department" placeholder="Patient Department">
    &nbsp;&nbsp;<input type="submit" value="Search">
</p>
<?php checkpay();?>
</form>
