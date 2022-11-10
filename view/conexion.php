<?php
    $mysqli = new mysqli("localhost", "root", "", "stubank");
    if ($mysqli->connect_errno) {
        echo "Conexión fallida a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>
