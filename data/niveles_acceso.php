<?php

$link_pais_posible = mysqli_connect("localhost:3306", "root", "root", "pais_posible");



$result = mysqli_query($link_pais_posible, "SELECT id, nivel_acceso FROM niveles_acceso ORDER BY id ASC");


echo "<thead><tr><th style=\"text-align:center\">Orden</th><th style=\"text-align:center\">Nivel</th></thead><tbody>";


while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr ><td style=\"text-align:center\">".$row['id']."</td><td style=\"text-align:center\">".ucwords($row['nivel_acceso'])."</td>";
}
echo "</tbody>";


?>