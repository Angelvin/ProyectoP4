
<?php
/*
 * Código para mostrar datos dinámicamente en un combobox.
 */
include_once 'conexion';
//echo "<select><option value=>- Seleccione -</option>";

$result = mysql_query("SELECT idproblema,nombreProblema from problema;") or trigger_error(mysql_error());
while ($row = mysql_fetch_array($result)) {
    foreach ($row AS $key => $value) {
        $row[$key] = stripslashes($value);
    }
    echo "<option";
    $value = $row['idproblema'];
    echo " value=$value>" . nl2br($row['nombreProblema']);
    echo "</option>";
}
//echo "</select";
?>