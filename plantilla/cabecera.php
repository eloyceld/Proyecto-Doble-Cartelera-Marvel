<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel es: <?= $titulo; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0a0e17;
            color: white;
            min-height: 100vh;
        }
        
        .poster-container {
            position: relative;
        }
        
        .poster {
            max-width: 300px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        
        .poster:hover {
            transform: scale(1.05);
        }
        
        .marvel-title {
            font-weight: 700;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }
        
        .release-container {
            background-color: rgba(20, 30, 48, 0.8);
            border-radius: 10px;
        }
        
        .countdown-days {
            font-size: 2rem;
            font-weight: 700;
        }
        
        .release-date, .next-movie {
            color: #adb5bd;
        }
    </style>
</head>