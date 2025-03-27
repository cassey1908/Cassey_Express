// Capturamos el formulario
const form = document.getElementById('form_productos');

// Ponemos al formulario a escuchar el evento submit
form.addEventListener('submit', function(e) {
    // Evitamos el comportamiento predeterminado del formulario
    e.preventDefault();

    // Creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // Creamos la variable de FormData
    let formData = new FormData(form);
    //creamor una accion con formdata
    formData.append('accion','agregarProducto');

    // Abrimos la petición con XMLHttpRequest
    xhr.open('POST', './php/agregarProducto.php', true);

    // Ponemos al XMLHttpRequest a la escucha de un evento
    xhr.addEventListener('load', function() {
        // Verificamos si la respuesta es 200
        if (xhr.status === 200) {
            console.log(xhr.response);
            // Parseamos a JSON la respuesta que nos viene del servidor

            let respuesta = JSON.parse(xhr.response);

            // Verificamos si la respuesta es correcta
            if (respuesta == 1) {
                // Mostramos un mensaje de éxito
                Swal.fire(
                    'Correcto',
                    'Producto añadido con éxito',
                    'success'
                );
                // Reseteamos el formulario
                form.reset();
                // Recargamos los productos
                cargarProductos();
            } else {
                // Mostramos un mensaje de error
                Swal.fire(
                    'Error',
                    'Hubo un error al agregar el producto',
                    'error'
                );
            }
        }
    });

    // Enviamos la petición
    xhr.send(formData);
});

// Función cargar productos
function cargarProductos(id_categoria) {
    console.log(id_categoria);

    // Creamos la variable FormData
    let formData = new FormData();
    // Agregamos la acción a realizar
    formData.append('accion', 'cargarProductos');
    //creamos otro append para llamar al id
    formData.append('id_categoria',id_categoria);

    // Creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // Abrimos la petición con XMLHttpRequest
    xhr.open('POST', './php/agregarProducto.php', true);

    // Ponemos al XMLHttpRequest a la escucha de un evento
    xhr.addEventListener('load', function() {
        // Verificamos si la respuesta es 200
        if (xhr.status === 200) {
            let respuesta = JSON.parse(xhr.response);

            //verificamos si el Json no esta vacio
            if(respuesta.length>0){
                let listaProductos = document.getElementById('cajaProductos');
                listaProductos.innerHTML = '';
    
                // Iterar los productos de la respuesta del servidor con for
                for (let producto of respuesta) {
                    listaProductos.innerHTML += `
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="./img/${producto.imagen}" alt="Cheeseburger">
                            <h5>${producto.nombre}</h5>
                            <p class="card-text">Precio: $${producto.precio}</p>
                            <div class="d-flex justify-content-end">
                                <button onclick="actualizarProducto(${producto.id})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pizzas">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    `;
                }
            }else{
                let listaProductos = document.getElementById('cajaProductos');
                listaProductos.innerHTML = '<p>No hay productos para esta categoría</p>';
            }
        }
    });

    // Enviamos la petición
    xhr.send(formData);
}



// Función actualizar producto
function actualizarProducto(id) {
    console.log(id);
}

//funcion traer categorias
function traerCategorias(){
    //creamos la variable de FormData
    let formData = new FormData();
    //agregamos la accion a realizar
    formData.append('accion','traerCategorias');
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //abrimos la petición con XMLHttpRequest
    xhr.open('POST','./php/agregarProducto.php',true);
    //ponemos al XMLHttpRequest a la escucha de un evento
    xhr.addEventListener('load',function(){
        //verificamos si la respuesta es 200, cargamos la categoria con las respuestas del servidor
        if(xhr.status===200){
            //parseamos a json el resultado que nos viene del servidor
            let respuesta = JSON.parse(xhr.response);
            console.log(respuesta);
            //capturamos el select de categorias
            let selectCategorias = document.getElementById('categorias');
            //limpiamos todos los datos que se encuentran en el select
            selectCategorias.innerHTML = '';
            //iteramos las categorias de la respuesta del servidor con for
            for(let categoria of respuesta){
                selectCategorias.innerHTML += `
                <option value="${categoria.id}">${categoria.nombre}</option>
                `;
            } 
            //capturamos el div de los botones de las categorias
            let botonesCategorias = document.getElementById('btn_categorias');
            //limpiamos todos los datos que se encuentran en el div
            botonesCategorias.innerHTML='';
            //creamos un for para cargar las categorias dinamicamente
            for(let categoria of respuesta){
                //llamamos al div para inyectarle las categorias dinamicamente
                botonesCategorias.innerHTML += `
                 <button class="btn rounded-circle p-1 text-center" id="${categoria.id}" onclick="cargarProductos(${categoria.id})" style="width: 80px; height: 80px;">
            <img src="img/${categoria.imagen}" class="img-fluid rounded-circle" alt="Todos" style="width: 50px; height: 50px;">
        </button>
                `
            
            }

        }

    });

    //enviamos la petición
    xhr.send(formData);
}

//ejecutamos la función
traerCategorias();
