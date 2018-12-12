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
    <title>Alter date user</title>
</head>

<body>
 <div class="container"> <!-- FORMULARIO DE REGISTRO DE USUARIO-->
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
                    <h3 class="panel-title">Update Date</h3>  
                </div>
                <div class="tab-content">
                    <!-- Formulario de Usuario -->
                    <div id="regUser" class="panel-body tab-pane fade in active">  
                        <form role="form" id="form_register_user" name="form_register_user" method="post" action="alter_sch.php" >  
                            <fieldset>
                                <?php
                                
                                    $view_user_query="select * from school WHERE code='$sch_dp'";//select query for viewing students.
                                    
                                    
                                    $run=mysqli_query($dbcon,$view_user_query);//here run the sql query.
                                    $cont = 0;
                                    while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                                    { error_reporting(E_ALL);

                                        $u_code=$row[0];
                                        $u_name=$row[1];
                                        $u_pass=$row[2];
                                        $u_cep=$row[3];
                                        $u_addr=$row[4];
                                        $u_num=$row[5];
                                        $u_comp=$row[6];
                                        $u_dist=$row[7];
                                        $u_city=$row[8];
                                        $u_sta=$row[9];
                                        $u_ph1=$row[10];
                                        $u_ph2=$row[11];

                                        $cont = $cont +1;
                                    }
                                ?>
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Username" name="name" id="name" type="text" value="<?php echo $u_name; ?>" autofocus>  
                                </div>  

                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="pass" id="pass" type="password" value="<?php echo $u_pass; ?>" >  
                                </div>
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Confirm Password" name="cpass" id="cpass" type="password"  >  
                                </div> 

                               
                                <div class="form-group">  
                                    <input class="form-control" placeholder="CEP" name="cep" id="cep" type="text" value="<?php echo $u_cep; ?>" autofocus>  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Address" name="address" id="address" type="text" value="<?php echo $u_addr; ?>" autofocus >  
                                </div> 
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Number" name="number" id="number" type="tel" value="<?php echo $u_num; ?>" autofocus >  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Complement" name="compl" id="compl" type="text" value="<?php echo $u_comp; ?>" autofocus >  
                                </div> 
                                <div class="form-group">  
                                    <input class="form-control" placeholder="District" name="district" id="district"  type="text" value="<?php echo $u_dist; ?>" autofocus >  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="City" name="city" id="city" type="text" value="<?php echo $u_city; ?>" autofocus >  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="State" name="state" id="state" type="text" value="<?php echo $u_sta; ?>" autofocus >  
                                </div>
                                <div class="form-group">  
                                    <input class="form-control phone-ddd-mask" placeholder="Phone 01-(DDD) XXXX-XXXX" name="phone1" id="phone1" type="text" value="<?php echo $u_ph1; ?>" autofocus >  
                                </div>
                                <div class="form-group">  
                                    <input class="form-control cel-sp-mask" placeholder="Phone 02-(DDD) XXXX-XXXX" name="phone2" id="phone2" type="text" value="<?php echo $u_ph2; ?>" autofocus >  
                                </div>

                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Update" name="update" >  

                            </fieldset>  
                        </form>  


                    </div>

                </div>  
            </div>  
        </div>  
    </div>  
</div>  

</body>  

</html>  


<?php  

include("../database/db_conection.php");//Conectando com o banco
error_reporting(E_ALL);
if(isset($_POST['update'])){  

    $user_name=$_POST['name'];//aqui obtendo resultado da matriz post depois de enviar o formulário.
    $user_code=$_SESSION['l_user'];
    $user_pass=$_POST['pass'];
    $user_cpass=$_POST['cpass'];
    $user_cep=$_POST['cep'];
    $user_address= addslashes($_POST['address']);
    $user_number=$_POST['number'];
    $user_complement=$_POST['compl'];
    $user_district=$_POST['district'];
    $user_city=$_POST['city'];
    $user_state=$_POST['state'];
    $user_phone1=$_POST['phone1'];
    $user_phone2=$_POST['phone2'];


    
    if($user_name=='')  // validando campos vazios
    {  

        echo"<script>alert('Please enter the name')</script>";  
        exit();//caso este passo nao seja valido ele retornara ao formulario  
    }
 
    if($user_pass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
        exit();  
    }
    if($user_cpass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
        exit();  
    }
    if($user_cep=='')  
    {  
        echo"<script>alert('Please enter the CEP')</script>";  
        exit();  
    }
    if($user_number=='')  
    {  
        echo"<script>alert('Please enter the number')</script>";  
        exit();  
    }
    if($user_phone1=='')  
    {  
        echo"<script>alert('Please enter the Phone 01-(DDD) XXXX-XXXX')</script>";  
        exit();  
    }
    // Complemento e telefone 02 são itens opcionais, nao precisa verificar
    //echo"<script>alert('Passei 02')</script>";
    
//atualizar dados do usuario em banco de dados.  
    $update_user="UPDATE `school` SET `name`='$user_name',`password`='$user_pass',`cep`='$user_cep',`address`='$user_address',`number`='$user_number',`complement`='$user_complement',`district`='$user_district',`city`='$user_city',`state`='$user_state',`phone1`='$user_phone1',`phone2`='$user_phone2' WHERE `code`='$user_code'"; 
 

    if(mysqli_query($dbcon,$update_user))  
    {  
        
        echo"<script>window.open('menuS.php','_self')</script>";  
    } else{
        echo "Error: " . $update_user . "<br>" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}
?>