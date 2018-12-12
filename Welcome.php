<?php
session_start();

if(!$_SESSION['l_user'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

?>

<html>
<head>

    <title>
        Registrar
    </title>
</head>

<body>
<h1>Welcome</h1><br>
<?php
echo $_SESSION['l_user'];
?>


<h1><a href="Logout.php">Logout aqui</a> </h1>


</body>

</html>
