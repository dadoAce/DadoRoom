<?php

/**
 * Description of sesiones
 *
 * @author dado_
 */
class Imagenes extends App
{

    public $_rutaImg = "assets/imgs/";

    public function __construct()
    {
    }

    //CREAR CARPETA EN CASO DE QUE NO HAYA EN DONDE GUARDAR LA IMAGEN
    public function crearCarpeta($carpeta, $nombre)
    {

        $ruta = $this->rutaImg . $carpeta . "/" . $nombre;
        if (!is_dir($ruta)) {
            mkdir($ruta);
        }
    }

    //SUBIR IMAGEN AL SERVIDOR, SE UTILIZA LA CAPERTA DE LA VARIBALE _rutaImg
    public function subirImagen($imagen, $carpeta, $nombre)
    {
        $ruta = $this->rutaImg . $carpeta . "/" . $nombre;
        if (move_uploaded_file($_FILES['img-upload']['tmp_name'], $ruta)) {
        }
    }

    //SUBIR IMAGEN AL SERVIDOR, SE PUEDE MODIFICAR LA CALIDAD CON LA QUE SE SUBE AL SERVIDOR
    public function subirImagenCalidad($imagen, $carpeta, $nombre = null, $calidad)
    {

        $ruta = $this->rutaImg . $carpeta . "/" . $nombre;
        switch (exif_imagetype($imagen["tmp_name"])) {
            case 1:
                break;
            case 2:
                $ruta .= ".jpg";
                $image = imagecreatefromjpeg($imagen['tmp_name']);
                $procesoIMG = imagejpeg($image, $ruta, $calidad);
                break;
            case 3:
                if ($calidad > 10) {
                    $calidad = ($calidad / 10);
                }
                $ruta .= ".png";
                $image = imagecreatefrompng($imagen['tmp_name']);
                $procesoIMG = imagepng($image, $ruta, $calidad);
                break;

            default:
                break;
        }
        /*Verificar*/
        if ($procesoIMG) {
            return $ruta;
        } else {
            return "error";
        }
    }

    //VERIFICAR EL TIPO DE IMAGEN 
    public function tipoImagen($imagen)
    {
        $tipo = exif_imagetype($imagen["tmp_name"]);

        switch ($tipo) {
            case 1:
                return "gif";
                break;
            case 2:
                return "jpg";

                break;
            case 3:
                return "png";

                break;

            default:
                break;
        }
    }
}
