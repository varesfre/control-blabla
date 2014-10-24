<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="bootstrap/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
    <script src="bootstrap/js/jquery.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
require_once('conexion.php');
$user=$_REQUEST['user'];
$psw=$_REQUEST['pass'];
 if($user==""or $psw=="")
{
	echo "<div class='alert-warning'><center>Los campos deben de ir llenos</center></div>";


$sql="Select * from usuario where usuario='$user' and contrasena='$psw'";
$consulta=mysql_query($sql) or die(mysql_error()); 
$filas=mysql_num_rows($consulta);
if($filas==0)
	{
		//$sql1="Select * from usuario where usuario='$user'";
		//$consulta1 =mysql_query($sql1) or die(mysql_error());
		//$id=mysql_result($consulta1,0,'idusuario');

			echo "<div class='alert-danger'><center>Usuario o Password no valido</center></div>";


	}
else {
    $idu = mysql_result($consulta, 0, 'idusuario');
    $activo = mysql_result($consulta, 0, 'status');
    if ($activo == '2') {
        echo $msg = "El usuario esta desactivado, consulte a su administrador";

    }
  }
}


				                    else
                        {
                            $sql="Select * from usuario where usuario='$user' and contrasena='$psw'";
                            $consulta=mysql_query($sql) or die(mysql_error());
                            $idu = mysql_result($consulta, 0, 'idusuario');
                            $activo = mysql_result($consulta, 0, 'status');
                            $url="accesos.php?idu=$idu";
                            echo "<script>window.location='$url';</script>";

					}


?>