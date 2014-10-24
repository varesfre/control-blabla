<?php
include_once('conexion.php');
include_once('grupo.php');
/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 02/10/2014
 * Time: 01:04 AM
 */
$new=new grupo();

$idg=$_REQUEST['id'];
$new->delete_alum_group($idg);



?>