<?php
include_once('conexion.php');
include_once('grupo.php');

$grupo=new grupo();


            $idg=$_REQUEST['group'];
            $yes = mysql_query("SELECT * FROM usuario WHERE nivel=3 and NOT EXISTS (SELECT * FROM grupos  WHERE grupos.idusuario= usuario.idusuario );") or die (mysql_error());
            $tds=mysql_num_rows($yes);



            for($a=0;$a<$tds;$a++){

                $idu=$_REQUEST['alum'.$a];

                $grupo->asigna_alumno_grupo($idu,$idg);


            }


            //$new->create($name,$apep,$apem,$nivel);
            //$new->create("$_POST['name']","$_POST['apep']","$_POST['apem']","$_POST['nivel']");

/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 02/10/2014
 * Time: 01:18 AM
 */
?>