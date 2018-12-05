<?php
session_start();//session starts here
include("../database/db_conection.php");
$Vac_guardian=$_SESSION['l_user'];
if($Vac_guardian=='') // Se o não estiver logado voltar para login novamente
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
	<!-- Jquery--> 
	<script src="..\js\jquery.min.js"></script>
	<script src="..\js\function.js"></script>
	<!-- Angular -->
	<script src="//code.angularjs.org/snapshot/angular.min.js"></script>
	<script src="//code.angularjs.org/snapshot/angular-animate.js"></script>

	<title>Register Vacancies</title>
</head>
<body id="rgVac">
	<div class="container"> <!-- FORMULARIO DE REGISTRO DE ESTUDANTES-->
		<div class="row"> 

			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-success">  
					<div class="panel-heading">  
						<h3 class="panel-title">Registration Vacancies</h3>  
					</div>

					<div class="panel-body">
						<form role="form" id="form_register_Vac" name="form_register_Vac" method="post" action="reg_Vac.php">
							<fieldset>
								<div ng-app="switch_regVac" > <!-- Usei Angular Switch -->
									<div ng-controller="GradeController" >
										<div class="form-group">
											<select class="form-control" ng-model="selection" placeholder="Education" ng-options="item for item in items" id="eduVac1" name="eduVac1" value={{selection}} required>
												<option value="" disabled selected hidden> Education</option>
											</select>
										</div>

										<div class="animate-switch-container"
										ng-switch on="selection">
										<div class="animate-switch form-group" ng-switch-when="Elementary School" ng-switch-when-separator="|">
											<select class="form-control" id="gradeVac1" name="gradeVac1" required>
												<option value="" disabled selected hidden> Grade</option>
												<option value="1st grade" > 1st grade </option>
												<option value="2nd grade" > 2nd grade </option>
												<option value="3rd grade" > 3rd grade </option>
												<option value="4th grade" > 4th grade </option>
												<option value="5th grade" > 5th grade </option>

											</select>
										</div>
										<div class="animate-switch form-group" ng-switch-when="Middle School" ng-switch-when-separator="|">
											<select class="form-control" id="gradeVac1" name="gradeVac1" required>
												<option value="" disabled selected hidden> Grade</option>
												<option value="6th grade" > 6th grade </option>
												<option value="7th grade" > 7th grade </option>
												<option value="8th grade" > 8th grade </option>
												<option value="9th grade" > 9th grade </option>       
											</select>
										</div>
										<div class="animate-switch form-group" ng-switch-when="High School" ng-switch-when-separator="|">
											<select class="form-control" id="gradeVac1" name="gradeVac1" required>
												<option value="" disabled selected hidden> Grade</option>
												<option value="1st grade" > 1st grade </option>
												<option value="2nd grade" > 2nd grade </option>
												<option value="3rd grade" > 3rd grade </option> 
											</select>
										</div>

									</div>
								</div>
							</div>

							<div class="form-group">
								<input type="number" min="1" name="qtd_Vac" class="form-control" placeholder="Quantity" required>
							</div>  

							<input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="registerVac" >
						</fieldset>
					</form>
					<button class="btn btn-lg btn-danger center-block" onclick="window.location.href='menuS.php'">BACK</button>
				</div>
			</div>
		</div>
	</div>
</div>
</body>


<?php
	
	error_reporting(E_ALL);
	if(isset($_POST['registerVac'])){

		$Vac_edu= $_POST['eduVac1'];  
		$Vac_grade=$_POST['gradeVac1'];
		$Vac_qtd=$_POST['qtd_Vac'];
		

		$position = strpos($Vac_edu,":");
		$Vac_edu = substr($Vac_edu, $position + 1);
		// validando campos vazios
		
		if($Vac_guardian=='') // Se o não estiver logado voltar para login novamente
        {  
        	echo"<script>alert('Please login to continue!')</script>"; 
        	echo"<script>window.open('../Logout.php','_self')</script>";  
	        exit();//caso este passo nao seja valido ele retornara ao formulario  
	        
	    }
		if($Vac_edu=='') 
		{  
			echo"<script>alert('Please enter the Education')</script>";  
        	exit();//caso este passo nao seja valido ele retornara ao formulario  
        }
        if($Vac_grade=='') 
        {  
        	echo"<script>alert('Please enter the Grade')</script>";  
        	exit();//caso este passo nao seja valido ele retornara ao formulario  
        }
        if($Vac_qtd=='') 
        {  
        	echo"<script>alert('Please enter the Last year's situation')</script>";  
	        exit();//caso este passo nao seja valido ele retornara ao formulario  
	        
	    }
	    if($Vac_guardian=='') // Se o não estiver logado voltar para login novamente
        {  
        	echo"<script>alert('Please login to continue!')</script>"; 
        	echo"<script>window.open('../Logout.php','_self')</script>";  
	        exit();//caso este passo nao seja valido ele retornara ao formulario  
	        
	    }
	            // Verificar se vaga ja foi registrada no banco  
	    $check_grade_query="select * from vacancies WHERE grade='$Vac_grade' AND education='$Vac_edu' AND school='$Vac_guardian' AND del='0'";  
	    $run_query=mysqli_query($dbcon,$check_grade_query);  

	    if(mysqli_num_rows($run_query)>0)  
	    {  
        //echo"<script>alert('Passei 03')</script>";
	    	echo "<script>alert('$Vac_grade do $Vac_edu is already exist in our database, Please try another one!')</script>";  
       		echo"<script>window.open('reg_vac.php','_self')</script>";  
       		exit();// retorna ao formulario
       	} 

    	//inserir usuario em banco de dados. 
    $insert_Vac="INSERT INTO `vacancies`(`code`, `education`, `grade`, `quantity`, `del`, `school`) VALUES ('','$Vac_edu','$Vac_grade','$Vac_qtd','0','$Vac_guardian')";

    if(mysqli_query($dbcon,$insert_Vac))  
    {  
    	echo"<script>window.open('MenuS.php','_self')</script>";  
    } else{
    	echo "Error: " . $insert_Vac . "<br>" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);  

}
?>
<script type="text/javascript">
	// Switch Registe Students

(function(angular) {
		'use strict';
		angular.module('switch_regVac', ['ngAnimate'])
		.controller('GradeController', ['$scope', function($scope) {
			$scope.items = ['Elementary School', 'Middle School', 'High School'];
    //$scope.selection = $scope.items[0];
}]);
	})(window.angular);

</script>
</html>