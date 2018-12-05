<?php
session_start();//session starts here
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Bootstrap--> 
         <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
         <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <!-- Jquery--> 
         <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="..\js\jquery.min.js"></script>
         <script src="..\js\function.js"></script>
         <!-- CSS--> 
         <link type="text/css" rel="stylesheet" href="..\css\style.css">
         <link type="text/css" rel="stylesheet" href="..\bootstrap\css\bootstrap.css">
         <link href="..\css\style.css" rel="stylesheet" id="bootstrap-css">
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

<div >
    

<div class="container"><!--this is used for responsive display in mobile and other devices-->
               <div class="row">
               <div class="center-align">
                  <ul class="nav ">
                     <li><a href="#">Home</a></li> 


                     <li><a href="#">Students</a>
                        <ul class ="sub">
                           <li><a href="reg_std.php"> Register </a></li> 
                           <li><a href="alter_std.php"> Alter Data</a></li>
                           <li><a href="view_std.php"> View or Remove </a></li>
                        </ul>
                     </li>


                     <li><a href="#">Vacancies</a>
                        <ul class ="sub">
                           <li><a href="search_vacancy.php"> <span class="glyphicon glyphicon-search"> </span>Search</a></li> 
                           <li><a href="sl_pd_std.php?sit=pending">Pending</a></li>
                           <li><a href="sl_pd_std.php?sit=accepted">Accepted</a></li>
                           <li><a href="sl_pd_std.php?sit=canceled">Canceled</a></li>
                           <li><a href="sl_pd_std.php?sit=declined">Declined</a></li>
                        </ul>
                     </li> 


                     <li><a href="#">User</a>
                        <ul class ="sub">
                           <li><a href="alter_u.php" > Edit Account </a></li> 
                           <li><a href="delfulluser.php"> Remove Account </a></li>

                        </ul> 
                     </li>



                     <li><a href="map_school.php"> School</a></li> 
                     
                  </ul>
               </div>
            </div>
            <div class="row">
        <div class="table-scrol center-align">
            <h1 align="center">All the Students</h1>
    <table class="table table-bordered table-responsive  table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Grade</th>
            <th>Education</th>
            <th>Last Year</th>
            <th>Delete std</th>
        </tr>
        </thead>

        <?php
        include("../database/db_conection.php");
        $std_guardian=$_SESSION['l_user'];
         if($std_guardian=='') // Se o não estiver logado voltar para login novamente
        {  
            echo"<script>alert('Please login to continue!')</script>"; 
            echo"<script>window.open('../Logout.php','_self')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        } 
        $view_students_query="select * from students WHERE guardianUser='$std_guardian'";//select query for viewing students.
        $run=mysqli_query($dbcon,$view_students_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $std_code=$row[0];
            $std_name=$row[1];
            $std_birth=$row[2];
            $std_grade=$row[3];
            $std_edu=$row[4];
            $std_last=$row[5];



        ?>

        <tr>
<!--here showing results in the table -->
            
            <td><?php echo $std_name;  ?></td>
            <td><?php echo $std_birth;  ?></td>
            <td><?php echo $std_grade;  ?></td>
            <td><?php echo $std_edu;  ?></td>
            <td><?php echo $std_last;  ?></td>
            <td><a href="delete_std.php?del=<?php echo $std_code ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
        
        </div>
</div>


</body>

</html>
