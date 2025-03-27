//funcion para cargar datos del cliente
function cargarDatosCliente(){
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //abrimos la petición
    xhr.open('GET','./php/perfil.php',true);
    //leemos la respuesta
    xhr.onload = function(){
        
        //convertimos la respuesta a json
        let respuesta = JSON.parse(xhr.response);
        //capturamos el div donde se mostrarán los datos
        let divDatos = document.getElementById('perfilModal');
        //vaciamos los datos previos del div capturado 
        divDatos.innerHTML = '';
        //mostramos los datos del cliente en el div
        for(let dato of respuesta){
            divDatos.innerHTML += `
           <h5 id="perfilNombre">${dato.nombre}</h5>
                        <p><strong>Correo:</strong> <span id="perfilEmail">${dato.email}</span></p>
                        <p><strong>Dirección:</strong> <span id="perfilDireccion">${dato.direccion}</span></p>
                        <p><strong>Teléfono:</strong> <span id="PerfilTel">${dato.telefono}</span></p>
        `; 
        }

       
    }
    //enviamos la petición
    xhr.send();
}
cargarDatosCliente();


//funcion traer datos del cliente
function traerDatosCliente(){
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //abrimos la petición
    xhr.open('GET','./php/perfil.php',true);
    //leemos la respuesta
    xhr.onload = function(){
        //convertimos la respuesta a json
        let respuesta = JSON.parse(xhr.response);
        //capturamos los inputs del modal
        let nombre = document.getElementById('editNombre');
        let email = document.getElementById('editEmail');
        let direccion = document.getElementById('editDireccion');
        let telefono = document.getElementById('editTel');
        //mostramos los datos del cliente en los inputs
        for(let dato of respuesta){
            nombre.value = dato.nombre;
            email.value = dato.email;
            direccion.value = dato.direccion;
            telefono.value = dato.telefono;
        }
    }
    //enviamos la petición
    xhr.send();
}
traerDatosCliente();


//funcion para actualizar los datos del cliente
function actualizarDatosCliente(){
    //capturamos los datos del cliente
    let nombre = document.getElementById('editNombre').value
    let email = document.getElementById('editEmail').value
    let direccion = document.getElementById('editDireccion').value
    let telefono = document.getElementById('editTel').value
    //creamos la variable de FormData
    let formData = new FormData();
    //creamos la variable de XMLHttpRequest
    let xhr = new XMLHttpRequest();
    //agregamos la accion a realizar
    formData.append('accion','actualizar');
    //agregamos los datos del cliente
    formData.append('nombre',nombre);
    formData.append('correo',email);
    formData.append('direccion',direccion);
    formData.append('telefono',telefono);
    //abrimos la petición
    xhr.open('POST','./php/perfil.php',true);
    //leemos la respuesta
    xhr.onload = function(){
        //swet alert
        Swal.fire({
            title: 'Datos actualizados',
            text: 'Los datos se han actualizado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        })
        
        
        cargarDatosCliente();
    }
    //enviamos la petición
    xhr.send(formData);
}


            //capturamos el id finalizar_compra
            let guardarCambios = document.getElementById('guardar');
            //le ponemos al escucha de un evento
            guardarCambios.addEventListener('click',function(e){
                //prevenimos la acción por defecto
                e.preventDefault();
                //llamamos a la funcion actualizarDatosCliente
                actualizarDatosCliente();
            });


