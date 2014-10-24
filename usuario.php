<?php
/**
 * Created by PhpStorm.
 * User: MAQ23-LAB2-TIC
 * Date: 12/09/14
 * Time: 06:04 PM
 */
include_once('conexion.php');
class usuario {

    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $telefono;
    private $calle;
    private $numero_externo;
    private $numero_interior;
    private $colonia;
    private $municipio;
    private $estado;
    private $CP;
    private $correo;
    private $usuario;
    private $contrasena;
    private $nivel;
    private $status;

    public function create($nombre,$apellidop,$apellidom,$nivel){

        $insert=mysql_query("insert into usuario (nombre,apellido_paterno,apellido_materno,nivel,status)
                                 values ('$nombre','$apellidop','$apellidom','$nivel',1)");
    }

    public function readuG(){

        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td>idusuario</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Tipo</td></tr>";
        $sql=mysql_query("select * from usuario  order by idusuario desc ") or die (mysql_error());
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['idusuario'];
            $this->nombre=$field['nombre'];
            $this->apellido_paterno=$field['apellido_paterno'];
            $this->apellido_materno=$field['apellido_materno'];
            $this->nivel=$field['nivel'];
            switch($this->nivel){
                case 1;
                    $type="Administrador";
                    break;
                case 2;
                    $type="alumno";
                    break;
                case 3;
                    $type="maestro";
                    break;
            }
            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellido_paterno</td><td>$this->apellido_materno</td><td>$type</td></tr>";

        }
        echo"</table></div>";


    }

    public function readuS($id){

        //$idu=mysql_result(mysql_query(" select * from usuario where idusuario=$id"),0,'idusuario');


      $sql=mysql_query("select * from usuario where idusuario='$id' ") or die (mysql_error());
        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td>idusuario</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Tipo</td></tr>";
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['idusuario'];
            $this->nombre=$field['nombre'];
            $this->apellido_paterno=$field['apellido_paterno'];
            $this->apellido_materno=$field['apellido_materno'];
            $this->nivel=$field['nivel'];

            switch($this->nivel){
               case 1;
                    $type="Administrador";

                    break;
                case 2;
                    $type="alumno";
                    break;
                case 3;
                    $type="maestro";
                    break;
            }

        }

        echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellido_paterno</td><td>$this->apellido_materno</td><td>$type</td></tr>";
        echo"</table></div>";

    }

    public function delete($id){

        $delete=mysql_query("delete from usuario where idusuario=$id");


    }


    public function update($id,$na,$ap,$apm,$niv){



        $update=mysql_query("update usuario set nombre='$na',apellido_paterno='$ap',apellido_materno='$apm', nivel='$niv' where idusuario=$id");

    }


}
?>
