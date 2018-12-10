<?php
session_start();//session starts here
include("../database/db_conection.php");//Conectando com o banco
$std_guardian=$_SESSION['l_user'];
$c_cont=$_POST['cont'];
$Vac_edu= $_POST['secedu'.$c_cont];  
$Vac_grade=$_POST['secgrade'.$c_cont];
$Vac_code=$_POST['seccode'.$c_cont];


$view_students_query="select * from students WHERE guardianUser='$std_guardian' AND grade='$Vac_grade' AND education='$Vac_edu'";//select query for viewing students.
$run=mysqli_query($dbcon,$view_students_query);//here run the sql query.
if(mysqli_num_rows($run)<=0)  
{  
   echo "<script>alert('Not there students in our database, Please try another one!')</script>";
   echo"<script>window.open('search_vacancy.php','_self')</script>";    
         exit(); // retorna ao formulario
      }
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


         <title>Choose Students</title>
      </head>
      <body id="rgVac">
         <div class="container"> <!-- FORMULARIO DE REGISTRO DE ESTUDANTES-->
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
                     
                  </ul>
               </div>
            </div>
            <div class="row"> 

               <div class="col-md-4 col-md-offset-4">
                  <div class="login-panel panel panel-success">  
                     <div class="panel-heading">  
                        <h3 class="panel-title">Choose Students</h3>  
                     </div>

                     <div class="panel-body">
                        <form role="form" id="form_Search_Vac" name="form_Search_Vac" method="post" action="search_vacancy.php">
                           <fieldset>
                              <div class="funkyradio">
                                 <?php


                                 $cont=0;
while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
{
 $std_code=$row[0];
 $std_name=$row[1];
 ?>


 <div class="funkyradio-primary ">
   <input type="radio" name="slc_std" id="<?php echo "slc_std".$cont; ?>" value="<?php echo $std_code; ?>" required >
   <label for="<?php echo "slc_std".$cont; ?>"><?php echo $std_name; ?></label>
</div>
<input type="hidden" name="Vac_code" value="<?php echo $Vac_code; ?>">
<?php

$cont = $cont+1;
}


?>
<button class="btn btn-block btn-success" name="btnstd" id="btnstd" type="submit">CHOOSE</button>
</div>
</fieldset>
</form>

</div>
</div>
</div>
</div>
</div>
</body>

</html>