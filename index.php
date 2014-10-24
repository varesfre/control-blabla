<!DOCTYPE html>
<html lang="en">
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

<body background="fondo01.gif">


<div class="alert-success">
    <div class="table-responsive">
        <center>
            <form action="index.php" method="post" id="oneform">
<table>

    <tr><td><i class="glyphicon glyphicon-user">Define tu usuario</i></td><td><input type="text" name="user"></td></tr>
    <tr><td><i class="glyphicon glyphicon-lock">Define tu Password</i></td><td><input type="password" name="pass"></td></tr>
    <tr><td colspan="2"><input type="submit" class="btn-block btn-primary" value="Entrar"/> </td></tr>
</table>
            </form>
        </center>
    </div>

</div>

<div id="validate"></div>


<script type="text/javascript">
    $(function (e) {
        $('#oneform').submit(function (e) {
            e.preventDefault()
            $('#validate').load('valida.php?' + $('#oneform').serialize())
        })
    })
</script>
</body>
</html>