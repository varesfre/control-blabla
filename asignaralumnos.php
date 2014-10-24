<?php
require_once("grupo.php");
require_once("usuario.php");
require_once('header.php');

/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 19/09/14
 * Time: 06:50 PM
 */

$grupo=new grupo();
$alumno=new usuario();

echo "<legend>Crear grupos</legend>";

echo"<form action='asignaralumnos.php' method='post' id='register'>";
echo"Alumnos sin asignar <br>";
$grupo->without();
echo"<input type='submit' name='submit' value='registrar' />";
$grupo->groups();
echo"</form>";
echo"<div class='table-responsive' >Alumnos asignados<br><div  id='result'></div></div>";
echo"<div  id='delet' style='display: none'></div>";
require_once('footer.php');
?>
<script type="text/javascript">
    $(function () {

        $('#grupo').click(function()
        {
            $('#result').load('result_comboG.php?idG=' + this.options[this.selectedIndex].value)

        });
    });
</script>

<script type="text/javascript">
    $(function (e) {
        $('#register').submit(function (e) {
            e.preventDefault()
            $('#delet').load('savegroupandstudent.php?' + $('#register').serialize())
        })
    })
</script>


