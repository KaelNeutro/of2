<?php
session_start();//session starts here
include("../database/db_conection.php");
 $sch_dp=$_SESSION['l_user'];
         if($sch_dp=='') // Se o não estiver logado voltar para login novamente
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


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <!-- Jquery--> 
    <script src="..\js\jquery.min.js"></script>
    <script src="..\js\function.js"></script>
    <!-- CSS--> 
    <link type="text/css" rel="stylesheet" href="..\css\style.css">
    <title>View students</title>
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
    <h1 align="center">Vacancies Pending</h1>

<div class="container"><!--this is used for responsive display in mobile and other devices-->
    <?php
           $gradeDB = "SELECT a.grade, a.education FROM vacancies a INNER JOIN pendency b ON (a.code = b.vacancy) WHERE school='$sch_dp' AND b.situation = 'pending'   GROUP by 1,2 ORDER BY a.education, a.grade";
           $runS = mysqli_query($dbcon,$gradeDB );
           while($row=mysqli_fetch_array($runS))
           {
            $gr=$row[0];
            $ed=$row[1];

           
           
    ?>
    <h3 align="center"> <?php echo $gr." - ".$ed; ?> </h3>
    <table class="table table-bordered table-responsive  table-striped" style="table-layout: fixed">
        <thead>
        <tr>

            
            <th>Request</th>
            <th>Students</th>
            <th>District</th>
            <th>Phone</th>
            <th>Phone</th>
            <th>Last year</th>
            </tr>
        </thead>

        <?php
        
        
        $view_students_query="SELECT c.code, c.request_date, a.name,d.district,d.phone1,d.phone2,a.lastyear FROM pendency c INNER JOIN vacancies b ON (c.vacancy = b.code) INNER JOIN students a ON (c.students = a.code) INNER JOIN user d ON (a.guardianUser = d.cpf) WHERE c.situation='pending' AND b.school='$sch_dp' AND b.grade='$gr' AND b.education='$ed' ORDER by c.request_date ";//select query for viewing students.
        $run=mysqli_query($dbcon,$view_students_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $code=$row[0];
            $date_req=$row[1];
            $std=$row[2];
            $dis=$row[3];
            $p1=$row[4];
            $p2=$row[5];
            $last=$row[6];


        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $date_req;?></td>
            <td><?php echo $std;  ?></td>
            <td><?php echo $dis;  ?></td>
            <td><?php echo $p1;  ?></td>
            <td><?php echo $p2;  ?></td>
            <td><?php echo $last;  ?></td>
            <td><a href="accepted.php?ac=<?php echo $code ?>"><button class="btn btn-success">Accept</button></a></td> 
            <td><a href="declined.php?de=<?php echo $code ?>"><button class="btn btn-danger">refusal</button></a></td> 
        </tr>

        <?php } ?>

    </table>
        <?php } ?>
        <button class="btn btn-lg btn-danger center-block" onclick="window.location.href='menuS.php'">BACK</button>
    </div>
       
</div>


</body>

</html>
