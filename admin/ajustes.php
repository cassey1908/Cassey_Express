<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes de Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/ajustes.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
</head>
<body>
    <?php
    include('./componenetes/aside.php');
    ?>
    <div class="container mt-5" >
        <<h2 class="text-center"><i class="fa fa-solid fa-user"></i> Ajustes de Perfil</h2>

        <div class="card p-4" style="max-width: 400px; margin: auto;">
            <!-- Foto de perfil -->
            <div class="text-center">
                <img src="./img/casey.jpg" alt="Foto de Perfil" class="rounded-circle" width="80" height="80">
                <button class="btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#modalFoto">Actualizar Foto</button>
            </div>
            
            <!-- Datos del usuario -->
            <div class="mt-4">
                <label class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" value="Usuario123" disabled>
                <button class="btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#modalUsuario">Cambiar Nombre</button>
            </div>
            
            <div class="mt-4">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="usuario@example.com" disabled>
            </div>
            
            <!-- Cambio de contraseña -->
            <div class="mt-4">
                <h5>Cambiar Contraseña</h5>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalContrasena">Actualizar Contraseña</button>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <div class="modal fade" id="modalFoto" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Actualizar Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="actualizar_foto.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="foto" class="form-control">
                        <button type="submit" class="btn btn-warning mt-2">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUsuario" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Nombre de Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="actualizar_usuario.php" method="POST">
                        <input type="text" name="usuario" class="form-control" value="Usuario123">
                        <button type="submit" class="btn btn-warning mt-2">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalContrasena" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="actualizar_contraseña.php" method="POST">
                        <input type="password" name="actual" class="form-control" placeholder="Contraseña Actual">
                        <input type="password" name="nueva" class="form-control mt-2" placeholder="Nueva Contraseña">
                        <button type="submit" class="btn btn-warning mt-2">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/all.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/fontawesome.min.js"></script>
</body>
</html>