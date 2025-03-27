

function cargarProducto(){
    let formData = new FormData();
    let xhr = new XMLHttpRequest();
    formData.append('accion', 'traer');
    xhr.open('POST', './php/pedidos.php', true);

    xhr.addEventListener('load', ()=>{
        let pedidos = document.getElementById('tablaPedidos')
        let respuesta = JSON.parse(xhr.response);
        console.log(respuesta);
     

        let clase
        pedidos.innerHTML = '';
        for(let pedido of respuesta){

            if(pedido.estado == 'Pendiente'){
                clase = 'bg-primary';
            }else if(pedido.estado == 'Entregado'){
                clase = 'bg-success';
            }else if(pedido.estado == 'Cancelado'){
                clase = 'bg-danger';
            }
            pedidos.innerHTML+=`
             <tr>
                    <td>${pedido.nombre}</td>
                    <td>${pedido.direccion}</td>
                    <td>${pedido.fecha_pedido}</td>
                    <td>${pedido.total}</td>
                    <td><span class="badge ${clase}">${pedido.estado}</span></td>
                    <td>
                        
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Accion
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-success" onclick="actualizarEstado('${pedido.id}','Entregado')" href="#"><i class="fa fa-solid fa-check-circle"></i> Validar</a></li>

                                <li><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-circle-xmark"></i> Denegar</a></li>


                                <li><a data-bs-toggle="modal" data-bs-target="#orderModal" onclick="showOrderDetails('Juan Pérez', 'Calle Ficticia 123', [{name: 'Cheeseburger', qty: 2, price: 3.00}, {name: 'Papas fritas', qty: 1, price: 1.75}], '12/03/2025', '$7.75')" class="dropdown-item text-warning" href="#"><i class="fa fa-regular fa-eye"></i>Ver detalle</a></li>
                                
                            </ul>
                        </div>
                    </td>
                </tr>
            
            `
            
        }
        
    });

    xhr.send(formData);
    
}

cargarProducto();


function actualizarEstado(id_pedido, estado) {
    let formData = new FormData();
    let xhr = new XMLHttpRequest();
    formData.append('accion', 'actualizar');
    formData.append('id', id_pedido);
    formData.append('estado', estado);
    xhr.open('POST', './php/pedidos.php', true);

   xhr.addEventListener('load', ()=>{
    console.log(xhr.response);
    
     cargarProducto();
     alert('Pedido actualizado con éxito');
   })

   xhr.send(formData);
    
}

//function ver detalle de pedido

function verDetallePed(nombre, direccion, productos, fecha_entrega, total) {
    let modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
        <h4>Pedido de ${nombre}</h4>
        <p>Dirección: ${direccion}</p>
        <p>Productos:</p>
        <ul>
            ${productos.map(p => `<li>${p.name} - Cant: ${p.qty}, Precio: $${p.price}</li>`).join('')}
        </ul>
        <p>Fecha de entrega: ${fecha_entrega}</p>
        <p>Total: $${total}</p>
    `;
}
