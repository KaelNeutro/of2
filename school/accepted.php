<?php

include("../database/db_conection.php");
$id=$_GET['ac'];
$query="UPDATE `pendency` SET `situation`='accepted',`date_answer`=NOW() WHERE code='$id'";//delete query
$run=mysqli_query($dbcon,$query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('pending_view.php? has been accepted','_self')</script>";
}

?>