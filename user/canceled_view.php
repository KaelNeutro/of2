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


	<title>Vacancies Canceled</title>
</head>
<body class="container">

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



				<li><a href="#">Contact Us</a></li> 
				<li><a href="#">About Us</a></li> 
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="table-scrol center-align">
			<h1 align="center">Vacancies Canceled</h1>
			<table class="table table-bordered table-responsive  table-striped" style="table-layout: fixed">
				<thead>

					<tr>


						<th>Request</th>
						<th>School</th>
						<th>Grade</th>
						<th>Education</th>
						<th>Data Answer</th>
					</tr>
				</thead>

				<?php
				include("../database/db_conection.php");
				$std=$_SESSION['l_std'];
        $view_students_query="SELECT c.code, c.request_date, a.name,b.grade,b.education,c.date_answer FROM pendency c INNER JOIN vacancies b ON (c.vacancy = b.code) INNER JOIN school a ON (b.school = a.code) WHERE c.situation='canceled' AND c.students='$std'";//select query for viewing students.
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
    <button class="btn btn-lg btn-danger  center-block" onclick="window.location.href='homeU.php'">BACK</button>
</div>
</div>
</div>

</body>
</html>