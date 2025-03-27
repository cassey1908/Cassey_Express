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
    <link rel="stylesheet" href="./css/sweetalert2.css">
</head>
<body>
    <?php
    include('./componenetes/aside.php');
    ?>
    <main class="content">
    <div class="container">
        <div class="top-bar">
            <div>
                <span id="category-name">Categorias</span>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Buscar...">
            </div>
            <!-- Botón para abrir el modal de agregar nueva categoría -->
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fas fa-plus"></i> 
            </button>
        </div>
        <h4 class="mb-4">Categorias <i class="fas fa-utensils"></i></h4>

        <!-- Contenedor con la clase scrollable-products para agregar el scroll -->
        <div  id="cajaCategorias" class="scrollable-products row">
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/pizzas/p.primavera.jpg" alt="Cheeseburger">
                    <h5>Pizzas</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pizzas">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/bocadillos/hamburguesa.jpeg" alt="Chicken-Deluxe">
                    <h5>Hamburguesas</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Hamburguesas">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/pasta/es.carbonara.jpg" alt="Hamburger">
                    <h5>Pasta</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pasta">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/bocadillos/b.de carne picante.jpg" alt="Hamburger">
                    <h5>Bocadillos</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Bocadillos">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/pasta/es.carbonara.jpg" alt="Hamburger">
                    <h5>Pasta</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pasta">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/pasta/es.carbonara.jpg" alt="Hamburger">
                    <h5>Pasta</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pasta">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/pasta/es.carbonara.jpg" alt="Hamburger">
                    <h5>Pasta</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pasta">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/pasta/es.carbonara.jpg" alt="Hamburger">
                    <h5>Pasta</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pasta">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</main>

  



    <!-- Modal para agregar nueva categoría -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Agregar Nueva Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_nuevaCategoria" method="POST"  enctype="multipart/form-data"> <!--multi:para recibir archivos, post:metodo de envio de form-->
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Nombre de la Categoría</label>
                            <input type="text" name="Nombre" class="form-control" id="category-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category-image" class="form-label">Imagen de la Categoría</label>
                            <input type="file" name="Imagen" class="form-control" id="category-image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para actualizar categoría -->
    <div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCategoryModalLabel">Actualizar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="update-category-name" class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="update-category-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="update-category-image" class="form-label">Imagen de la Categoría</label>
                            <input type="file" class="form-control" id="update-category-image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/all.min.js"></script>
    <script src="./js/fontawesome.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/categorias.js"></script>
    <script src="./js/sweetalert2.js"></script>
    
</body>
</html>




