<?php 
function Conectarse() 
{ 
   if (!($link=mysql_connect("localhost:3306","root","root"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("quality",$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
} 
?>