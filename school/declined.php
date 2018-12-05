<?php

include("../database/db_conection.php");
$id=$_GET['de'];
$query="UPDATE `pendency` SET `situation`='declined',`date_answer`=NOW() WHERE code='$id'";//delete query
$run=mysqli_query($dbcon,$query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('pending_view.php? has been declined','_self')</script>";
}

?>