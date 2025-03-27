//capruramos el modal mediante su id
let formRegistro = document.getElementById('registro');
//ponemos el formulario al escucha de un evento 

formRegistro.addEventListener('submit', function(e) {
    //para evitar que se recarge la pagina al pulsar el submit
    e.preventDefault();
    //creamos la variable de FormData
    let formData = new FormData(formRegistro);
    //creamos la variable xmlhttprequest
    let xhr = new XMLHttpRequest();
    //abrimos la peticion de las sesiones
    xhr.open('POST','./php/sesiones.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(){
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            console.log(xhr.response);
            
            //parseamos la respuesta a json
            let respuesta = JSON.parse(xhr.response);
            //verificamos si la respuesta es correcta
            if(respuesta==1){
                //ya existe el correo
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El correo ya existe'
                })
               
            }else if (respuesta==2){ 
                //reistro exitoso
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Registro exitoso'
                })
                
            }else if (respuesta==3){
                //error al registrar
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar'
                })
            }else if(respuesta==4){
                //si las contraseñas no coinciden
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinciden'
                })
            
            }else if(respuesta==5){
                //datos incompletos
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Completa los datos'
                })
            }
        }
    });
    //enviamos la petición
    xhr.send(formData);
});

//campturamos el formulario de inicio mediante el id
let formInicio = document.getElementById('inicioSesion');
//ponemos el formulario al escucha de un evento
formInicio.addEventListener('submit', function(e) {
    //para evitar que se recarge la pagina al pulsar el submit
    e.preventDefault();
    //creamos la variable de FormData
    let formData = new FormData(formInicio);
    //creamos la variable xmlhttprequest
    let xhr = new XMLHttpRequest();
    //abrimos la peticion de las sesiones
    xhr.open('POST','./php/iniciodesesion.php',true);
    //escuchamos el evento load
    xhr.addEventListener('load',function(){
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            console.log(xhr.response);
            
            //parseamos la respuesta a json
            let respuesta = JSON.parse(xhr.response);
            //verificamos si la respuesta es correcta
            if(respuesta==1){
                //inicio de sesion correcto
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Inicio de sesion correcto',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
               
            }else if (respuesta==2){ 
                //contraseña incorrecta
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Contraseña incorrecta'
                })
                
            }else if (respuesta==3){
                //el correo no existe
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El correo no existe'
                })
           
            }
        }
    });
    //enviamos la petición
    xhr.send(formData);
   

});

