<?php session_start();
    include('processcheck.php');

    
?>
<h3> Patient medical file and complain</h3>
<p>
<a href="dashboard.php"><button type="submit">Home</button></a>
</p>
<form action="checkpatient.php" method="POST">
<p>
    <label>Search to Check all hospital appointment</label><br>
    <input type="text" name="department_appoint" placeholder="Patient Department">
    <input type="text" name="email_appoint" placeholder="Patient email">
    <input type="submit" value="Search">
</p>
<?php patient();?>
</form>