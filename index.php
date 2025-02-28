<?php

// Incluir archivos necesarios
require_once 'constantes.php';
require_once 'funciones.php';
require_once 'clases/SiguientePelicula.php';

// Obtener información de la próxima película de Marvel
$siguiente_pelicula = SiguientePelicula::obtener_y_crear_pelicula(API_URL);
$datos_pelicula = $siguiente_pelicula->obtener_datos();

// Formatear fechas para mejor presentación
$datos_pelicula['fecha_estreno'] = formatear_fecha($datos_pelicula['fecha_estreno']);
if (!empty($datos_pelicula['fecha_estreno_siguiente'])) {
    $datos_pelicula['fecha_estreno_siguiente'] = formatear_fecha($datos_pelicula['fecha_estreno_siguiente']);
}
?>
<?php 
// Renderizar la cabecera de la página
render_plantilla('cabecera', ["titulo" => $datos_pelicula['titulo']]); 

// Renderizar el contenido principal
render_plantilla('principal', array_merge(
    $datos_pelicula,
    [
        'mensaje_estreno' => $siguiente_pelicula->obtener_mensaje_estreno(),
        'mensaje_estreno_siguiente' => $siguiente_pelicula->obtener_mensaje_estreno_siguiente()
    ]
));