<?php

include_once('conexion.php');
/**
 * Created by PhpStorm.
 * User: MAQ23-LAB2-TIC
 * Date: 25/09/14
 * Time: 06:03 PM
 */

class materia
{

    private $Id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;


    public function createM($nombre, $avatar, $orden, $status)
    {

        $insert = mysql_query("insert into materia (nombre,avatar,orden,status) values ('$nombre','$avatar','$orden','$status')");


    }

    public function consultaG_materia()
    {

        echo "<div class='table-responsive'>";
        echo " <table class=\"table table-striped\" >";
        echo "<tr><td>id</td><td>Nombre</td><td>Avatar</td><td>Orden</td><td>Status</td></tr>";
        $sql = mysql_query("select * from materia  order by id desc ") or die (mysql_error());
        while ($field = mysql_fetch_array($sql)) {
            $this->id = $field['id'];
            $this->nombre = $field['nombre'];
            $this->avatar = $field['avatar'];
            $this->orden = $field['orden'];
            $this->status = $field['status'];

            echo "<tr><td>$this->id</td><td>$this->nombre</td><td>$this->avatar</td><td>$this->orden</td><td>$this->status</td></tr>";

        }
        echo "</table></div>";

    }

    public function consultaS_materia($id)
    {

        echo "<div class='table-responsive'>";
        echo " <table class=\"table table-striped\" >";
        echo "<tr><td>id</td><td>Nombre</td><td>Avatar</td><td>Orden</td><td>Status</td></tr>";
        $sql = mysql_query("select * from materia where id='$id' order by id desc ") or die (mysql_error());
        while ($field = mysql_fetch_array($sql)) {
            $this->id = $field['id'];
            $this->nombre = $field['nombre'];
            $this->avatar = $field['avatar'];
            $this->orden = $field['orden'];
            $this->status = $field['status'];

            echo "<tr><td>$this->id</td><td>$this->nombre</td><td>$this->avatar</td><td>$this->orden</td><td>$this->status</td></tr>";

        }
        echo "</table></div>";

    }

    public function update_materia()
    {


    }

    public function delete_materia($id)
    {

        $delete = mysql_query("delete from ma_maasig where id='$id'");


    }

    public function asigna_materia_maestro($idma, $idm)
    {

        $insert = mysql_query("insert into ma_maasig (idmateria, idusuario) VALUES ($idma,$idm)");


    }

    public function asigna_materia_grupo()
    {


    }

    public function consulta_asignadas($id)
    {

        $asign = mysql_query(" select * from ma_maasig where idusuario='$id' ");
        $exist = mysql_num_rows($asign);
        if ($exist == 0) {

            echo "Sin materias asignadas";


            $sql2 = mysql_query("select * from materia ");
            $exist2 = mysql_num_rows($sql2);

            echo "<legend>Materias</legend><select name='materia'>";

            for ($y = 0; $y < $exist2; $y++) {

                $idma = mysql_result($sql2, $y, 'id');
                $nombre = mysql_result($sql2, $y, 'nombre');


                echo "<option value='$idma'>$nombre</option>";


            }
            echo "</select><br><br>";

            echo "<input type='submit' value='alta' />";

        } else {
            echo "<table class=\"table table-striped\" ><tr><td>id</td><td>Materia</td><td>Eliminar</td></tr>";
            for ($e = 0; $e < $exist; $e++) {
                $ida = mysql_result($asign, $e, 'id');
                $idma = mysql_result($asign, $e, 'idmateria');

                $namema = mysql_result(mysql_query("select nombre from materia where id=$idma"), 0, 'nombre');

                echo "<tr><td>$ida</td><td>$namema</td><td>

 <a id='elimin$ida' >       <i class='glyphicon glyphicon-remove'>    </i></a></td></tr>";


                echo " <script type='text/javascript'>
                    $(function () {
                        $('#elimin$ida').click(function()
                        {
                            var a= document.getElementById('elimin$ida')+$ida;
                            var url='deletemateria.php?id='+a;
                              //alert(url);
                            $('#delet').load(url);


                        });
                    });
                    </script>";


            }
            echo "</table>";

            echo "<legend>Materias</legend><select name='materia'>";
            $mate = mysql_query("select * from ma_maasig where idusuario='$id'") or die (mysql_error());
            echo $mates = mysql_num_rows($mate);

            $sql2 = mysql_query("    SELECT * FROM materia WHERE NOT EXISTS (SELECT * FROM ma_maasig  WHERE ma_maasig.idmateria = materia.id AND idusuario=$id );") or die (mysql_error());
            $exist2 = mysql_num_rows($sql2);

            for ($e = 0; $e < $exist2; $e++) {

                $idma = mysql_result($sql2, $e, 'id');
                $nombre = mysql_result($sql2, $e, 'nombre');


                echo "<option value='$idma'>$nombre</option>";
            }


            echo "</select><br><br>";

            echo "<input type='submit' value='alta'  />";


        }

    }


    public function teacherstart($idu)
    {

            $usuario=mysql_query("select * from usuario where idusuario='$idu'");
                $name=mysql_result($usuario,0,'nombre');
        echo"<legend>Maestro $name</legend>";
        $asign = mysql_query(" select * from ma_maasig where idusuario='$idu' ");
        $exist = mysql_num_rows($asign);
        if ($exist == 0) {

            echo "Sin materias asignadas";
        } else {
            echo "<table class=\"table table-striped\" ><tr><td>Materias</td></tr>";
            for ($e = 0; $e < $exist; $e++) {
                $ida = mysql_result($asign, $e, 'id');
                $idma = mysql_result($asign, $e, 'idmateria');

                $namema = mysql_result(mysql_query("select nombre from materia where id=$idma"), 0, 'nombre');

                echo "<tr><td>$namema</td></tr>";


            }
            echo "</table>";

        }


    }
}
?>