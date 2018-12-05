<?php
/**
 * Created by PhpStorm.
 * User: Ehtesham Mehmood
 * Date: 11/24/2014
 * Time: 11:55 PM
 */
include("../database/db_conection.php");
$delete_id=$_GET['dell'];
$delete_query="UPDATE `vacancies` SET `del` = '1' WHERE `vacancies`.`code`='$delete_id'";//delete query
$run=mysqli_query($dbcon,$delete_query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('view_vac.php? has been deleted','_self')</script>";
}

?>