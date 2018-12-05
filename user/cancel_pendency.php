<?php

include("../database/db_conection.php");
$cancel_id=$_GET['cal'];
$cancel_query="UPDATE `pendency` SET `situation`='canceled',`date_answer`=NOW() WHERE code='$cancel_id'";//delete query
$run=mysqli_query($dbcon,$cancel_query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('pending_view.php? has been canceled','_self')</script>";
}

?>