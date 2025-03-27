<?php
   session_start();
   
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Comida</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/sweetalert2.css">
</head>
<body style="background-color: #f0e9df;">
    <!-- creamos un inpud para capturar el id del cliente k viene de la bbdd que hemos almacenado en la sesion-->
    <input type="text" id="id_cliente" value="<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}else{ echo "";}?>" hidden>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top ">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-primary" href="./admin/dashboard.php">
                <img src="img/logo.jpg" alt="Logo" width="40" class="me-2">
                Cassey Express
            </a>
            
    

           

            <!-- Botones -->
            <div class="ms-3">
                <div class="<?php if(isset($_SESSION['id'])){echo "d-none";}else{ echo "d-block";}?>">
                <button class="btn btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
                <button class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarte</button>

                </div>

                

    
    
                <div class="<?php if(isset($_SESSION['id'])){echo "d-block";}else{ echo "d-none";}?>">
                    <button class="btn  rounded-circle p-2 " data-bs-toggle="modal" data-bs-target="#profileModal">
                        <img src="img/perfil.png" alt="Perfil" width="30">
                    </button>
                      <!-- <a href="pedidos.html" class="btn btn-success rounded-pill px-3">Hacer Pedido</a> -->
                        <a id="btn_carrito" class="btn btn-primary position-relative btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="staticBackdrop">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="notificacion_carrito" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                0 </span>
                                <span class="visually-hidden">unread messages</span>
                                </span>
                        </a>

                </div>


              

            </div>
        </div>
    </nav>
    

    
    
    

    <!-- Modal de Inicio de Sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h6 class="modal-title" id="loginModalLabel">Iniciar Sesión</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="inicioSesion">
                        <div class="mb-2">
                            <input type="email" name="correo" class="form-control rounded-pill" id="loginEmail" placeholder="Correo Electrónico">
                        </div>
                        
                        
                        <div class="mb-2">
                            <input type="password" name="contraseña" class="form-control rounded-pill" id="loginPassword" placeholder="Contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Registro -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h6 class="modal-title" id="registerModalLabel">Registrarse</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="registro">
                        <div class="mb-2">
                            <input type="text" name="Nombre" class="form-control rounded-pill" id="registerName" placeholder="Nombre Completo">
                        </div>
                        <div class="mb-2">
                            <input type="email"  name="Correo"class="form-control rounded-pill" id="registerEmail" placeholder="Correo Electrónico">
                        </div>
                        
                        <div class="mb-2">
                            <input type="tel" name="Tel" class="form-control rounded-pill" id="registerPhone" placeholder="Número de Teléfono">
                        </div>
                        
                        <div class="mb-2">
                            <input type="text" name="Dirección" class="form-control rounded-pill" id="registerAddress" placeholder="Dirección">
                        </div>
                        <div class="mb-2">
                            <input type="password" name="contraseña" class="form-control rounded-pill" id="registerPassword" placeholder="Contraseña">
                        </div>
                        <div class="mb-2">
                            <input type="password" name="confirmar_contraseña" class="form-control rounded-pill" id="registerConfirmPassword" placeholder="Confirmar Contraseña">
                        </div>
                        <button type="submit" class="btn btn-success w-100 rounded-pill">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      
     <!-- Banner (Carrusel) -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/flat3.jpg" class="d-block w-100" alt="Banner 1" style="height: 350px; object-fit: cover;">
            <div class="cortina">
                <h1 class="text-white
                text-center">¡El menú perfecto está a solo un pedido. 🍽️Ordena tu comida favorita 📲!</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./img/italian.jpg" class="d-block w-100" alt="Banner 2" style="height: 350px; object-fit: cover;">
            <div class="cortina">
                <h1 class="text-white
                text-center">Tú decides qué comer, nosotros lo llevamos. 🚴‍♂️🥡</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./img/img-img.jpg" class="d-block w-100" alt="Banner 3" style="height: 350px; object-fit: cover;">
            <div class="cortina">
                <h1 class="text-white
                text-center">Del antojo a tu mesa en tiempo récord. ⏳</h1>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente </span>
    </button>
</div>


    <!-- Sección de Categorías -->
<section id="categorias" class="container py-5 d-flex flex-column justify-content-center align-items-center" >
    <h2 class="text-center mb-4">Categorías</h2>
    <div id="btn_categorias" class="d-flex justify-content-center gap-4 mb-5">
        <!-- Las categorías se cargarán dinámicamente aquí -->
    </div>
     <!-- Barra de búsqueda -->
     <form class="d-flex col-7 mb-3 w-70">
    <input class="form-control rounded-pill" type="search" placeholder="Buscar..." aria-label="Buscar">
</form>


    <!-- Productos -->
    <div class="scrolling-products container" id="productsSection">
        <div class="products-container container d-flex gap-4" id="contenedor_productos">
            <!-- Los productos se cargarán dinámicamente aquí -->
             <p class="text-center h6"><i class="text-primary fa fa-regular fa-mouse-pointer"></i> Seleccione una categoria para ver los productos</p>
        </div>
    </div>
</section>


   <!-- Sección Cómo Hacer Pedido -->
<section class="container py-5" id="pedido">
    <h2 class="text-center mb-4">¿Cómo Hacer un Pedido?</h2>
    <div class="row">
        <!-- Primer detalle -->
        <div class="col-md-4 text-center mb-4">
            <div class="icon-box">
                <i class="fas fa-utensils fa-3x text-primary mb-3"></i> <!-- Ícono de comida -->
                <h4>Explora el Menú</h4>
                <p>Explora las categorías y selecciona lo que deseas ordenar.</p>
            </div>
        </div>

        <!-- Segundo detalle -->
        <div class="col-md-4 text-center mb-4">
            <div class="icon-box">
                <i class="fas fa-cart-plus fa-3x text-success mb-3"></i> <!-- Ícono de añadir al carrito -->
                <h4>Añade al Carrito</h4>
                <p>Agrega los productos a tu carrito con un solo clic.</p>
            </div>
        </div>

        <!-- Tercer detalle -->
        <div class="col-md-4 text-center mb-4">
            <div class="icon-box">
                <i class="fas fa-credit-card fa-3x text-warning mb-3"></i> <!-- Ícono de pago -->
                <h4>Paga tu Pedido</h4>
                <p>Realiza el pago de forma segura utilizando tu método preferido.</p>
            </div>
        </div>
    </div>
</section>


    <!-- Quiénes Somos (Imagen a la izquierda y texto a la derecha, imagen más ancha) -->
<section class="container py-5" id="nosotros">
    <h2 class="text-center mb-4">¿Quiénes Somos?</h2>

    <div class="row justify-content-center align-items-center">
        <!-- Imagen a la izquierda, con mayor ancho -->
        <div class="col-md-5 mb-4">
            <img src="img/somos.jpg" class="img-fluid rounded" alt="Nuestro equipo" style="height: 350px; width: 100%; object-fit: cover;">
        </div>

        <!-- Información de la empresa a la derecha -->
        <div class="col-md-7">
            <p><strong>Nuestra Misión:</strong> Somos un equipo dedicado a ofrecer la mejor experiencia gastronómica a domicilio, llevando deliciosos platillos hasta la comodidad de tu hogar.</p>
            <p><strong>Nuestra Visión:</strong> Ser la empresa líder en servicio a domicilio, comprometidos con la calidad, la satisfacción del cliente y la innovación constante en el sector gastronómico.</p>
            <p><strong>Valores:</strong> Calidad, compromiso, puntualidad y pasión por la cocina.</p>
        </div>
    </div>
</section>


    <!-- Nuestros Repartidores -->
<section class="container py-5" id="repartidores">
    <h2 class="text-center mb-4">Nuestros Repartidores</h2>
    <div class="row d-flex justify-content-between gap-3x">
        <div class="col-11 col-lg-3 mx-3">
            <div class="card" style="height: 300px;">
                <img src="img/repar4.jpg" class="card-img-top" alt="Repartidor 1">
                <div class="card-body">
                    <p class="card-text">Pedro, repartidor con más de 5 años de experiencia.</p>
                </div>
            </div>
        </div>
        <div class="col-11 col-lg-3 mx-3">
            <div class="card" style="height: 300px;">
                <img src="img/repar2.jpg" class="card-img-top" alt="Repartidor 2">
                <div class="card-body">
                    <p class="card-text">Ana, siempre puntual y con una sonrisa.</p>
                </div>
            </div>
        </div>
        <div class="col-11 col-lg-3 mx-3">
            <div class="card" style="height: 300px;">
                <img src="img/repar3.jpg" class="card-img-top" alt="Repartidor 3">
                <div class="card-body">
                    <p class="card-text">Carlos, siempre listo para tu pedido.</p>
                </div>
            </div>
        </div>
    </div>
</section>


   <!-- Contactos y Dirección (Imagen a la derecha y dirección y contacto a la izquierda) -->
<section class="container py-5" id="contactoInfo">
    <h2 class="text-center mb-4">Contacto y Dirección</h2>
    <div class="row justify-content-center align-items-center">
        <!-- Información de la dirección y contacto a la izquierda -->
        <div class="col-md-7">
            <p><i class="fa fa-map-marker-alt text-primary"></i> <strong>Dirección:</strong> Djibloho - Ciudad de la Paz</p>


            <p><i class="fa fa-phone"></i> <strong>Teléfono:</strong> +240 222 406 982</p>

            <p><i class="fa fa-mobile-alt"></i> <strong>¡Llámanos ahora!</strong> Estamos disponibles para resolver cualquier duda o tomar tu pedido. ¡No esperes más!</p>

        </div>

        <!-- Imagen a la derecha -->
        <div class="col-md-5 mb-4">
            <img src="./img/contacto.jpg" class="img-fluid rounded" alt="Dirección" style="height: 300px; width: 100%; object-fit: cover;">
        </div>
    </div>
</section>

<!-- Modal para mostrar perfil -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="profileModalLabel">Mi Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center">
                    
                    <div class="ms-3" id="perfilModal">
                        <h5 id="perfilNombre">Nombre de Usuario</h5>
                        <p><strong>Correo:</strong> <span id="perfilEmail">usuario@ejemplo.com</span></p>
                        <p><strong>Dirección:</strong> <span id="perfilDireccion">Calle Ficticia, 123</span></p>
                        <p><strong>Teléfono:</strong> <span id="PerfilTel">+240 222 406 982</span></p>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-secondary " data-bs-toggle="modal" data-bs-target="#editProfileModal">Cambiar Información</button>
                    <a href="./php/cerrarSesion.php" class="btn btn-danger btn-sm">Cerrar sesion</a>
                </div>
                


                <!-- Tabla de pedidos -->
                <h5 class="mt-4">Mis Pedidos</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Precio Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaPedidos_perfil">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar perfil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="editProfileModalLabel">Editar Información</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center">
                    
                    <div class="ms-3 w-100">
                        <form id="editProfileForm">
                            <div class="mb-3">
                                <label for="editName" name="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editNombre" value="Nombre de Usuario">
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" name="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="editEmail" value="usuario@ejemplo.com">
                            </div>
                            <div class="mb-3">
                                <label for="editAddress" name="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="editDireccion" value="Calle Ficticia, 123">
                            </div>
                            <div class="mb-3">
                                <label for="editPhone" name="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="editTel" value="+240 222 406 982">
                            </div>
                            <button id="guardar" type="submit" class="btn btn-primary w-100 mt-3">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para ver detalles del pedido -->
<div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="orderDetailModalLabel">Detalles del Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Precio Total</th>
                        </tr>
                    </thead>
                    <tbody id="detallePedidos">
                        <tr>
                            <td>Pizza Margarita</td>
                            <td>2</td>
                            <td>$10.00</td>
                            <td>$20.00</td>
                        </tr>
                        <tr>
                            <td>Hamburguesa Clásica</td>
                            <td>1</td>
                            <td>$10.00</td>
                            <td>$10.00</td>
                        </tr>
                    </tbody>
                </table>
                <h5 class="text-end" id="total_pedido_detalle">Total: $30.00</h5>
                
            </div>
        </div>
    </div>
</div>


    <!-- Footer -->
    <footer class="bg-light text-center py-4">
        <p>&copy; 2025 Pedido Express. Todos los derechos reservados.</p>
    </footer>
    
      
    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
        <div class="offcanvas-header bg-primary text-white">
            <h5 class="offcanvas-title" id="cartOffcanvasLabel">Carrito de Compras</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group mb-3" id="productosCarrito">
                <!-- Ejemplo de un producto en el carrito -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="./img/pizzas/p.musarela.jpg" alt="Producto" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                        <div class="ms-3">
                            <h6 class="mb-0">Pizza Margarita</h6>
                            <small class="text-muted">Precio: $10.00</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-outline-secondary btn-sm" onclick="decrementQuantity(this)">-</button>
                        <span class="mx-2 fw-bold">1</span>
                        <button class="btn btn-outline-secondary btn-sm" onclick="incrementQuantity(this)">+</button>
                        <button class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash"></i></button>
                    </div>
                </li>
            </ul>
            
            <h5 class="text-end">Total: <span id="total_carrito">0.00</span> XAF</h5>
            <button id="finalizar_compra" class="btn btn-success w-100 mt-3">Finalizar Compra</button>
        </div>

        
    </div>
   
    <script src="./js/all.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/fontawesome.min.js"></script>
    <script src="./js/productos.js"></script>
    <script src="./js/sweetalert2.js"></script>
    <script src="./js/sesiones.js"></script>
    <script src="./js/perfil.js"></script>



    

</body>
</html>






