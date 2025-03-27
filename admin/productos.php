<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Cassey Express</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>

<?php
include ('./componenetes/aside.php');
?>
<div class="main-content">
<div class="d-flex justify-content-between align-items-center mb-3">
    <span id="category-name" class="fw-bold fs-4">Productos</span>
    <div class="search-bar">
        <input type="text" class="form-control" placeholder="Buscar...">
    </div>
</div>

<section class="container py-1 d-flex flex-column justify-content-center">
    <h2 class="text-center mb-3 fs-5">Categorías</h2>
    <div id="btn_categorias" class="d-flex justify-content-center gap-2">
        
    </div>
</section>
<h4 class="d-flex justify-content-between">
    <span><i class="fas fa-box"></i> Productos</span>
    <!-- Botón para abrir el modal de agregar nueva categoría -->
    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="fas fa-plus"></i> 
    </button>
</h4>

<!-- Donde se cargan los productos --> 
<div id="cajaProductos" class="scrollable-products row">
            <p class="text-center">Selecciona una categoria para ver sus productos </p>
         
        </div>






      
  



<!-- Modal para agregar nuevo producto -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Agregar Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_productos">
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Nombre del producto</label>
                            <input type="text" name="nombre_producto" class="form-control" id="category-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Precio</label>
                            <input type="number" name="precio_producto" class="form-control" id="category-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion_producto" class="form-control" id="category-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Categoria</label>
                            <select class="form-select" name="categoria_producto" id="categorias" required>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category-image" class="form-label">Imagen del producto</label>
                            <input type="file" name="imagen_producto" class="form-control" id="category-image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Modal para actualizar producto -->
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
                            <label for="update-category-name" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" id="update-category-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="update-category-image" class="form-label">Imagen del producto</label>
                            <input type="file" class="form-control" id="update-category-image" accept="image/*">
                        </div>
                        <div class="mb-3">
                        <label for="product-price" class="form-label">Precio</label>
                        <input type="text" class="form-control" id="product-price" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Función para abrir el modal de actualización
    function openUpdateModal(productId, productName, productPrice, productImage) {
        document.getElementById('update-product-name').value = productName;
        document.getElementById('update-product-price').value = productPrice;
        document.getElementById('update-product-image').value = productImage;
    }
</script>
<script src="./js/productos.js"></script>

</body>
</html>



