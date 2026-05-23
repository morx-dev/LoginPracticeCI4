<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SSOO2 - Monitor Cloud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm mb-4">
            <div class="card-body text-center bg-dark text-white rounded-top">
                <h2> Monitor de Recursos del Sistema Operativo</h2>
                <p class="mb-0 text-muted">Arquitectura Desacoplada: App Docker (Capa 1)  PostgreSQL Cloud Render (Capa 2)</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <a href="<?= base_url('monitor/registrar') ?>" class="btn btn-primary btn-lg shadow">
                     Capturar y Registrar Métrica Actual del SO
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="card-title mb-0">Historial de Rendimiento Remoto (Leído de Render)</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Servidor</th>
                            <th>Uso CPU</th>
                            <th>Uso RAM</th>
                            <th>Espacio Disco Libre</th>
                            <th>Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($metricas) && is_array($metricas)): ?>
                            <?php foreach ($metricas as $fila): ?>
                                <tr>
                                    <td><?= $fila['id'] ?></td>
                                    <td><span class="badge bg-success"><?= $fila['servidor_nombre'] ?></span></td>
                                    <td>
                                        <div class="progress" style="height: 22px; background-color: #e9ecef;">
                                            <div class="progress-bar bg-danger fw-bold" role="progressbar" 
                                                 style="width: <?= max($fila['uso_cpu'], 6) ?>%; min-width: 2.5rem;" 
                                                 aria-valuenow="<?= $fila['uso_cpu'] ?>" aria-valuemin="0" aria-valuemax="100">
                                                <?= $fila['uso_cpu'] ?>%
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 22px; background-color: #e9ecef;">
                                            <div class="progress-bar bg-warning text-dark fw-bold" role="progressbar" 
                                                 style="width: <?= max($fila['uso_ram'], 6) ?>%; min-width: 2.5rem;" 
                                                 aria-valuenow="<?= $fila['uso_ram'] ?>" aria-valuemin="0" aria-valuemax="100">
                                                <?= $fila['uso_ram'] ?>%
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $fila['disco_libre'] ?></td>
                                    <td><?= $fila['fecha_registro'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay métricas registradas en la nube aún. ¡Dale al botón de arriba!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>