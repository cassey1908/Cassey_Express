<?php
// Aquí puedes agregar tu lógica PHP si es necesario (por ejemplo, para procesar el formulario).
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Cassey Express</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/YOUR-FONT-AWESOME-CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <style>
        body {
            background-color: rgb(223, 154, 58);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-login {
            background-color: rgb(223, 154, 58);
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
        .btn-login:hover {
            background-color: #f1b24b;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Iniciar sesión</h2>
        <form id="login" action="php/login.php" method="POST">
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu correo" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Introduce tu contraseña" required>
    </div>
    <button type="submit" class="btn-login">Iniciar sesión</button>
</form>

    </div>

    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
