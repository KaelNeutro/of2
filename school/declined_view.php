<?php
session_start();//session starts here

$v = isset($_SESSION['l_user'])? 'S' : 'N';
if($v=='N') // Se o não estiver logado voltar para login novamente
{  
    echo"<script>alert('Please login to continue!')</script>"; 
    echo"<script>window.open('../Logout.php','_self')</script>";  
    exit();//caso este passo nao seja valido ele retornara ao formulario  
} 
$sch_dp=$_SESSION['l_user'];
include("../database/db_conection.php");
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- tela respansiva -->  
    <!-- CSS--> 
    <link type="text/css" rel="stylesheet" href="..\css\style.css">
    <link href="..\css\style.css" rel="stylesheet" id="bootstrap-css">
    <!-- Bootstrap--> 
    
    <link href="..\bootstrap\css\bootstrapCDN.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Jquery--> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="..\js\jquery.min.js"></script>
    <script src="..\js\function.js"></script>
    <title>View Declined</title>
</head>


<body class="container">

    <div class="row">
        <div class="center-align">
            <ul class="nav ">
                <li><a href="homeS.php">Home</a></li> 


                <li><a href="#">Vacancies</a>
                    <ul class ="sub">
                        <li><a href="reg_vac.php"> Register </a></li> 
                        <li><a href="alter_vac.php"> Alter Data</a></li>
                        <li><a href="view_vac.php"> View or Remove </a></li>
                    </ul>
                </li>
                <li style="width: 180px;"><a href="#">Students Registry</a>
                    <ul class ="sub">
                        
                        <li style="width: 180px;"><a href="pending_view.php">Pending</a></li>
                        <li style="width: 180px;"><a href="accepted_view.php">Accepted</a></li>
                        <li style="width: 180px;"><a href="declined_view.php">Declined</a></li>
                    </ul>
                </li> 


                <li><a href="#">School</a>
                    <ul class ="sub">
                        <li><a href="alter_sch.php" > Edit Account </a></li> 
                        <li><a href="delfullschool.php"> Remove Account </a></li>

                    </ul> 
                </li>
                <li style="background-color: red;"><a href="../Logout.php"> Logout </a></li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="table-scrol center-align">
            <h1 align="center">Vacancies Declined</h1>
            <?php
            $gradeDB = "SELECT a.grade, a.education FROM vacancies a INNER JOIN pendency b ON (a.code = b.vacancy) WHERE school='$sch_dp' AND b.situation='declined'  GROUP by 1,2 ORDER BY a.education, a.grade";
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
                            <th>Situation</th>
                            <th>Date Answer</th>
                        </tr>
                    </thead>

                    <?php
                    
                    
        $view_students_query="SELECT c.code, c.request_date, a.name,d.district,d.phone1,d.phone2,a.lastyear,c.situation,c.date_answer FROM pendency c INNER JOIN vacancies b ON (c.vacancy = b.code) INNER JOIN students a ON (c.students = a.code) INNER JOIN user d ON (a.guardianUser = d.cpf) WHERE c.situation='declined' AND b.school='$sch_dp' AND b.grade='$gr' AND b.education='$ed' ORDER by c.request_date ";//select query for viewing students.
        $run=mysqli_query($dbcon,$view_students_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $code=$row[0];
            $date_req=$row[1];
            $std=addslashes($row[2]);
            $dis=addslashes($row[3]);
            $p1=$row[4];
            $p2=$row[5];
            $last=$row[6];
            $stt=$row[7];
            $ans=$row[8];


            ?>

            <tr>
                <!--here showing results in the table -->
                <td><?php echo $date_req;?></td>
                <td><?php echo $std;  ?></td>
                <td><?php echo $dis;  ?></td>
                <td><?php echo $p1;  ?></td>
                <td><?php echo $p2;  ?></td>
                <td><?php echo $last;  ?></td>
                <td><?php echo $stt;  ?></td>
                <td><?php echo $ans; ?></td>
            </tr>

        <?php } ?>

    </table>
<?php } ?>

</div>

</div>


</body>

</html>
