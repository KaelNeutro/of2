<?php
session_start();//session starts here

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- tela respansiva --> 
    <!-- Bootstrap --> 
    <link type="text/css" rel="stylesheet" href="..\bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- CSS--> 
    <link type="text/css" rel="stylesheet" href="..\css\style.css">
    <title>Delete Account</title>
</head>
<style>
.login-panel {
    margin-top: 150px;

</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Delete Account</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="delfulluser.php">
                            <fieldset>
                                <div class="form-group">
                                    <h3> Do you really want to delete your account?</h3>
                                    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href='menuU.php'" >No, back to menu</button>
                                    <button class="btn btn-lg btn-danger btn-block" type="submit" name="delete">Yes, permanent</button>
                                </div>

                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<?php

include("../database/db_conection.php");

if(isset($_POST['delete']))
{
    $d_user=$_SESSION['l_user'];



    $delete_user="DELETE FROM `user` WHERE `cpf`='$d_user'"; 
    $delete_std="DELETE FROM `students` WHERE `guardianUser`='$d_user'"; 

    $run=mysqli_query($dbcon,$delete_std);

    if(mysqli_query($dbcon,$delete_user))  
    {  
        
        echo"<script>window.open('../Logout.php','_self')</script>";  
    } else{
        echo "Error: " . $delete_user . "<br>" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);



    

}
?>