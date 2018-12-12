<?php
session_start();//session starts here
 $std_guardian=$_SESSION['l_user'];
         if($std_guardian=='') // Se o não estiver logado voltar para login novamente
        {  
            echo"<script>alert('Please login to continue!')</script>"; 
            echo"<script>window.open('../Logout.php','_self')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        }
?>
<!DOCTYPE html>
<html>
<head>
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

	<title>Vacgas Aceitas</title>
</head>
<body class="container">

	<div class="row">
		<div class="center-align">
			<ul class="nav ">
				<li><a href="homeU.php">Home</a></li> 

<li><a href="#">Estudantes</a>
                    <ul class ="sub" style="background-color: white!important;">
                        <li><a href="reg_std.php"> Registrar </a></li> 
                        <li><a href="alter_std.php"> Alterar Dados</a></li>
                        <li><a href="view_std.php"> Listar ou Remover </a></li>
                    </ul>
                </li>


                <li><a href="#">Vagas</a>
                    <ul class ="sub" style="background-color: white!important;">
                        <li><a href="search_vacancy.php"> <span class="glyphicon glyphicon-search"> </span>Pesquisar</a></li> 
                        <li><a href="sl_pd_std.php?sit=pending">Pendentes</a></li>
                        <li><a href="sl_pd_std.php?sit=accepted">Aprovadas</a></li>
                        <li><a href="sl_pd_std.php?sit=canceled">Canceladas</a></li>
                        <li><a href="sl_pd_std.php?sit=declined">Recusadas</a></li>
                    </ul>
                </li> 


                <li><a href="#">Usuários</a>
                    <ul class ="sub" style="background-color: white!important;">
                        <li><a href="alter_u.php" > Editar Conta </a></li> 
                        <li><a href="delfulluser.php"> Remover Conta </a></li>

                    </ul> 
                </li>





				<li><a href="map_sc.php"> Escola</a></li>  
                <li style="background-color: red;"><a href="../Logout.php"> Logout </a></li> 
				
			</ul>
		</div>
	</div>
	
	<div class="row">
		<div class="table-scrol center-align">
    <h1 align="center">Vacancies Accepted</h1>
    <table class="table table-bordered table-responsive  table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            
            <th>Pedido</th>
            <th>Escola</th>
            <th>Grau</th>
            <th>Educação</th>
            <th>Resposta</th>
        </tr>
        </thead>

        <?php
        include("../database/db_conection.php");
        $std=$_SESSION['l_std'];
        $view_students_query="SELECT c.code, c.request_date, a.name,b.grade,b.education,c.date_answer FROM pendency c INNER JOIN vacancies b ON (c.vacancy = b.code) INNER JOIN school a ON (b.school = a.code) WHERE c.situation='accepted' AND c.students='$std'";//select query for viewing students.
        $run=mysqli_query($dbcon,$view_students_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $code=$row[0];
            $date_req=$row[1];
            $school=$row[2];
            $grade=$row[3];
            $edu=$row[4];
            $answer=$row[5];


        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $date_req;  ?></td>
            <td><?php echo $school;  ?></td>
            <td><?php echo $grade;  ?></td>
            <td><?php echo $edu;  ?></td>
            <td><?php echo $answer;  ?></td>
        </tr>

        <?php } ?>

    </table>
        
        </div>
        </div>
    </div>
	
</body>
</html>