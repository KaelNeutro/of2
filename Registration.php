<html class="total">  
<head lang="en">  

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- tela respansiva -->  
    <!-- Bootstrap-->  
    <link type="text/css" rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    <script src="bootstrap\js\bootstrap.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Jquery--> 
    <script src="js\jquery.min.js"></script>
    <script src="js\jquery.maskedinput.js"></script>
    <script src="js\function.js"></script>

    <!-- Google Maps--> 
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBGwgKtk8lwTal0Ng_UkPU6JmqhDKtbmf0"></script>

    <script type="text/javascript" src="js/mapa.js"></script>
    <!-- CSS--> 
    <link type="text/css" rel="stylesheet" href="css\style.css">
    <title>Registro de Usuário</title>    
</head>  

<body>  

    <div class="container"> <!-- FORMULARIO DE REGISTRO DE USUARIO-->
        <div class="row"> 
            <div class="col-md-4 col-md-offset-4" id="seg-div">
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Registro</h3>  
                    </div>
                    <ul class="nav nav-pills "> <!--- ABAS DOS FORMULARIOS DE CADASTRO -->
                        <li class="active"><a style="margin-left: 5px; background-color: #33C416;"  href="#regUser">Usuário</a></li>
                        <li><a  data-toggle="pill" href="#regSchool" style="margin-left: 5px; background-color: #33C416;">Escola</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Formulario de Usuario -->
                        <div id="regUser" class="panel-body tab-pane fade in active">  
                            <form role="form" id="form_register_user" name="form_register_user" method="post" action="registration.php" >  
                                <fieldset>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Nome de usuário" name="name" id="name" type="text" autofocus>  
                                    </div>  

                                    <div class="form-group">  
                                        <input class="form-control cpf-mask" placeholder="CPF" name="cpf" id="cpf" type="text"  autofocus>  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Senha" name="pass" id="pass" type="password" value="" >  
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Confirma senha" name="cpass" id="cpass" type="password" value="" >  
                                    </div> 

                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Data de nascimento" name="birth" id="birth" type="date" autofocus>  
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="CEP" name="cep" id="cep" type="text" autofocus>  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Endereço" name="address" id="address" type="text" autofocus >  
                                    </div> 
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Número" name="number" id="number" type="tel" autofocus >  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Complemento" name="compl" id="compl" type="text" autofocus >  
                                    </div> 
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Bairro" name="district" id="district"  type="text" autofocus >  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Cidade" name="city" id="city" type="text" autofocus >  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Estado" name="state" id="state" type="text" autofocus >  
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control phone-ddd-mask" placeholder="Telefone" name="phone1" id="phone1" type="text" autofocus >  
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control cel-sp-mask" placeholder="Celular" name="phone2" id="phone2" type="text" autofocus >  
                                    </div>

                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Cadastrar" name="register" >  

                                </fieldset>  
                            </form>  
                            <center></br><b>Já possui conta ?</b> </br><a href="login.php">Entre aqui</a></center><!--for centered text-->  

                        </div>
                        <!-- Formulario de Escola -->
                        <div id="regSchool" class="panel-body tab-pane fade">  
                            <form role="form" id="form_register_school" name="form_register_school" method="post" action="registration.php" >  
                                <fieldset>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Nome da Escola" name="nameSchool" id="nameSchool" type="text" autofocus>  
                                    </div>  

                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Coódigo da Escola
                                        " name="codeSchool" id="CodeSchool" type="text"  autofocus>  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Senha" name="passSchool" id="passSchool" type="password" value="" >  
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Confirmar Senha" name="cpassSchool" id="cpassSchol" type="password" value="" >  
                                    </div> 

                                    <div class="form-group">  
                                        <input class="form-control" placeholder="CEP" name="cepSchool" id="cepSchool" type="text" autofocus>  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Endereço" name="addressSchool" id="addressSchool" type="text" autofocus >  
                                    </div> 
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Número" name="numberSchool" id="numberSchool" type="tel" autofocus >  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Complemento" name="complSchool" id="complSchool" type="text" autofocus >  
                                    </div> 
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Bairro" name="districtSchool" id="districtSchool"  type="text" autofocus >  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Cidade" name="citySchool" id="citySchool" type="text" autofocus >  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Estado" name="stateSchool" id="stateSchool" type="text" autofocus >  
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control phone-ddd-mask" placeholder="Telefone" name="phone1School" id="phone1School" type="text" autofocus >  
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control cel-sp-mask" placeholder="Celular" name="phone2School" id="phone2School" type="text" autofocus >  
                                    </div>

                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Cadastrar" name="registerSchool" >  

                                </fieldset>  
                            </form>  
                            <center></br><b>Já possui conta?</b> </br><a href="login.php">Entre Aqui</a></center>
                        </div> 
                    </div>  
                </div>  
            </div>
            <div class="sem-div" id="map-div">
                <div id="mapa" ></div>
            </div>
        </div> 
   </div>  

</body>  

</html>  

<?php  

include("database/db_conection.php");//Conectando com o banco
error_reporting(E_ALL);
if(isset($_POST['register'])){  

    $user_name=addslashes($_POST['name']);//aqui obtendo resultado da matriz post depois de enviar o formulário.
    $user_cpf=$_POST['cpf'];  
    $user_pass=$_POST['pass'];
    $user_cpass=$_POST['cpass'];
    $user_birth=$_POST['birth'];
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
    if($user_cpf=='')  
    {  
        echo"<script>alert('Please enter the cpf')</script>";  
        exit();  
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
    if($user_birth=='')  
    {  
        echo"<script>alert('Please enter the date of birth')</script>";  
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
    
// Verificar usuario ja foi registrado no banco  
    $check_cpf_query="select * from user WHERE cpf='$user_cpf'";  
    $run_query=mysqli_query($dbcon,$check_cpf_query);  

    if(mysqli_num_rows($run_query)>0)  
    {  
        //echo"<script>alert('Passei 03')</script>";
        echo "<script>alert('User with CPF $user_cpf is already exist in our database, Please try another one!')</script>";  
        exit(); // retorna ao formulario
    }  
    
//inserir usuario em banco de dados.  
    $insert_user="INSERT INTO `user`(`cpf`, `name`, `password`, `birth`, `cep`,`address`, `number`, `complement`, `district`, `city`, `state`, `phone1`, `phone2`) VALUES ('$user_cpf','$user_name','$user_pass','$user_birth','$user_cep','$user_address','$user_number','$user_complement','$user_district','$user_city','$user_state','$user_phone1','$user_phone2')"; 
    //$insert_user="inserto into user (cpf,name,password,birth,cep,address,number,complement,district,city,state,phone1,phone2) VALUES ('".$user_cpf."','".$user_name."','".$user_pass."','".$user_birth."','".$user_cep."','".$user_address."','".$user_number."','".$user_complement."','".$user_district."','".$user_city."','".$user_state."','".$user_phone1."','".$user_phone2."')"; 

    
    
   
    
    if(mysqli_query($dbcon,$insert_user))  
    {  

        echo"<script>window.open('Welcome.php','_self')</script>";  
    } else{
        echo "Error: " . $insert_user . "<br>" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

} elseif (isset($_POST['registerSchool'])) {
    # code...
    $user_name=addslashes($_POST['nameSchool']);//aqui obtendo resultado da matriz post depois de enviar o formulário.
    $user_codeS=$_POST['codeSchool'];  
    $user_pass=$_POST['passSchool'];
    $user_cpass=$_POST['cpassSchool'];
    $user_cep=$_POST['cepSchool'];
    $user_address= addslashes($_POST['addressSchool']);
    $user_number=$_POST['numberSchool'];
    $user_complement=$_POST['complSchool'];
    $user_district=$_POST['districtSchool'];
    $user_city=$_POST['citySchool'];
    $user_state=$_POST['stateSchool'];
    $user_phone1=$_POST['phone1School'];
    $user_phone2=$_POST['phone2School'];



    if($user_name=='')  // validando campos vazios
    {  

        echo"<script>alert('Please enter the name')</script>";  
        exit();//caso este passo nao seja valido ele retornara ao formulario  
    }
    if($user_codeS=='')  
    {  
        echo"<script>alert('Please enter the Code')</script>";  
        exit();  
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
    
// Verificar usuario ja foi registrado no banco  
    $check_codeS_query="select * from user WHERE code='$user_codeS'";  
    $run_query=mysqli_query($dbcon,$check_codeS_query);  

    if(mysqli_num_rows($run_query)>0)  
    {  
        //echo"<script>alert('Passei 03')</script>";
        echo "<script>alert('User with Code $user_codeS is already exist in our database, Please try another one!')</script>";  
        exit(); // retorna ao formulario
    }  
    
//inserir usuario em banco de dados.  
    $insert_user="INSERT INTO `school`(`code`, `name`, `password`, `cep`, `address`, `number`, `complement`, `district`, `city`, `state`, `phone1`, `phone2`) VALUES ('$user_codeS','$user_name','$user_pass','$user_cep','$user_address','$user_number','$user_complement','$user_district','$user_city','$user_state','$user_phone1','$user_phone2')"; 
    //$insert_user="inserto into user (cpf,name,password,birth,cep,address,number,complement,district,city,state,phone1,phone2) VALUES ('".$user_codeS."','".$user_name."','".$user_pass."','".$user_birth."','".$user_cep."','".$user_address."','".$user_number."','".$user_complement."','".$user_district."','".$user_city."','".$user_state."','".$user_phone1."','".$user_phone2."')"; 

    if(mysqli_query($dbcon,$insert_user))  
    {  

        echo"<script>window.open('Welcome.php','_self')</script>";  
    } else{
        echo "Error: " . $insert_user . "<br>" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
}

?>  