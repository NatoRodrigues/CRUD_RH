
<?php
session_start();
require "../functions/list_functions.php";
require "../model/conn.php";

$registros = true;

if ($registros == true) {
    lista_user();
}

else

?>