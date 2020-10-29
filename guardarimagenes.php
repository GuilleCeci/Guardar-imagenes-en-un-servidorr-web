<html>
<head>
<title>Subida de imagenes a un servidor web</title>
<meta charset="UTF-8">
</head>
<?php



$path = "C:/xampp/imgusers";
if(!is_dir($path)){
    mkdir($path, 0777, true);
}
    if (isset($_POST['boton'])) {
        //Recogemos el archivo enviado por el formulario
        $imagen1 = $_FILES['imagen1']['name'];
        $imagen2 = $_FILES['imagen2']['name'];
        
        //Si el archivo contiene algo y es diferente de vacio
        if ((isset($imagen1) && $imagen1 != "" ) || (isset($imagen2) && $imagen2 != "")) {
              //datos de la imagen 1
            $tipo = $_FILES['imagen1']['type'] && $_FILES['imagen2']['type']; 
            $tamano1 = $_FILES['imagen1']['size'] ;
            $temp1 = $_FILES['imagen1']['tmp_name'];
            //datos de la imagen 2
           // $tipo2 = $_FILES['imagen2']['type'];
            $tamano2 = $_FILES['imagen2']['size'];
            $temp2 = $_FILES['imagen2']['tmp_name'];
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if (!((strpos($tipo, "jpg") || strpos($tipo, "png") ||  strpos($tipo, "JPEG"))
            && ($tamano1 < 2000000) || ($tamano2 < 2000000) || ($tamano1 + $tamano2 < 3000000))) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos , .jpg, .png. y de 200 kb como máximo.</b></div>';
            }
            else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                if (move_uploaded_file($temp1, "$path/$imagen1") && move_uploaded_file($temp2, "$path/$imagen2")) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                   // chmod('"C:/xampp/imgusers"'.$imagen1, 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                    echo '<div><b>imagenes guardadas con exito en la ruta definida</b></div>';
                                         
                }
                else {
                    //error al no subirse la imagen
                    echo '<div><b>no se ha guardado la imagen</b></div>';
                }
            }
        }
    }


?>


<body>

<br />
	<a href="guardarimagenes.html">Ir a la pagina de subida de imagenes</a>
</body>
</html>