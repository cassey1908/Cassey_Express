<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/YOUR-FONT-AWESOME-CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/pedidos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    

</head>
<body>
    <?php
    include ('./componenetes/aside.php');
    ?>
   <main class="content">
    <div class="container mt-5">
        <div class="top-bar d-flex justify-content-between">
            <div>
                <span id="category-name">Pedidos</span>
            </div>
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Buscar...">
            </div>
        </div>
        <h4 class="mb-4"><i class="fas fa-shopping-cart"></i> Pedidos</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaPedidos">
                
                <tr>
                    <td>Santos Ndong</td>
                    <td>Lamper</td>
                    <td>12/03/2025</td>
                    <td>5.000XAF</td>
                    <td><span class="badge bg-primary">Pendiente...</span></td>
                    <td>
                        
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Accion
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-success" href="#"><i class="fa fa-solid fa-check-circle"></i> Validar</a></li>

                                <li><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-circle-xmark"></i> Denegar</a></li>


                                <li><a data-bs-toggle="modal" data-bs-target="#orderModal" onclick="showOrderDetails('Juan Pérez', 'Calle Ficticia 123', [{name: 'Cheeseburger', qty: 2, price: 3.00}, {name: 'Papas fritas', qty: 1, price: 1.75}], '12/03/2025', '$7.75')" class="dropdown-item text-warning" href="#"><i class="fa fa-regular fa-eye"></i>Ver detalle</a></li>
                                
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Frida Pilar</td>
                    <td>San jose</td>
                    <td>12/03/2025</td>
                    <td>12.000XAF</td>
                    <td><span class="badge bg-primary">Pendiente...</span></td>
                    <td>
                        
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Accion
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-success" href="#"><i class="fa fa-solid fa-check-circle"></i> Validar</a></li>

                            <li><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-circle-xmark"></i> Denegar</a></li>

                            <li><a data-bs-toggle="modal" data-bs-target="#orderModal" onclick="showOrderDetails('Juan Pérez', 'Calle Ficticia 123', [{name: 'Cheeseburger', qty: 2, price: 3.00}, {name: 'Papas fritas', qty: 1, price: 1.75}], '12/03/2025', '$7.75')" class="dropdown-item text-warning" href="#"><i class="fa fa-regular fa-eye"></i>Ver detalle</a></li>
                            
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<!-- Modal para ver detalles del pedido -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Detalles del Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> <span id="order-name"></span></p>
                <p><strong>Dirección:</strong> <span id="order-address"></span></p>
                <h5>Productos:</h5>
                <ul id="order-products"></ul>
                <p><strong>Fecha:</strong> <span id="order-date"></span></p>
                <p><strong>Total:</strong> <span id="order-total"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para mostrar los detalles del pedido en el modal
    function showOrderDetails(name, address, products, date, total) {
        // Mostrar datos del cliente y fecha
        document.getElementById('order-name').innerText = name;
        document.getElementById('order-address').innerText = address;
        document.getElementById('order-date').innerText = date;
        document.getElementById('order-total').innerText = total;

        // Mostrar productos con su cantidad y precio
        const productsList = document.getElementById('order-products');
        productsList.innerHTML = ''; // Limpiar la lista de productos
        products.forEach(product => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `${product.qty} x ${product.name} - $${(product.qty * product.price).toFixed(2)}`;
            productsList.appendChild(listItem);
        });
    }
</script>

<script src="./js/all.min.js"></script>
<script src="./js/fontawesome.min.js"></script>
<!-- <script src="./js/bootstrap.min.js"></script> -->
 <script src="./js/bootstrap.bundle.js"></script>
 <script src="./js/pedidos.js"></script>
</body>
</html>
