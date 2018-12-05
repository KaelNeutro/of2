<?php
session_start();//session starts here
include("../database/db_conection.php");
$sch_sch=$_SESSION['l_user'];
if($sch_sch=='') // Se o não estiver logado voltar para login novamente
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


    
    <title>Alter Vacancies Data</title>

</head>

<body>
    <div class="container">
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
<button class="btn btn-lg btn-danger center-block" onclick="window.location.href='menuS.php'">BACK</button>
</div>
</div>
</div>
</div>
</div>
</body>

</html>

