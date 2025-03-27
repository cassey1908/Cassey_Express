<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/YOUR-FONT-AWESOME-CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/dashboard.css">

</head>

<body>
    <?php
    include('./componenetes/aside.php');
    ?>

    <main class="content">
        <div class="container">
            <div class="top-bar">
                <div>
                    <span id="category-name">Dashboard</span>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Buscar...">
                </div>
            </div>
            <h4 class="mb-4">Dashboard<i class="fas fa-tachometer-alt"></i></h4>

            <!-- Estadísticas de ventas -->
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard-card bg-ventas">
                        <i class="fas fa-cash-register"></i>
                        <h5>Total de Ventas</h5>
                        <div class="value">$2,350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card bg-productos">
                        <i class="fas fa-box"></i>
                        <h5>Cantidad de Productos</h5>
                        <div class="value">150</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card bg-pedidos">
                        <i class="fas fa-shopping-cart"></i>
                        <h5>Total de Pedidos</h5>
                        <div class="value">320</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card bg-clientes">
                        <i class="fas fa-users"></i>
                        <h5>Clientes Activos</h5>
                        <div class="value">180</div>
                    </div>
                </div>

            </div>
            <div class="card col-12 d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <canvas id="grafica" width="100" height="25"></canvas>
                </div>
            </div>

            <!-- Pedidos recientes -->
            <div class="latest-orders-table">
                <h4>Últimos Pedidos</h4>
                <table>
                    <thead>
                        <tr>
                            <th>Pedido #</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1045</td>
                            <td>Juan Pérez</td>
                            <td>2025-03-11</td>
                            <td>$45.00</td>
                        </tr>
                        <tr>
                            <td>#1046</td>
                            <td>Ana García</td>
                            <td>2025-03-11</td>
                            <td>$32.50</td>
                        </tr>
                        <tr>
                            <td>#1047</td>
                            <td>Carlos López</td>
                            <td>2025-03-10</td>
                            <td>$58.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="./js/all.min.js"></script>
    <script src="./js/fontawesome.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./js/graficas.js"></script>
</body>

</html>