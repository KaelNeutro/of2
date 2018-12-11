<?php
session_start();//session starts here

$sit=$_GET['sit'];

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
    <title>Students Pending</title>

</head>
    


<body>
    <div class="container">
                   <div class="row">
               <div class="center-align">
                  <ul class="nav ">
                     <li><a href="homeU.php">Home</a></li> 


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
<li style="background-color: red;"><a href="../Logout.php"> Logout </a></li> 
                     
                  </ul>
               </div>
            </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Students <?php echo $sit; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            include("../database/db_conection.php");
                            $std_guardian=$_SESSION['l_user'];
                            if($std_guardian=='') // Se o não estiver logado voltar para login novamente
                            {  
                                echo"<script>alert('Please login to continue!')</script>"; 
                                echo"<script>window.open('../Logout.php','_self')</script>";  
                                exit();//caso este passo nao seja valido ele retornara ao formulario  
                            } 
                            $view_students_query="SELECT DISTINCT a.code, a.name FROM students a INNER JOIN pendency b ON (a.code=b.students) WHERE b.situation='$sit' AND a.guardianUser='$std_guardian'";//select query for viewing students.
                            $run=mysqli_query($dbcon,$view_students_query);//here run the sql query.
                            $cont = 0;
                            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                            {
                                $std_code=$row[0];
                                $std_name=$row[1];
                        ?>
                        <form role="form" method="post" action="<?php echo $sit.'_view.php'; ?>">
                            <fieldset>
                                <!-- Alunos -->
                                <input type="hidden" name="std" value="<?php echo $std_code; ?>">
                                <?php $_SESSION['l_std']=$std_code; ?>
                                <button class="btn btn-primary btn-block btn-lg" type="submit">
                                    <?php echo $std_name;  ?>
                                </button>
                            </fieldset>
                        </form>
                        <?php
                                $cont = $cont + 1;
                            }        
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>