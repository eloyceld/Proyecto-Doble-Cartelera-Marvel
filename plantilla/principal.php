<body class="d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-5 mb-5 marvel-title">¿Cuándo es la próxima película de Marvel?</h1>
                
                <!-- Primera película/serie -->
                <div class="poster-container mb-4">
                    <img src="<?= htmlspecialchars($url_poster) ?>" alt="<?= htmlspecialchars($titulo) ?>" class="poster img-fluid shadow">
                </div>
                
                <div class="release-container p-4 mb-4 shadow">
                    <div class="countdown-days mb-3">
                        <?= htmlspecialchars($titulo) ?> - <?= htmlspecialchars($mensaje_estreno) ?>
                    </div>
                    
                    <div class="release-date mb-2">
                        Fecha de estreno: <?= htmlspecialchars($fecha_estreno) ?>
                    </div>
                    
                    <div class="next-movie">
                        La siguiente es: <?= htmlspecialchars($produccion_siguiente) ?>
                    </div>
                </div>
                
                <!-- Siguiente película/serie (si hay información disponible) -->
                <?php if (!empty($url_poster_siguiente)): ?>
                <h2 class="display-6 mb-4 marvel-title">¿Y la siguiente?</h2>
                
                <div class="poster-container mb-4">
                    <img src="<?= htmlspecialchars($url_poster_siguiente) ?>" alt="<?= htmlspecialchars($produccion_siguiente) ?>" class="poster img-fluid shadow">
                </div>
                
                <div class="release-container p-4 shadow">
                    <div class="countdown-days mb-3">
                        <?= htmlspecialchars($produccion_siguiente) ?> - <?= htmlspecialchars($mensaje_estreno_siguiente) ?>
                    </div>
                    
                    <div class="release-date">
                        Fecha de estreno: <?= htmlspecialchars($fecha_estreno_siguiente) ?>
                    </div>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>