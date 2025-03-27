<?php
define("ruta", 'http://localhost/cass_express_delivery/admin');
?>

<aside class="sidebar">
        <div class="text-center mb-4">
        <img src="../img/logo.jpg" alt="Logo" width="40" height="40" class="me-2" style="border-radius: 50%;">

            <h4>Cassey Express</h4>
        </div>
        <nav>
            <a href="<?php echo ruta?>/dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
            <a href="<?php echo ruta?>/productos.php"><i class="fas fa-utensils"></i> Productos</a>
            <a href="<?php echo ruta?>/categorias.php"><i class="fas fa-list"></i> Categorías</a>
            <a href="<?php echo ruta?>/pedidos.php"><i class="fas fa-shopping-cart"></i> Pedidos</a>
            <a href="<?php echo ruta?>/ajustes.php"><i class="fas fa-cog"></i> Ajustes</a>
        </nav>
        <div class="mt-5 text-center">
            <img src="../img/cassey.jpg" alt="Admin" class="img-fluid rounded-circle" style="width: 65px; height: 65px;">
            <h5>Admin</h5>
        </div>
    </aside>