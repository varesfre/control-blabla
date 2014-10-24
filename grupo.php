<?php
/**
 * Created by PhpStorm.
 * User: MAQ23-LAB2-TIC
 * Date: 25/09/14
 * Time: 06:40 PM
 */
include_once('conexion.php');

class grupo {

    private $Id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;


    public function createG($nombre,$avatar,$orden,$status){

        $insert=mysql_query("insert into grupo (nombre,avatar,orden,status) values ('$nombre','$avatar','$orden','$status')" );


    }
    public function consultaG_g(){

        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td>id</td><td>Nombre</td><td>Avatar</td><td>Orden</td><td>Status</td></tr>";
        $sql=mysql_query("select * from grupo  order by id desc ") or die (mysql_error());
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['id'];
            $this->nombre=$field['nombre'];
            $this->avatar=$field['avatar'];
            $this->orden=$field['orden'];
            $this->status=$field['status'];

            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->avatar</td><td>$this->orden</td><td>$this->status</td></tr>";

        }
        echo"</table></div>";

    }
    public function consultaS_g($id){

        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td>id</td><td>Nombre</td><td>Avatar</td><td>Orden</td><td>Status</td></tr>";
        $sql=mysql_query("select * from grupo where id='$id' order by id desc ") or die (mysql_error());
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['id'];
            $this->nombre=$field['nombre'];
            $this->avatar=$field['avatar'];
            $this->orden=$field['orden'];
            $this->status=$field['status'];

            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->avatar</td><td>$this->orden</td><td>$this->status</td></tr>";

        }
        echo"</table></div>";

    }
    public function update_g($id,$name,$avatar,$orden,$status){

$update=mysql_query("update grupos set nombre='$name',avatar='$avatar',orden='$orden',status='$status' where id='$id'");

    }
    public function delete_g($id){

        $update=mysql_query("delete from grupo where id='$id'");

    }

    public function asigna_alumno_grupo($idu,$idg){

        $insert=mysql_query("insert into grupos (idusuario,idgrupo) values ($idu,$idg)");

    }



    public function exist($id){


        echo"<table class=\"table table-striped\">";
        echo"<tr><td>Nombre</td><td>Eliminar</td></tr>";
        $yes=mysql_query("select * from grupos where idgrupo=$id ")or die (mysql_error());
        while($rows=mysql_fetch_array($yes)){
            $this->id=$rows['id'];
            $this->idusuario=$rows['idusuario'];
            $this->idgrupo=$rows['idgrupo'];

             $idu=$this->idusuario;
            $id=$this->id;
            $name=mysql_result(mysql_query("select nombre from usuario where idusuario=$idu "),0,'nombre');

            echo"<tr><td>$name</td><td><a class='delete' id='delete$id'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";

           echo" <script type='text/javascript'>
                $(function () {
                    $('#delete$id').click(function()
                    {
                    var a= document.getElementById('delete$id')+$id;
                    var url='deletealumno.php?id='+a;

                      $('#delet').load(url);


                            });
                                });
                    </script>";



        }
        echo"</table>";


    }

    public function without(){


        $yes = mysql_query("SELECT * FROM usuario WHERE nivel=3 and NOT EXISTS (SELECT * FROM grupos  WHERE grupos.idusuario= usuario.idusuario );") or die (mysql_error());
         $tds=mysql_num_rows($yes);


            for($a=0;$a<$tds;$a++){

                $id=mysql_result($yes,$a,'idusuario');
                $alum=mysql_result($yes,$a,'nombre');
                $apa=mysql_result($yes,$a,'apellido_paterno');
                $ama=mysql_result($yes,$a,'apellido_materno');

                echo "<input type='checkbox' name='alum$a' value='$id'> $alum $apa $ama</input><br>";


            }
    }


    public function delete_alum_group($idg){


        $delete=mysql_query("delete from grupos where id='$idg'");



    }

    function groups(){

        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td>Grupos</td></tr>";
        echo"<tr><td><select name='group' id='grupo'>";
        $sql=mysql_query("select * from grupo  order by id asc ") or die (mysql_error());
        $groups=mysql_num_rows($sql);

        for($x=0;$x<$groups;$x++){

            $idg=mysql_result($sql,$x,'id');
            $grupo=mysql_result($sql,$x,'nombre');
            echo"<option value='$idg'>$grupo</option>";

        }
        echo"</select></td></tr></table></div>";

    }






}
?>