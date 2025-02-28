<?php

declare(strict_types=1);


class SiguientePelicula
{

    public function __construct(
        private string $titulo,
        private int $dias_restantes,
        private string $produccion_siguiente,
        private string $fecha_estreno,
        private string $url_poster,
        private string $sinopsis,
        private ?string $url_poster_siguiente = null,
        private ?string $fecha_estreno_siguiente = null,
        private ?int $dias_restantes_siguiente = null
    ) {
    }

    public function obtener_mensaje_estreno(): string
    {
        $dias = $this->dias_restantes;

        return match (true) {
            $dias === 0     => "¡Hoy se estrena la película!",
            $dias === 1     => "Mañana se estrena",
            $dias < 7       => "Esta semana se estrena",
            $dias < 30      => "Este mes se estrena",
            default         => "$dias días para que la película se estrene",
        };
    }

    public function obtener_mensaje_estreno_siguiente(): string
    {
        if ($this->dias_restantes_siguiente === null) {
            return "No hay información disponible";
        }

        $dias = $this->dias_restantes_siguiente;

        return match (true) {
            $dias === 0     => "¡Hoy se estrena la película!",
            $dias === 1     => "Mañana se estrena",
            $dias < 7       => "Esta semana se estrena",
            $dias < 30      => "Este mes se estrena",
            default         => "$dias días para que la película se estrene",
        };
    }

    public static function obtener_y_crear_pelicula(string $url_api): SiguientePelicula
    {
        $respuesta = @file_get_contents($url_api);
        
        if ($respuesta === false) {
            // Si no se puede acceder a la API, usar datos de ejemplo
            return new self(
                'Daredevil: Born Again',
                30,
                'Desconocido',
                '2025-03-04',
                'https://m.media-amazon.com/images/M/MV5BNGZlMjIyNGUtMjNkMS00ZDIyLThkZWMtMDliNzMyMDhmYTVjXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg',
                'Marvel Studios\' Daredevil: Born Again, an Original series, streaming March 2025 on Disney+.'
            );
        }
        
        // Decodificar el JSON recibido en un array asociativo
        $datos = json_decode($respuesta, true);
        
        return new self(
            $datos["title"],
            $datos["days_until"],
            $datos["following_production"]["title"] ?? "Desconocido",
            $datos["release_date"],
            $datos["poster_url"],
            $datos["overview"] ?? "",
            $datos["following_production"]["poster_url"] ?? null,
            $datos["following_production"]["release_date"] ?? null,
            $datos["following_production"]["days_until"] ?? null
        );
    }

    public function obtener_datos(): array
    {
        return get_object_vars($this);
    }
}