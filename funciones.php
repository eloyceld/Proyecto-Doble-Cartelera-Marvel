<?php

declare(strict_types=1); 

function render_plantilla(string $plantilla, array $data = []): void
{
    extract($data); // Extrae las variables del array asociativo
    require "plantilla/$plantilla.php";
}


function formatear_fecha(string $fecha): string
{
    return date('d/m/Y', strtotime($fecha));
}

function obtener_mensaje_estreno(int $dias): string
{
    return match (true) {
        $dias === 0     => "¡Hoy se estrena!",
        $dias === 1     => "Mañana se estrena",
        $dias < 7       => "Esta semana se estrena",
        $dias < 30      => "Este mes se estrena",
        default         => "$dias días hasta el estreno",
    };
}