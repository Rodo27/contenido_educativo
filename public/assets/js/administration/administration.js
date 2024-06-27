let table = '';


document.addEventListener('DOMContentLoaded', function() {
   
    console.info('DOM is ready!');
    fetchProducts();
});



// Función para servicio GET

async function fetchProducts() {

    let config = {
        method: 'GET',
        headers: {'Content-Type': 'application/json'}
    }

    try {

        const response = await fetch(base_url+'contenidos/listaContenidos', config);
        const result = await response.json();
        
        //console.info(result.data); 

        result.data.forEach(element => {
            table += `<tr>
                            <td class="align-middle">${element.id_producto}</td>
                            <td class="align-middle">
                                <span>${element.titulo}</span>
                            </td>
                            <td class="align-middle">
                                 <a href="${base_url+element.imagen_previa}" class="image-link" title="Haz clic para ampliar">
                                    <img src="${base_url+element.imagen_previa}" style="width:60px;" alt="Imagen a ampliar">
                                </a>
                            </td>
                            <td class="align-middle">
                                 <button class="btn btn-info" onclick="fetchProduct(${element.id_producto});">Editar</button>
                                <button class="btn btn-danger" onclick="deleteProducto(${element.id_producto});">Borrar</button>
                            </td>
                        </tr>`;  
        });

        document.getElementById('tbody').innerHTML =  table;

        document.getElementById('tbody').innerHTML =  table;
         
         $('.image-link').magnificPopup({
            type: 'image'
        });
         

    } catch (error) {
        console.error('Error:', error);
    }
}


function deleteProducto(id_producto){

    fetch(base_url+'contenidos/borrarContenido/'+id_producto)
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data);
        alert("Se ha borrado el registro!");
        setTimeout(function() {
            location.reload(0); 
        }, 2000);
    })
    .catch(error => {
        console.error('Error al enviar el formulario:', error);       
    });

}

async function fetchProduct(id_product) {


    let config = {
        method: 'GET',
        headers: {'Content-Type': 'application/json'}
    }

    // let content = '';

    try {

        const response = await fetch(base_url+'contenidos/getProduct/'+parseInt(id_product), config);
        const result = await response.json();
        
        console.info(result.data); 

        document.getElementById('id_producto').value = id_product 
        document.getElementById('titulo').value =  result.data.titulo;
        document.getElementById('palabrasClave').value =  result.data.palabras_clave;
        document.getElementById('areaConocimiento').value =  result.data.area_conocimiento;
        document.getElementById('tipoContenido').value =  result.data.tipo_contenido;
        
        console.log()
        tinymce.get('descripcion').setContent(result.data.descripcion);

        //document.getElementById('btnSave').innerHTML = '<i class="fas fa-check mr-2"></i>Editar';
    
        $('#formularioModal').modal('show');
        
         

    } catch (error) {
        console.error('Error:', error);
    }
}


document.getElementById("btnSave").addEventListener("click", function (e) {


    let formulario = document.getElementById("form");
    let ur = '';
    let action = '';
    const formData = new FormData();
    
    for (let i = 0; i < formulario.elements.length; i++) {
        const elemento = formulario.elements[i];
        
        if (elemento.id) {
            if (elemento.type === 'file' && elemento.files.length > 0) 
                formData.append(elemento.id, elemento.files[0]);
            else 
                formData.append(elemento.id, elemento.value);
        }
    }

    if(document.getElementById('id_producto').value != ''){
        url = 'contenidos/actualizarContenido/'        
        action = 'update';
    }   
    else{
        url = 'contenidos/nuevoContenido/'
        action = 'insert';
    }

    formData.append('descripcion', tinymce.get("descripcion").getContent());
    
    let config ={
        method: 'POST',
        body: formData
    }
    
    if(validarFormulario(action)){
        fetch(base_url+url, config)
        .then(response => response.json())
        .then(data => {
            console.log('Respuesta del servidor:', data);

            formulario.reset();
            tinymce.get('descripcion').setContent('');

            alert("Se ha guardado la información!");
            setTimeout(function() {
                location.reload(0); 
            }, 2000);
        })
        .catch(error => {
            console.error('Error al enviar el formulario:', error);
        
        });
    }
    
});


function validarFormulario(action) {

    let titulo = document.getElementById('titulo').value.trim();
    let palabrasClave = document.getElementById('palabrasClave').value.trim();
    let areaConocimiento = document.getElementById('areaConocimiento').value.trim();
    let tipoContenido = document.getElementById('tipoContenido').value.trim();
    let imagenPortada = document.getElementById('imagenPortada').value.trim();
    let imagenPrevia = document.getElementById('imagenPrevia').value.trim();
    let descripcion = document.getElementById('descripcion').value.trim();

    let regexTitulo = /^[a-zA-Z0-9.!?¿¡ ]{1,150}$/;
    let regexPalabrasClave = /^[a-zA-Z0-9.!?¿¡\/\- ]{1,200}$/;
    
    if (!regexTitulo.test(titulo)) {
        alert('El campo Título debe contener entre 1 y 150 caracteres válidos: letras, números, espacios, .!?¿¡');
        return false;
    }

    if (!regexPalabrasClave.test(palabrasClave)) {
        alert('El campo Palabras clave debe contener entre 1 y 200 caracteres válidos: letras, números, espacios, .!?¿¡/-');
        return false;
    }

    if (!(areaConocimiento.length >0 && areaConocimiento.length <= 10)) {
        alert('El campo Área de Conocimiento debe ser de máximo 10 carácteres.');
        return false;
    }

    if (!(tipoContenido)) {
        alert('El campo Tipo de Contenido debe ser de máximo 10 carácteres.');
        return false;
    }

    if(action !== 'update'){
        if (imagenPortada === '') {
            alert('Debe seleccionar una imagen de portada.');
            return false;
        }
    
        if (imagenPrevia === '') {
            alert('Debe seleccionar una imagen previa (thumbnail).');
            return false;
        }
    }

    return true;
}