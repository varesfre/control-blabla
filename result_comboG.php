<?php
/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 26/09/2014
 * Time: 06:47 PM
 */
require_once('grupo.php');

$new=new grupo();
 $id=$_REQUEST['idG'];

$new->exist($id);




?>