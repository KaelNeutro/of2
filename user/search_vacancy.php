<?php
session_start();//session starts here

include("../database/db_conection.php");//Conectando com o banco
if(isset($_POST['btnstd'])){
	$std_code=$_POST['slc_std'];
	$Vac_code=$_POST['Vac_code'];
      // Verificar usuario ja foi registrado no banco  
	$check_pd_query="SELECT * FROM `pendency` WHERE students='$std_code' AND vacancy='$Vac_code' AND situation='pending'";  
	$run_query=mysqli_query($dbcon,$check_pd_query);
	if(mysqli_num_rows($run_query)>0)  
	{  
		echo "<script>alert('Pendency is already exist in our database, Please try another one!')</script>"; 
		echo"<script>window.open('search_vacancy.php','_self')</script>";  // retorna ao formulario
        exit(); // Não prosseguir as proximas linhas
        }
        $insert_pdc ="INSERT INTO `pendency`(`code`, `request_date`, `situation`, `date_answer`, `students`, `vacancy`) VALUES ('',CURRENT_TIMESTAMP,'pending',null,'$std_code','$Vac_code')";

        if(mysqli_query($dbcon,$insert_pdc))  
        {  

        	echo"<script>window.open('search_vacancy.php','_self')</script>";  
        } else{
        	echo "Error: " .$insert_pdc . "<br>" . mysqli_error($dbcon);
        }
        mysqli_close($dbcon);  
    }



    ?>

<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	<!-- Angular -->
	<script src="//code.angularjs.org/snapshot/angular.min.js"></script>
	<script src="//code.angularjs.org/snapshot/angular-animate.js"></script>

	<title>Search Vacancies</title>
</head>
<body id="rgVac">
	<div class="container"> <!-- FORMULARIO DE REGISTRO DE ESTUDANTES-->
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

			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-success">  
					<div class="panel-heading">  
						<h3 class="panel-title">Search Vacancies</h3>  
					</div>

					<div class="panel-body">
						<form role="form" id="form_Search_Vac" name="form_Search_Vac" method="post" action="choose_vac.php">
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
								<select class="form-control" id="uf"  name="uf" required>
									
								</select>
							</div>
							<div class="form-group"  id="idCity">
								<select class="form-control" id="city" name="city" >
								</select>
							</div>  
							<input type="hidden" name="l_user" value="<?php echo $_SESSION['l_user'];?>">
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Search" name="SearchVac" >

						</fieldset>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
</body>

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