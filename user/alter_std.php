<!DOCTYPE html>
<html>
<head>
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



	<title>Alter Students Data</title>
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
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Alter Data Students</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="alter_std.php">
                            <fieldset>
                                <?php
                                include("../database/db_conection.php");
                                $std_guardian=$_SESSION['l_user'];

                                    $view_students_query="select * from students WHERE guardianUser='$std_guardian'";//select query for viewing students.
                                    $run_query=mysqli_query($dbcon,$view_students_query);
                                    if(mysqli_num_rows($run_query)<=0)  
                                    {  
                                        echo "<script>alert('No exist students')</script>";
                                        echo"<script>window.open('menuU.php','_self')</script>"; 
                                        
                                    }
                                    $run=mysqli_query($dbcon,$view_students_query);//here run the sql query.
                                    $cont = 0;
                                    while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                                    { error_reporting(E_ALL);

                                        $std_code=$row[0];
                                        $std_name=$row[1];
                                        $std_birth=$row[2];
                                        $std_grade=$row[3];
                                        $std_edu=$row[4];
                                        $std_last=$row[5];
                                        ?>
                                        <!-- Opções Alunos -->
                                        <div style="margin: 10px auto;">
                                        <button class=" btn btn-block btn-lg btn-primary " type="button" data-toggle="collapse" data-target="<?php echo '#alter'.$cont.'std'; ?>" aria-expanded="false" aria-controls="<?php echo 'alter'.$cont.'std'; ?>" style="white-space:normal; width:100%; ">
                                         <?php echo $std_name; ?>
                                         </button>
                                        </div>

                                     <div class="collapse btn-block" id="<?php echo 'alter'.$cont.'std'; ?>">
                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Name Student" name="<?php echo 'name'.$cont.'Std'; ?>" id="nameStd" type="text" value="<?php echo $std_name; ?>" autofocus>  
                                        </div> 
                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Date of Birth" name="<?php echo 'birth'.$cont.'Std'; ?>" id="birthStd" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $std_birth; ?>">  
                                        </div>
                                        <div  > <!-- Usei Angular Switch -->
                                            <div  >
                                                <div class="form-group">
                                                    <select class="form-control"  id="<?php echo 'edu'.$cont.'Std'; ?>" name="<?php echo 'edu'.$cont.'Std'; ?>" >
                                                        <option value="" disabled selected hidden> Education</option>       
                                                        <option value="Elementary School">Elementary School</option> 
                                                        <option value="Middle School"> Middle School </option>
                                                        <option value="High School"> High School </option>
                                                    </select>
                                                </div>

                                                <div class="animate-switch-container">
                                                    <div class="animate-switch form-group" id="<?php echo'elementary'.$cont.'Std'; ?>" style="display: none;">
                                                        <select class="form-control" id="<?php echo 'grade'.$cont.'Std'; ?>" name="<?php echo 'grade'.$cont.'Std'; ?>" >
                                                            <option value="" disabled selected hidden> Grade</option>
                                                            <option value="1st grade" > 1st grade </option>
                                                            <option value="2nd grade" > 2nd grade </option>
                                                            <option value="3rd grade" > 3rd grade </option>
                                                            <option value="4th grade" > 4th grade </option>
                                                            <option value="5th grade" > 5th grade </option>

                                                        </select>
                                                    </div>
                                                    <div class="animate-switch form-group" id="<?php echo 'middle'.$cont.'Std'; ?>" style="display: none;">
                                                        <select class="form-control" id="<?php echo 'grade'.$cont.'Std'; ?>" name="<?php echo 'grade'.$cont.'Std'; ?>">
                                                            <option value="" disabled selected hidden> Grade</option>
                                                            <option value="6th grade" > 6th grade </option>
                                                            <option value="7th grade" > 7th grade </option>
                                                            <option value="8th grade" > 8th grade </option>
                                                            <option value="9th grade" > 9th grade </option>       
                                                        </select>
                                                    </div>
                                                    <div class="animate-switch form-group" id="<?php echo 'high'.$cont.'Std'; ?>" style="display: none;">
                                                        <select class="form-control" id="<?php echo 'grade'.$cont.'Std'; ?>" name="<?php echo 'grade'.$cont.'Std'; ?>"  >
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
                                            <select class="form-control" id="<?php echo 'last'.$cont.'Std'; ?>" name="<?php echo 'last'.$cont.'Std'; ?>" >
                                                <option value="" disabled selected hidden>Last year's situation </option>
                                                <option>Approved</option>
                                                <option>Classified</option>
                                                <option>Disapproved</option>
                                                <option>First year of study</option>
                                                <option>Stopped going</option>
                                            </select>
                                        </div>  

                                        <input class="btn btn-sm btn-success btn-block" type="submit" value="UPDATE" name="<?php echo 'register'.$cont.'Std'; ?>" > 
                                    </div>

                                    <?php
                                   

                                    echo " <script>$(document).ready(function(){ $('";
                                    echo '#edu'.$cont.'Std' ;
                                    echo "').change(function(){var op = '';    op = $('";
                                    echo '#edu'.$cont.'Std' ;
                                    echo "').val();switch(op){case 'Elementary School':$('";
                                    echo '#elementary'.$cont.'Std';
                                    echo "').show();$('";
                                    echo '#middle'.$cont.'Std';
                                    echo  "').hide();$('";
                                    echo '#high'.$cont.'Std';
                                    echo  "').hide();break;case 'Middle School':$('";
                                    echo '#middle'.$cont.'Std';
                                    echo "').show();$('";
                                    echo '#high'.$cont.'Std';
                                    echo "').hide();$('";
                                    echo '#elementary'.$cont.'Std';
                                    echo "').hide();break;case 'High School':$('";
                                    echo '#high'.$cont.'Std';
                                    echo "').show();$('";
                                    echo '#middle'.$cont.'Std';
                                    echo "').hide();$('";
                                    echo '#elementary'.$cont.'Std';
                                    echo "').hide();break;} }); }); </script>";

include("../database/db_conection.php");//Conectando com o banco
error_reporting(E_ALL);
if(isset($_POST['register'.$cont.'Std'])){
        $std_name=addslashes($_POST['name'.$cont.'Std']) ;//aqui obtendo resultado da matriz post depois de enviar o formulário.
        $std_birth=$_POST['birth'.$cont.'Std'];
        $std_edu= $_POST['edu'.$cont.'Std'];  
        $std_grade=$_POST['grade'.$cont.'Std'];
        $std_last=$_POST['last'.$cont.'Std'];
        $std_guardian=$_SESSION['l_user'];


        // validando campos vazios
        if($std_guardian=='') // Se o não estiver logado voltar para login novamente
        {  
            echo"<script>alert('Please login to continue!')</script>"; 
            echo"<script>window.open('../Logout.php','_self')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        } 
        if($std_name=='') 
        {  
            echo"<script>alert('Please enter the name')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        }
        if($std_birth=='') 
        {  
            echo"<script>alert('Please enter the Date of Birth')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        }
        if($std_edu=='') 
        {  
            echo"<script>alert('Please enter the Education')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        }
        if($std_grade=='') 
        {  
            echo"<script>alert('Please enter the Grade')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        }
        if($std_last=='') 
        {  
            echo"<script>alert('Please enter the Last year's situation')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
        }

        $update_user="UPDATE `students` SET `name`='$std_name',`birth`='$std_birth',`grade`='$std_grade',`education`='$std_edu',`lastyear`='$std_last'  WHERE `code`='$std_code'";

        if(mysqli_query($dbcon,$update_user))  
        {  
            echo "<script>alert('UPDATE SUCCESSFUL')</script>";
            echo"<script>window.open('MenuU.php','_self')</script>";  
        } else{
            echo "Error: " . $update_user . "<br>" . mysqli_error($dbcon);
        }
        mysqli_close($dbcon);

    }
     $cont = $cont + 1;
} // Fim do While
?>                      
</fieldset>
</form>

</div>
</div>
</div>
</div>
</body>
</html>