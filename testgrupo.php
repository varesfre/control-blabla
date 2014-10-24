<?php
require('grupo.php');
require_once('header.php');
$new=new grupo();

echo"
<legend>Grupos</legend>";
$new->consultaG_g();
/**
 * Created by PhpStorm.
 * User: MAQ23-LAB2-TIC
 * Date: 25/09/14
 * Time: 06:17 PM
 */

echo"
 <div class='table-responsive'>
<form name='grupo' action='testgrupo.php' method='POST'>
    <table class= \"table table-striped\">
            <tr><td>Nombre</td><td><input type='text' name='name'></td>
            <tr><td>Avatar</td><td><input type='text' name='avatar'></td>
            <tr><td>orden</td><td><input type='text' name='orden'></td>
            <tr><td>Status</td><td><input type='text' name='status'></td>
</tr>
        <tr><td colspan='2'><input type='submit' name='submit' value='alta'></td></tr>
        <tr><td>eliminar</td><td><input type='text' name='ide'><input type='submit' name='submit' value='delete'></td></tr>
        <tr><td>actualizar</td><td><input type='text' name='idu'><input type='submit' name='submit' value='update'></td></tr>
        <tr><td>Consultar</td><td><input type='text' name='sql'><input type='submit' name='submit' value='consulta'></td></tr>
         </table>
        </form>";

if(isset($_POST['submit'])){
    switch ($_POST['submit']){
        case "alta";


            $name=$_POST['name'];
            $avatar=$_POST['avatar'];
            $orden=$_POST['orden'];
            $status=$_POST['status'];

            $new->createG($name,$avatar,$orden,$status);
            //$new->create("$_POST['name']","$_POST['apep']","$_POST['apem']","$_POST['nivel']");

            break;

        case "delete";

            $id=$_POST['ide'];
            $new->delete_g($id);
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

            $new->consultaS_g($sql);

            break;
    }


}






?>