<?php
require_once("materia.php");
$materia=new materia();




$id=$_REQUEST['id'];
$materia->delete_materia($id);
/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 19/09/14
 * Time: 06:49 PM
 */

?>