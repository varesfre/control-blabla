<?php
require_once('usuario.php');
require_once('header.php');
$new=new usuario();
echo"<legend>Usuario</legend>";
echo "<div class='table-responsive'>
    <form name='usuario' action='testuser.php' method='post'>
        <table class=\"table table-striped\">
            <tr><td>Nombre(s)</td><td><input type='text' name='name'></td>
            <tr><td>Apellido paterno</td><td><input type='text' name='apep'></td>
            <tr><td>Apellido materno</td><td><input type='text' name='apem'></td>
            <tr><td>Nivel</td><td><select  name='nivel'>
                        <option value='1'>Administrador</option>
                        <option value='2'>Alumno</option>
                        <option value='3'>Maestro</option>
                    </select></td>
</tr>
        <tr><td colspan='2'><input type='submit' name='submit' value='alta'></td></tr>
        <tr><td>eliminar</td><td><input type='text' name='ide'><input type='submit' name='submit' value='delete'></td></tr>
        <tr><td>actualizar</td><td><input type='text' name='idu'><input type='submit' name='submit' value='update'></td></tr>
        <tr><td>Consultar</td><td><input type='text' name='sql'><input type='submit' name='submit' value='consulta'></td></tr>
         </table>
        </form>
    </div>";



if(isset($_POST['submit'])){
    switch ($_POST['submit']){
        case "alta";


            $name=$_POST['name'];
            $apep=$_POST['apep'];
            $apem=$_POST['apem'];
            $nivel=$_POST['nivel'];

            $new->create($name,$apep,$apem,$nivel);
            //$new->create("$_POST['name']","$_POST['apep']","$_POST['apem']","$_POST['nivel']");

        break;

        case "delete";

           $id=$_POST['ide'];
            $new->delete($id);
            break;

        case "update";

            $idu=$_POST['idu'];
            $name=$_POST['name'];
            $apep=$_POST['apep'];
            $apem=$_POST['apem'];
            $nivel=$_POST['nivel'];
            $new->update($idu,$name,$apep,$apem,$nivel);

            break;
        case "consulta";

            $sql=$_POST['sql'];

            $new->readuS($sql);

            break;
    }


}

$new->readuG();
//$new->delete(25);
//$new->update(1);



?>

