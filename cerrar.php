<?php
SetCOOKIE('idu',"");
SetCOOKIE('acceso',"");
session_unset();
session_destroy();
print"<meta http-equiv='refresh' content='0;
url=index.php'>";
exit;
?>