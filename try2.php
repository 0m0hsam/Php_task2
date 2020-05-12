<?php
echo $log_id=str_ireplace(" ","",date('d m Y', time()));
echo $logout_time=date('d m Y H i', time());
if($logout_timer){
    echo "Time set";
}

?>

<button type="submit" name="lo" value="omohsamuel.gmailcom">LOgout</button>
</form>