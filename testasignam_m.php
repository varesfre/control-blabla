<?php
require('grupo.php');
require('materia.php');
require_once('header.php');

$new=new grupo();
$materia=new materia();


$sql=mysql_query("select * from usuario where nivel=2");
 $exist=mysql_num_rows($sql);


if(isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case "agregar";


            $idm = $_POST['maestro'];
            $idma = $_POST['materia'];


            $materia->asigna_materia_maestro($idma,$idm);


            break;
    }
}




echo "<legend>Asignacion de maestros</legend>
<div class='table-responsive'>
<form action='testasignam_m.php' name='asignamama' id='asignamama' method='post'>
<table  class=\"table table-striped\" >
<tr><td>Maestros </td></tr>
<tr><td><select name='maestro' id='maestro'>";

for($y=0;$y<$exist;$y++){

$idm=mysql_result($sql,$y,'idusuario');
$nombre=mysql_result($sql,$y,'nombre');
$apa=mysql_result($sql,$y,'apellido_paterno');
$ama=mysql_result($sql,$y,'apellido_materno');

    echo "<option value='$idm'>($idm)$nombre $apa $ama</option>";



}
echo "</select></td></td></table>";

echo"<div id='sql'></div>
<div id='sql2'></div>
<div id='delet' style='display:none'></div>
</form>

";


require_once('footer.php');

?>
<script type="text/javascript">
    $(function () {

        $('#maestro').click(function()
        {
            $('#sql').load('result_combo.php?idm=' + this.options[this.selectedIndex].value)

        });
    });
</script>

<script type="text/javascript">
    $(function (e) {
        $('#asignamama').submit(function (e) {
            e.preventDefault()
            $('#sql2').load('guardaasigna.php?'+ $('#asignamama').serialize())
            $('#sql').load('result_combo.php?idm=' + this.options[this.selectedIndex].value)
        })
    })
</script>
