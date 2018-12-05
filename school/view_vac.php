<?php
session_start();//session starts here

include("../database/db_conection.php");
$sch_sch=$_SESSION['l_user'];  
if($sch_sch=='') // Se o não estiver logado voltar para login novamente
{  
    echo"<script>alert('Please login to continue!')</script>"; 
    echo"<script>window.open('../Logout.php','_self')</script>";  
    exit();//caso este passo nao seja valido ele retornara ao formulario  
} 
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- tela respansiva -->  
    <!-- Bootstrap-->  
    <link type="text/css" rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    <script src="..\bootstrap\js\bootstrap.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!---->
    -->
    <!-- Jquery--> 
    <script src="..\js\jquery.min.js"></script>
    <script src="..\js\function.js"></script>
    <!-- CSS--> 
    <link type="text/css" rel="stylesheet" href="..\css\style.css">
    <title>View Vacancies</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>

<div class="table-scrol">
    <h1 align="center">All the Vacancies</h1>

<div class="container"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-responsive  table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th>Education</th>
            <th>Grade</th>
            <th>Quantity</th>
            <th>Delete sch</th>
        </tr>
        </thead>

        <?php
         
        $view_Vacancies_query="select * from vacancies WHERE school='$sch_sch' AND del='0'";//select query for viewing Vacancies.
        $run=mysqli_query($dbcon,$view_Vacancies_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $sch_code=$row[0];
            $sch_edu=$row[1];
            $sch_grade=$row[2];
            $sch_qtd=$row[3];
            $sch_scho=$row[4];



        ?>

        <tr>
<!--here showing results in the table -->

            <td><?php echo $sch_edu;  ?></td>
            <td><?php echo $sch_grade;  ?></td>
            <td><?php echo $sch_qtd;  ?></td>
            <td><a href="delete_vac.php?dell=<?php echo $sch_code ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
        <button class="btn btn-lg btn-primary center-block" onclick="window.location.href='menuS.php'">BACK</button>
        </div>
</div>


</body>

</html>
