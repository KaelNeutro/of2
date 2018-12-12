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
    <title>View Pending</title>
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
          <div class="" style="height: 200px;">
        <div id="" class="col-md-8 col-md-offset-2" style="margin-top: 70px;">
          <table><td><img src="../img/logo.png"></td> <td><h4 style="color:white; text-align: center;">"Bem vindo ao Vagas Escolares!
Nossa missão é facilitar a procura de vagas, tendo como público alvo a população, que encaram filas imensas e em determinadas ocasiões não encontram a vaga desejada. Os usuários cadastrados terão acesso à todas escolas da sua região e participarão do processo de obtenção das vagas disponíveis. As escolas terão como função disponibilizar ao sistema as vagas disponíveis."
</h4></td></table>
          
        
          
        </div>

    </div>

    </div>


</body>

</html>
