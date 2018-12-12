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
<!-- 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwgKtk8lwTal0Ng_UkPU6JmqhDKtbmf0">
</script> -->
<title>Alter Students Data</title>
</head>
<body class="container" style="background-color: white!important;">
    <div class="row" style="background-color: white;">
        <div class="center-align">
            <ul class="nav ">
                <li><a href="#">Inicio</a></li> 


                <li><a href="#">Estudantes</a>
                    <ul class ="sub" style="background-color: white!important;">
                        <li><a href="reg_std.php"> Registrar </a></li> 
                        <li><a href="alter_std.php"> Alterar Dados</a></li>
                        <li><a href="view_std.php"> Listar ou Remover </a></li>
                    </ul>
                </li>


                <li><a href="#">Vagas</a>
                    <ul class ="sub" style="background-color: white!important;">
                        <li><a href="search_vacancy.php"> <span class="glyphicon glyphicon-search"> </span>Pesquisar</a></li> 
                        <li><a href="sl_pd_std.php?sit=pending">Pendentes</a></li>
                        <li><a href="sl_pd_std.php?sit=accepted">Aprovadas</a></li>
                        <li><a href="sl_pd_std.php?sit=canceled">Canceladas</a></li>
                        <li><a href="sl_pd_std.php?sit=declined">Recusadas</a></li>
                    </ul>
                </li> 


                <li><a href="#">Usuários</a>
                    <ul class ="sub" style="background-color: white!important;">
                        <li><a href="alter_u.php" > Editar Conta </a></li> 
                        <li><a href="delfulluser.php"> Remover Conta </a></li>

                    </ul> 
                </li>



                <li><a href="menu.php" id="mapschool">Fale Conosco</a></li> 

                <li><a href="../Logout.php">Sair</a>                
                </li>
                
          
        </div>
<!-- <h1><a href="Logout.php">Logout here</a> </h1>
 -->
    </div>  
    <div class="" style="height: 200px; " >
        <div id="" class="col-md-8 col-md-offset-2" style="margin-top: 70px;">
          <table><td><img src="../img/logo.png"></td> <td><h4 style="color:white; text-align: center;">"Bem vindo ao Vagas Escolares!
Nossa missão é facilitar a procura de vagas, tendo como público alvo a população, que encaram filas imensas e em determinadas ocasiões não encontram a vaga desejada. Os usuários cadastrados terão acesso à todas escolas da sua região e participarão do processo de obtenção das vagas disponíveis. As escolas terão como função disponibilizar ao sistema as vagas disponíveis."
</h4></td></table>
          
        
          
        </div>

    </div>
   
</body>
</html>