//caturamos al formulario
const form=document.getElementById('form_nuevaCategoria');
//ponemos al formulario a la escuchar el evento submit
form.addEventListener('submit',function(e){
    //evitamos el comportamiento predeterminado del formulario
    e.preventDefault();
   //creamos la var de xmlhttprequest
   let xhr=new XMLHttpRequest();
   //creamos la var de formData
    let formData=new FormData(form);

    // abrimos la petición con xmlhttprequest
    xhr.open('POST','./php/agregarCategorias.php',true);
    //ponemos al xmlhttprequest a la escucha de un evento
    xhr.addEventListener('load',function(){
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            console.log(xhr.response);
            
            let respuesta=JSON.parse(xhr.response);
            //verificamos si la respuesta es correcta
                if(respuesta==1){ 
                    cargarCategorias();
                    //mostramos un mensaje de exito
                    Swal.fire(
                        'Correcto',
                        'Categoria añadida con exito',
                        'success'
                    )
                    //reseteamos el formulario
                    form.reset();
                }else{
                    //mostramos un mensaje de error
                    Swal.fire(
                        'Error',
                        'Hubo un error al agregar la categoria',
                        'error'
                    )
                }
        }
    })
    //enviamos la petición
    xhr.send(formData);
    

})

//funcion cargar categorias
function cargarCategorias(){
    //creamos la var formdata
    let formData = new FormData();
    //agregamos la accion a realizar
    formData.append('accion','cargarCategorias');
    //creamos la var de xmlhttprequest
    let xhr=new XMLHttpRequest();
    // abrimos la petición con xmlhttprequest
    xhr.open('POST','./php/agregarCategorias.php',true);
    //ponemos al xmlhttprequest a la escucha de un evento
    xhr.addEventListener('load',function(){
        //verificamos si la respuesta es 200
        if(xhr.status===200){
            console.log(xhr.response);
            let respuesta=JSON.parse(xhr.response);
            console.log(respuesta);
            let listaCategorias=document.getElementById('cajaCategorias');
            listaCategorias.innerHTML='';
            //iterar los productos de la respuesta del servidor con for
            for(let categoria of respuesta){
                listaCategorias.innerHTML+=`
                 <div class="col-md-4">
                <div class="product-card">
                    <img src="./img/${categoria.imagen}" alt="Cheeseburger">
                    <h5>${categoria.nombre}</h5>
                    <div class="d-flex justify-content-end">
                        <button onclick="actualizarCategoria(${categoria.id})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-category="Pizzas">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
                `
            }
            
        }
    })
    //enviamos la petición
    xhr.send(formData);

}
//ejecutamos la funcion
cargarCategorias();

//funcion actualizar categoria
function actualizarCategoria(id){
    console.log(id);


}