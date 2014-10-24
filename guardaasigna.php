<?php
require_once('materia.php');
/**
 *
 * Created by PhpStorm.
 * User: ^_^
 * Date: 26/09/2014
 * Time: 07:08 PM
 */

$idma=$_REQUEST['maestro'];
$idm=$_REQUEST['materia'];

$new=new materia();
$new->asigna_materia_maestro($idma,$idm);

?>