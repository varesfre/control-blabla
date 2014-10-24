<?php
/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 26/09/2014
 * Time: 06:47 PM
 */
require_once('materia.php');

$new=new materia();
 $id=$_REQUEST['idm'];

$new->consulta_asignadas($id);




?>