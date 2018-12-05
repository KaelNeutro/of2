<?php
session_start();//session starts here

include("../database/db_conection.php");
$d_sch=$_SESSION['l_user'];
if($d_sch=='') // Se o não estiver logado voltar para login novamente
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
    <!-- Bootstrap --> 
    <link type="text/css" rel="stylesheet" href="..\bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- CSS--> 
    <link type="text/css" rel="stylesheet" href="..\css\style.css">
    <title>Menu School </title>

</head>
    


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Menu School</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                            <fieldset>
                                <!-- Opções Alunos -->
                                <button class="btn btn-success btn-block btn-lg" type="button" data-toggle="collapse" data-target="#menu-vac" aria-expanded="false" aria-controls="menu-vac">
                                    Vacancies
                                </button>

                                <div class="collapse btn-block" id="menu-vac">
                                    <button type="button" class="btn  btn-primary btn-block" onclick="window.location.href='reg_vac.php'"> Register  </button>
                                    <button type="button" class="btn  btn-primary btn-block" onclick="window.location.href='alter_vac.php'"> Alter Data  </button>
                                    <button type="button" class="btn  btn-warning btn-block" onclick="window.location.href='view_vac.php'"> View or Remove  </button>

                                </div>
                                <!-- Opções Vagas-->
                                <button class="btn btn-success btn-block btn-lg" type="button" data-toggle="collapse" data-target="#menu-va" aria-expanded="false" aria-controls="menu-va">
                                    Pendencies Student Enrollment                                   
                                </button>
                                <div class="collapse btn-block" id="menu-va">
                                    <button type="button" class="btn  btn-primary btn-block"onclick="window.location.href='pending_view.php'">Pending</button>
                                    <button type="button" class="btn  btn-info btn-block"onclick="window.location.href='accepted_view.php'">Accepted</button>
                                    <button type="button" class="btn  btn-info btn-block"onclick="window.location.href='declined_view.php'">Declined</button>
                                    

                                </div>
                                <!-- Opções Usuario-->
                                <button class="btn btn-success btn-block btn-lg" type="button" data-toggle="collapse" data-target="#menu-us" aria-expanded="false" aria-controls="menu-us">
                                    School
                                </button>
                                 <div class="collapse btn-block" id="menu-us">
                                    <button type="button" class="btn  btn-primary btn-block" onclick="window.location.href='alter_sch.php'" > Edit Account </button>
                                    <button type="button" class="btn  btn-warning btn-block" onclick="window.location.href='delfullschool.php'"> Remove Account  </button>

                                </div>

                                <button class="btn btn-danger btn-block btn-lg" type="button" data-toggle="collapse"aria-expanded="false" onclick="location.href='../Logout.php'" >
                                    Logout
                                </button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>