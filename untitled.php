<?php
//conecto con la base de datos
//este script está sobre mi instalación local de apache + php + mysql
$conn = mysql_connect ("localhost", "root", "");
//selecciono la base de datos con la que trabajar
mysql_select_db("dw");


$ssql = "select * from pais";
$rs = mysql_query($ssql);
$i=0;
while ($fila=mysql_fetch_object($rs)){
   $i++;
   echo '<div id=f' . $i . '><form id=form' . $i . '>
      <input type="hidden" name="formulario_origen" value="f' . $i . '">
      <input type="hidden" name="id_pais" value="' . $fila->id_pais . '">
      <input type="text" name="nombre_pais" maxlength="100" size=50 value="' . $fila->nombre_pais . '">
      <br>
      <input type="text" name="bandera" size=30 maxlength="30" value="' . $fila->bandera . '">
      <br>
      <input type="button" value="guardar" onclick="xajax_procesar_formulario(xajax.getFormValues(\'form' . $i . '\'))">
   </form></div>
   <div id=errorf' . $i . '></div>';
   echo "</p>";
}

mysql_close($conn);
<?

function procesar_formulario($form_entrada){
   $respuesta = new xajaxResponse();
   //valido los datos
   $errores = "";
   if ($form_entrada["nombre_pais"] == ""){
      $errores = "Escribe un nombre de país";
   }elseif($form_entrada["bandera"] == ""){
      $errores = "Escribe el nombre de una imagen en el campo bandera";
   }
   
   if ($errores != ""){
      //hubo errores de validación en el formulario
      //muestro un mensaje de error.
      $salida="<b style='color:red;'>ERROR:</b>" . $errores;
      $respuesta->Assign("error" . $form_entrada["formulario_origen"],"innerHTML",$salida);
   }else{
      //si no tiene errores de validación el formulario
      $conn = mysql_connect ("localhost", "root", "");
      mysql_select_db("dw");
      $ssql = "update pais set nombre_pais='" . $form_entrada["nombre_pais"] . "', bandera='" . $form_entrada["bandera"] . "' where id_pais=" . $form_entrada["id_pais"];
       if (mysql_query($ssql)){
         $salida="<b style='color:green;'>OK!</b>";
         $respuesta->Assign($form_entrada["formulario_origen"],"innerHTML",$salida);
         $respuesta->Assign("error" . $form_entrada["formulario_origen"],"innerHTML","");
      }else{
          $salida="<b style='color:red;'>ERROR</b>";
         $respuesta->Assign("error" . $form_entrada["formulario_origen"],"innerHTML",$salida . "<span style='font-size:8pt'>" . mysql_error() . "</span>");
      }

      mysql_close($conn);
   }
//tenemos que devolver la instanciación del objeto xajaxResponse
return $respuesta;
}
$xajax = new xajax(); 
$xajax->setCharEncoding('ISO-8859-1');
$xajax->configure('decodeUTF8Input',true);

<?
//incluímos la clase ajax
require ('../xajax/xajax/xajax_core/xajax.inc.php');

//instanciamos el objeto de la clase xajax
$xajax = new xajax(); 
$xajax->setCharEncoding('ISO-8859-1');
$xajax->configure('decodeUTF8Input',true);

function procesar_formulario($form_entrada){
   $respuesta = new xajaxResponse();
   //valido los datos
   $errores = "";
   if ($form_entrada["nombre_pais"] == ""){
      $errores = "Escribe un nombre de país";
   }elseif($form_entrada["bandera"] == ""){
      $errores = "Escribe el nombre de una imagen en el campo bandera";
   }
   
   if ($errores != ""){
      //hubo errores de validación en el formulario
      //muestro un mensaje de error.
      $salida="<b style='color:red;'>ERROR:</b>" . $errores;
      $respuesta->Assign("error" . $form_entrada["formulario_origen"],"innerHTML",$salida);
   }else{
      //si no tiene errores de validación el formulario
      $conn = mysql_connect ("localhost", "root", "");
      mysql_select_db("dw");
      $ssql = "update pais set nombre_pais='" . $form_entrada["nombre_pais"] . "', bandera='" . $form_entrada["bandera"] . "' where id_pais=" . $form_entrada["id_pais"];
       if (mysql_query($ssql)){
         $salida="<b style='color:green;'>OK!</b>";
         $respuesta->Assign($form_entrada["formulario_origen"],"innerHTML",$salida);
         $respuesta->Assign("error" . $form_entrada["formulario_origen"],"innerHTML","");
      }else{
          $salida="<b style='color:red;'>ERROR</b>";
         $respuesta->Assign("error" . $form_entrada["formulario_origen"],"innerHTML",$salida . "<span style='font-size:8pt'>" . mysql_error() . "</span>");
      }

      mysql_close($conn);
   }
//tenemos que devolver la instanciación del objeto xajaxResponse
return $respuesta;
}
$xajax->register(XAJAX_FUNCTION, 'procesar_formulario'); 

//El objeto xajax tiene que procesar cualquier petición
$xajax->processRequest();
?>


<html>
<head>
   <title>Listado de breves</title>
   <?
   $xajax->printJavascript("../xajax/xajax/");
   ?>
</head>

<body>
<?
//conecto con la base de datos
//este script está sobre mi instalación local de apache + php + mysql
$conn = mysql_connect ("localhost", "root", "");
//selecciono la base de datos con la que trabajar
mysql_select_db("dw");


$ssql = "select * from pais";
$rs = mysql_query($ssql);
$i=0;
while ($fila=mysql_fetch_object($rs)){
   $i++;
   echo '<div id=f' . $i . '><form id=form' . $i . '>
      <input type="hidden" name="formulario_origen" value="f' . $i . '">
      <input type="hidden" name="id_pais" value="' . $fila->id_pais . '">
      <input type="text" name="nombre_pais" maxlength="100" size=50 value="' . $fila->nombre_pais . '">
      <br>
      <input type="text" name="bandera" size=30 maxlength="30" value="' . $fila->bandera . '">
      <br>
      <input type="button" value="guardar" onclick="xajax_procesar_formulario(xajax.getFormValues(\'form' . $i . '\'))">
   </form></div>
   <div id=errorf' . $i . '></div>';
   echo "</p>";
}

mysql_close($conn);
?>


</body>
</html>