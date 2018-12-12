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
    <title>Alter Data Vacancies</title>
</head>


<body>
    <div class="container">
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
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Alter Data Vacancies</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="alter_sch.php">
                            <fieldset>
                                <?php
                                    $view_vacancies_query="select * from vacancies WHERE school='$sch_sch'";//select query for viewing vacancies.
                                    $run_query=mysqli_query($dbcon,$view_vacancies_query);
                                    if(mysqli_num_rows($run_query)<=0)  
                                    {  
                                        echo "<script>alert('No exist vacancies')</script>";
                                        echo"<script>window.open('menuU.php','_self')</script>"; 
                                        
                                    }
                                    $run=mysqli_query($dbcon,$view_vacancies_query);//here run the sql query.
                                    $cont = 0;
                                    while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                                    { error_reporting(E_ALL);

                                        $sch_code=$row[0];
                                        $sch_edu=$row[1];
                                        $sch_grade=$row[2];
                                        $sch_qtd=$row[3];
                                        $sch_scho=$row[4];
                                        ?>
                                        <!-- Opções Alunos -->
                                        <div class="btn btn-block form-group">
                                            <button class=" btn-primary btn-lg " type="button" data-toggle="collapse" data-target="<?php echo '#alter'.$cont.'sch'; ?>" aria-expanded="false" aria-controls="<?php echo 'alter'.$cont.'sch'; ?>" style="white-space:normal; width:100%; ">
                                               <?php echo "$sch_edu"." - "."$sch_grade"; ?>
                                           </button>
                                        </div>

                                     <div class="collapse btn-block btn-sm" id="<?php echo 'alter'.$cont.'sch'; ?>">
                                        <label for="qtd_sch">Quantity</label>
                                        <input type="number" min="1" name="<?php echo 'qtd'.$cont.'sch'; ?>" value="<?php echo $sch_qtd; ?>" class="form-control btn"> 

                                        <input class="btn btn-sm btn-success btn-block form-control" type="submit" value="UPDATE" name="<?php echo 'update'.$cont.'sch'; ?>" >     
                                    </div>
                                    

                                    <?php


include("../database/db_conection.php");//Conectando com o banco
error_reporting(E_ALL);
if(isset($_POST['update'.$cont.'sch'])){
    $sch_qtd=$_POST['qtd'.$cont.'sch'];
    $sch_sch=$_SESSION['l_user'];

    if($sch_sch=='') // Se o não estiver logado voltar para login novamente
    {  
            echo"<script>alert('Please login to continue!')</script>"; 
            echo"<script>window.open('../Logout.php','_self')</script>";  
            exit();//caso este passo nao seja valido ele retornara ao formulario  
          
    }    
    // validando campos vazios
    if($sch_qtd=='') 
    {  
        echo"<script>alert('Please enter the Quantity')</script>";  
        exit();//caso este passo nao seja valido ele retornara ao formulario  
    }

 

    $update_user="UPDATE `vacancies` SET `quantity`= '$sch_qtd' WHERE `code`='$sch_code'";

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
</div>
</body>

</html>

