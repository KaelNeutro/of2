<?php
session_start();//session starts here

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="..\js\jquery.min.js"></script>
	<script src="..\js\function.js"></script>

	<title>Choose Vacancies</title>
</head>
<body id="rgVac">
	<div class="container"> <!-- FORMULARIO DE REGISTRO DE ESTUDANTES-->
		<div class="row"> 

			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-success">  
					<div class="panel-heading">  
						<h3 class="panel-title">Choose Vacancies</h3>  
					</div>

					<div class="panel-body">
					
<?php
	include("../database/db_conection.php");//Conectando com o banco
	error_reporting(E_ALL);
	if(isset($_POST['SearchVac'])){

		$Vac_edu= $_POST['eduVac1'];  
		$Vac_grade=$_POST['gradeVac1'];
		$Vac_uf=$_POST['uf'];
		$Vac_city=$_POST['city'];
		$Vac_guardian=$_POST['l_user'];

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
        if($Vac_city=='') 
        {  
        	echo"<script>alert('Please enter the UF')</script>";  
	        exit();//caso este passo nao seja valido ele retornara ao formulario  
	        
	    }
	    if($Vac_uf=='') // Se o não estiver logado voltar para login novamente
        {  
        	echo"<script>alert('Please enter the City')</script>";
        	  
	        exit();//caso este passo nao seja valido ele retornara ao formulario  
	        
	    }

    	//inserir usuario em banco de dados. 
	    $search_Vac="SELECT  `vacancies`.`education`, `vacancies`.`grade`, `school`.`name`, `school`.`phone1`,`vacancies`.`code` FROM `vacancies` INNER JOIN `school` ON vacancies.school=school.code WHERE vacancies.grade='$Vac_grade' AND vacancies.education='$Vac_edu' AND school.state='$Vac_uf' AND school.city='$Vac_city'";
	    $run=mysqli_query($dbcon,$search_Vac);//here run the sql query.
	    $cont = 0;
	    if (mysqli_num_rows($run)<=0) {
	    	# code...
	    	echo"<script>alert('No vacancies!')</script>";
	    	echo"<script>window.open('search_vacancy.php','_self')</script>";  
	    	exit();
	    } else {
	    	while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
	    	{
	    		$sec_edu=$row[0];
	    		$sec_grade=$row[1];
	    		$sec_name=$row[2];
	    		$sec_ph1=$row[3];
	    		$sec_code=$row[4];

        	

?>
<form role="form" id="form_Search_Vac" name="form_Search_Vac" method="post" action="select_std.php">
						<fieldset>
							<input type="hidden" name="<?php echo 'seccode'.$cont; ?>" value="<?php echo $sec_code; ?>">
							<input type="hidden" name="<?php echo 'secedu'.$cont; ?>" value="<?php echo $sec_edu; ?>">
							<input type="hidden" name="<?php echo 'secgrade'.$cont; ?>" value="<?php echo $sec_grade; ?>">
							<input type="hidden" name="cont" value="<?php echo $cont; ?>">
							<div class="btn btn-block form-group">
								<button class=" btn-primary btn-lg " type="button" data-toggle="collapse" data-target="<?php echo '#sea'.$cont; ?>" aria-expanded="false" aria-controls="<?php echo 'sea'.$cont; ?>" style="white-space:normal; width:100%; ">
									<?php echo $sec_name; ?>
								</button>
							</div>
							
							<div class="collapse btn-block btn-sm panel panel-default"	 id="<?php echo 'sea'.$cont; ?>" >
								<div class="panel-body " style="padding:15px;"	>
									<h4><?php echo $sec_grade; ?> - <?php echo $sec_edu; ?> </br></br> 
								  	<b>Telefone:</b> <?php echo $sec_ph1; ?> </h4>
								</div>
								
								<button class="btn btn-block btn-sm btn-success" name="<?php echo 'ch'.$cont; ?>" type="submit" >Chosse</button>

							</div>
							</fieldset>
					</form>
							<?php
										$cont = $cont +1;
        							} //fim do Whiler
        						} // fim do else
        					?>
						
					<button class="btn btn-lg btn-danger btn-block center-block" onclick="window.location.href='menuU.php'">BACK</button>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<?php
       

	    if(mysqli_query($dbcon,$search_Vac))  
	    {  
	    	 
	    	//echo"<script>window.open('MenuU.php','_self')</script>";  
	    } else{
	    	echo "Error: " . $search_Vac . "<br>" . mysqli_error($dbcon);
	    }
	    mysqli_close($dbcon);  

	}
?>

</html>