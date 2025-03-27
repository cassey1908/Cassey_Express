//funcion traer categorias
function traerCategorias(){
    //creamos la variable de FormData
    let formData = new FormData();
    //agregamos la accion a realizar
    formData.append('accion','traerCategorias');
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //abrimos la petición con XMLHttpRequest
    xhr.open('POST','./php/traerCategorias.php',true);
    //ponemos al XMLHttpRequest a la escucha de un evento
    xhr.addEventListener('load',function(){
        //verificamos si la respuesta es 200, cargamos la categoria con las respuestas del servidor
        if(xhr.status===200){
            //parseamos a json el resultado que nos viene del servidor
            let respuesta = JSON.parse(xhr.response);
            console.log(respuesta);
            
            //capturamos el div de los botones de las categorias
            let botonesCategorias = document.getElementById('btn_categorias');
            //limpiamos todos los datos que se encuentran en el div
            botonesCategorias.innerHTML='';
            //creamos un for para cargar las categorias dinamicamente
            for(let categoria of respuesta){
                //llamamos al div para inyectarle las categorias dinamicamente
                botonesCategorias.innerHTML += `
                 <button  onclick="traerProductos(${categoria.id})" class="btn  rounded-circle p-3 text-center" id="${categoria.id}" style="width: 120px; height: 120px;">
            <img src="./admin/img/${categoria.imagen}" class="img-fluid rounded-circle" alt="Pizza" style="width: 60px; height: 60px;">
            <p>${categoria.nombre}</p>
        </button>
                `
         
            }

        }

    });

    //enviamos la petición
    xhr.send(formData);
}

//llamamos a la función traerCategorias
traerCategorias();

//funcion traer productos
function traerProductos(id_categoria){
    //creamos la variabl formdata de la categoria
    let formData = new FormData();
    //creameos la variable xhrttprequest para hacer la petición
    let xhr = new XMLHttpRequest();
    //hacemos el append para caprurar la categoria 
    formData.append('accion','traerProductos');
    //agregamos la categoria a la variable formdata
    formData.append('id_categoria',id_categoria);
    //abrimos la peticion (indicandole la ruta)
    xhr.open('POST','./php/traerProductos.php',true);
    //escuchamos el evento load (xhr.addEventListener: espera la respuesta del servidor)
    xhr.addEventListener('load',function(){
        //almacenamos la respuesta en tipo json en una variable 
        
        let respuesta=JSON.parse(xhr.response);
        console.log(respuesta);
        //capturamos el div para mostrar los productos
        let productos= document.getElementById('contenedor_productos');
        //limpiamos el div
        productos.innerHTML='';
        //recorremos la respuesta con un for para mostrar los productos en la pag.publica
       if (respuesta.length>0){
        for(let producto of respuesta){
            productos.innerHTML += `
              <div class="card comidas">
                        <img src="./admin/img/${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                        <div class="card-body">
                            <h5 class="card-title">${producto.nombre}</h5>
                            <p class="card-text">${producto.descripcion}</p>
                            <p class="card-text">${producto.precio}</p>
                            <a onclick="agregarCarrito(${producto.id})" class="btn btn-primary">Añadir al carrito <i class="fas fa-cart-plus "></i></a>


                        </div>
                    </div>
            
            `
            
        }
       }else(
              productos.innerHTML = `<h3>No hay productos en esta categoria</h3>`
       )


        
    })
    xhr.send(formData);
    

}

//funcion agregar al carrito
function agregarCarrito(id_producto){
    //creamos la variable del id del cliente
    let id_cliente=document.getElementById("id_cliente").value;
    //creamos la variable de formdata
    let formData = new FormData();
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //agregamos la accion a realizar
    formData.append('accion','agregarCarrito');
    //agregamos el id del producto
    formData.append('id_producto',id_producto);
    //agregamos el id del cliente
    formData.append('id_cliente',id_cliente);
    //abrimos la petición
    xhr.open('POST','./php/agregarCarrito.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(){
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            let respuesta = xhr.response;
            console.log(respuesta);
            //llamamos a la función traerCarrito
            traerCarrito(id_cliente);
            if(respuesta==2){
            notificacionCarrito();

            //sweet alert de agregar al carrito
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Producto agregado al carrito',
                showConfirmButton: false,
                timer: 1500
              })
            }else if(respuesta==1){
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'El producto ya se encuentra en el carrito',
                    showConfirmButton: false,
                    timer: 1500
                  })
        }else if(respuesta==3){
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'No se puede agregar al carrito',
                showConfirmButton: false,
                timer: 1500
              })
        }
    }
    })
    //enviamos la petición
    xhr.send(formData);

   
    

}

//funcion traer carrito
function traerCarrito(id_cliente){
    //creamos la variable de formdata
    let formData = new FormData();
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //agregamos la accion a realizar
    formData.append('accion','traerCarrito');
    //agregamos el id del cliente
    formData.append('id_cliente',id_cliente);
    //abrimos la petición
    xhr.open('POST','./php/traerCarrito.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(e) {
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            //parseamos a json la respuesta del servidor
            let respuesta = JSON.parse(xhr.response);
            console.log(respuesta);
            //capturamos el div del carrito
            let carrito = document.getElementById('productosCarrito');
            //limpiamos el div
            carrito.innerHTML='';
            //creamos la variable total y la igualamos a cero
            let total=0;


            //aqui se recorren los productos del carrito
            //creamos un for para mostrar los productos del carrito
            for(let producto of respuesta){
                carrito.innerHTML += `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="./admin/img/${producto.imagen}" alt="Producto" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                            <div class="ms-3">
                                <h6 class="mb-0">${producto.nombre}</h6>
                                <small class="text-muted">Precio: ${producto.precio} Xaf</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-secondary btn-sm" onclick="actualizarCantidadCarrito(${producto.id_carrito}, ${parseInt(producto.cantidad) - 1})" ${producto.cantidad <= 1 ? 'disabled' : ''}>-</button>
                            <span class="mx-2 fw-bold">${producto.cantidad}</span>
                            <button class="btn btn-outline-secondary btn-sm" onclick="actualizarCantidadCarrito(${producto.id_carrito}, ${parseInt(producto.cantidad) + 1})">+</button>
                            <button onclick="eliminarProdcCarrito(${producto.id_carrito})" class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash"></i></button>
                        </div>
                    </li>`;


                //Total;
                let subtotal = parseFloat(producto.precio) * parseInt(producto.cantidad);
                
                total += subtotal;

                



                //boton + y - de cantidad de productos del carrito
                // capturamos a todos los boten que tengan el id "btnMas"
                let btn_mas = document.querySelectorAll("#btnMas");

                // como va traer array de botones, Iteramos  sobre cada botón con foreach
                //x cada boton generado le va asignar un boton y una posicion
                btn_mas.forEach((boton, index) => {
                    // y que le ponga al escucha de un evento click
                    boton.addEventListener('click', () => {
                        //luego capturamos a todos los span y le pasamos la posicion del boton del array
                        let cantidad = document.querySelectorAll("#cantidad")[index];

                        // cremos una variable para almacenar el valor actual 
                        //y covierte el contenido del texto en un numero entero 
                        //y si no hay nada le asigna 0
                        let valorActual = parseInt(cantidad.textContent) || 0;

                        // Incrementar el valor
                        cantidad.textContent = valorActual + 1;

                        
                    });
                });

                let btn_menos = document.querySelectorAll("#btnMenos");

                // Iterar sobre cada botón
                btn_menos.forEach((boton, index) => {
                    boton.addEventListener('click', () => {
                        // Seleccionar el elemento de cantidad correspondiente (usando data-index u otro método)
                        let cantidad = document.querySelectorAll("#cantidad")[index];

                        // Asegurarse de que el contenido de "cantidad" sea un número válido
                        let valorActual = parseInt(cantidad.textContent) || 0;

                        if (valorActual == 1) {
                            
                        }else{
                            // decrementar el valor
                            cantidad.textContent = valorActual - 1;

                        }

                        
                    });
                });
                
            }
            //capturamos el div del total
            let totalCarrito = document.getElementById('total_carrito');
            totalCarrito.innerHTML = `${total}`;

            //capturamos el id finalizar_compra
            let finalizar_compra = document.getElementById('finalizar_compra');
            //le ponemos al escucha de un evento
            finalizar_compra.addEventListener('click',function(){
                //capturamos el id del cliente
                let id_cliente=document.getElementById("id_cliente").value;
                
                //llamamos a la función finalizarCompra
                finalizarCompra(id_cliente,total,respuesta);
               
                
                

            });
            
        }
    });
    xhr.send(formData);
}
function actualizarCantidadCarrito(id_carrito, nuevaCantidad) {
    console.log(nuevaCantidad);
    
    // Crear FormData
    let formData = new FormData();
    formData.append('accion', 'actualizarCantidad');
    formData.append('id_carrito', id_carrito);
    formData.append('cantidad', nuevaCantidad);

    // Crear solicitud AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', './php/actualizarCarrito.php', true);
    xhr.addEventListener('load', function () {
        // Verificar si la solicitud fue exitosa
        if (xhr.status === 200) {
            
            // Volver a cargar el carrito para reflejar los cambios
            let id_cliente = document.getElementById("id_cliente").value;
            traerCarrito(id_cliente);
        }
    });

    // Enviar la solicitud
    xhr.send(formData);
}

//capturamos el boton ver carrito
let btn_carrito = document.getElementById('btn_carrito');
//le ponemos al escucha de un evento
btn_carrito.addEventListener('click',function(){
    //capturamos el id del cliente
    let id_cliente=document.getElementById("id_cliente").value;
    //llamamos a la función traerCarrito
    traerCarrito(id_cliente);
});
//notificacion total carrito
//capturamos el div del total con una nueva varriable
let totalCarrito = document.getElementById('notificacion_carrito');

function notificacionCarrito(){
    //creamos la variable de formdata
    let formData = new FormData();
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //campturamos el id del cliente 
    let id_cliente=document.getElementById("id_cliente").value;

    //agregamos la accion a realizar
    formData.append('accion','notificacionCarrito');
    //agregamos el id del cliente
    formData.append('id_cliente',id_cliente);
    //abrimos la petición
    xhr.open('POST','./php/traerCarrito.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(e) {
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            //convertimos la respuesta en un objeto JSON
            let respuesta = JSON.parse(xhr.response);

                totalCarrito.textContent = respuesta.total;
                
            

           
            
        }
    });
    //enviamos la solicitud
    xhr.send(formData);
}
//llamamos a la función notificacionCarrito

notificacionCarrito();



//funcion eliminar producto del carrito

function eliminarProdcCarrito(id_carrito){
    //creamos la variable de formdata
    let formData = new FormData();
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //agregamos la accion a realizar
    formData.append('accion','eliminarCarrito');
    //agregamos el id del carrito
    formData.append('id_carrito',id_carrito);
    //abrimos la petición
    xhr.open('POST','./php/eliminarCarrito.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(e) {
        //verificamos si la respuesta es 200
        if(xhr.status===200){
           if(xhr.response==1){
            //llamamos a la función traerCarrito
            traerCarrito(document.getElementById("id_cliente").value);
            notificacionCarrito();

            //sweet alert de eliminar producto del carrito
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Producto eliminado del carrito',
                showConfirmButton: false,
                timer: 1500
              })
        }else{
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'No se pudo eliminar el producto del carrito',
                showConfirmButton: false,
                timer: 1500
              })
        }
    }
    });
    //enviamos la petición
    xhr.send(formData);
 
}


//funcion finalizar compra
function finalizarCompra(id_cliente, total, respuesta) {
    //creamos la variable de formdata
    let formData = new FormData();
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //agregamos la accion a realizar
    formData.append('accion','finalizarCompra');
    //agregamos el id del cliente
    formData.append('id_cliente',id_cliente);
    //agregamos el total de la compra
    formData.append('total',total);
    //agregamos la respuesta (pasa la respuesta de json a texto)
    formData.append('respuesta',JSON.stringify(respuesta));
    //abrimos la petición
    xhr.open('POST','./php/finalizarCompra.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(e) {
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            console.log(xhr.response);
            //convertimos la respuesta en un objeto JSON
            let respuesta = JSON.parse(xhr.response);
            
            if(respuesta==1){
                //sweet alert de finalizar compra
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Compra realizada con exito',
                    text: 'Gracias por su compra',	
                    showConfirmButton: false,
                    timer: 1500
                  })
                  vaciarCarrito(id_cliente);
                  notificacionCarrito();
                  //llamamos a la función traerCarrito
                  traerCarrito(id_cliente);
                  cargarPedidosPerfil();
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'No se pudo realizar la compra',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
        }
    });
    //enviamos la petición
    xhr.send(formData);
}

//funcion para vaciar el carrito
function vaciarCarrito(id_cliente){
    //creamos la variable de formdata
    let formData = new FormData();
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //agregamos la accion a realizar
    formData.append('accion','vaciarCarrito');
    //agregamos el id del cliente
    formData.append('id_cliente',id_cliente);
    //abrimos la petición
    xhr.open('POST','./php/vaciarCarrito.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(e) {
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            //convertimos la respuesta en un objeto JSON
            let respuesta = JSON.parse(xhr.response);
            console.log(respuesta);
            //llamamos a la función traerCarrito
            traerCarrito(id_cliente);
            //llamamos a la función notificacionCarrito
            notificacionCarrito();
        }
    });
    //enviamos la petición
    xhr.send(formData);
}


//funcion para recorrer los pedidos del cliente
function cargarPedidosPerfil(){
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //abrimos la petición
    xhr.open('GET','./php/pedidos_perfil.php',true);
    //leemos la respuesta
    xhr.onload = function(){
        console.log(xhr.response);
        //convertimos la respuesta a json
        let respuesta = JSON.parse(xhr.response);
        //capturamos el div donde se mostrarán los pedidos
        let divPedidos = document.getElementById('tablaPedidos_perfil');
        //vaciamos los datos previos del div capturado 
        divPedidos.innerHTML = '';
        //mostramos los pedidos del cliente en el div
        for(let pedido of respuesta){
            divPedidos.innerHTML += `
            <tr>
                            <td>${pedido.id}</td>
                            <td>${pedido.total}</td>
                            <td>${pedido.estado}</td>
                            <td><button onclick="cargarDetallesPedido(${pedido.id})" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#orderDetailModal">Ver Detalle</button></td>
                        </tr>
        `; 
        }
    }
    //enviamos la petición
    xhr.send();
}

cargarPedidosPerfil();


//funcion cargar detalles de pedidos

function cargarDetallesPedido(id_pedido){
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //abrimos la petición
    xhr.open('GET','./php/detalles_pedido.php?id_pedido='+id_pedido,true);
    //leemos la respuesta
    xhr.onload = function(){
        console.log(xhr.response);
        //convertimos la respuesta a json
        let respuesta = JSON.parse(xhr.response);
        //capturamos el div donde se mostrarán los detalles del pedido
        let divDetallesPedido = document.getElementById('detallePedidos');
        let total = document.getElementById('total_pedido_detalle')
        //vaciamos los datos previos del div capturado 
        divDetallesPedido.innerHTML = '';
        //mostramos los detalles del pedido en el div
        for(let detalle of respuesta){
            let precioTotal = detalle.cantidad*detalle.precio;
            divDetallesPedido.innerHTML += `
            <tr>
                            <td>${detalle.nombre}</td>
                            <td>${detalle.cantidad}</td>
                            <td>${detalle.precio}</td>
                            <td>${precioTotal}</td>
                           
                        </tr>
        `; 
        total.textContent=` Total: ${detalle.total} XAF`
        }
    }
    //enviamos la petición
    xhr.send();
}













