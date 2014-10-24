<?php
require_once('header.php');



require_once('materia.php');

$new=new materia();
$idu=$_COOKIE['idu'];


$new->teacherstart($idu);










/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 02/10/2014
 * Time: 06:24 PM
 */
?>
