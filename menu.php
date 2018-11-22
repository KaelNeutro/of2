<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	    <link type="text/css" rel="stylesheet" href="bootstrap\css\bootstrap.css">
	<link href="css\style.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title></title>
</head>
<body class="container">

	<div class="row">
		<div class="center-align">
			<ul class="nav ">
				<li><a href="#">Home</a></li> 


				<li><a href="#">Mobile</a>
					<ul class ="sub">
						<li><a href="#">Lenovo</a></li> 
						<li><a href="#">Nokia</a></li>
						<li><a href="#">LAVA</a></li>
					</ul>
				</li>


				<li><a href="#">Laptop</a>
					<ul class ="sub">
						<li><a href="#">HP</a></li> 
						<li><a href="#">Dell</a></li>
						<li><a href="#">Lenovo</a></li>
					</ul>
				</li> 


				<li><a href="#">Fridge</a>
					<ul class ="sub">
						<li><a href="#">LG</a></li> 
						<li><a href="#">samsung</a></li>
						<li><a href="#">Kelvinator</a></li>
					</ul> 
				</li>



				<li><a href="#">Contact Us</a></li> 
				<li><a href="#">About Us</a></li> 
			</ul>
		</div>
	</div>
	
	
	<div class="row">
		<div class="panel-body white center-align shadow-div">
			<form role="form" method="post" action="login.php">
				<fieldset>
					<div class="funkyradio" id="t_radio" style="">
						<div class="form-group funkyradio-success" style=" float: left; ">
							<input  type="radio" name="tpuser" id="tpuser" value="user" checked >
							<label for="tpuser" style="width: 142px;">Users</label>
						</div>
						<div class="divider" style="float: left;position: relative;width: 5px;height: 32px;"></div>
						<div class="form-group funkyradio-success" style="position: relative; float: left; width:auto; ">
							<input  type="radio" name="tpuser" id="tpschool" value="school">
							<label for="tpschool" style="width: 147px;">School</label>
						</div>
					</div>

					<div class="form-group"  >
						<input class="form-control" placeholder="login" name="log" type="text" autofocus>
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Password" name="pass" type="password" value="" autofocus>
					</div>

					<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login" >

					<!-- Ir para o formulario de cadastro -->
					<center></br><b>No account yet? </b> <br></b><a href="Registration.php">Sign up here!</a></center>

				</fieldset>
			</form>
		</div>
	</div>
	
</body>
</html>