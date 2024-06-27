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
                                <button class="btn btn-danger">Borrar</button>
                            </td>
                        </tr>`;  
        });

        document.getElementById('tbody').innerHTML =  table;

        document.getElementById('tbody').innerHTML =  table;
         
         // Inicialización de Magnific Popup después de agregar dinámicamente las imágenes
         $('.image-link').magnificPopup({
            type: 'image'
        });
         

    } catch (error) {
        console.error('Error:', error);
    }
}


async function fetchProduct(id_product) {

    let config = {
        method: 'GET',
        headers: {'Content-Type': 'application/json'}
    }

    // let content = '';

    try {

        const response = await fetch(base_url+'contenidos/getProduct/'+id_product, config);
        const result = await response.json();
        
        console.info(result.data); 


        document.getElementById('titulo').value =  result.data.titulo;
        document.getElementById('palabrasClave').value =  result.data.palabras_clave;
        document.getElementById('areaConocimiento').value =  result.data.area_conocimiento;
        document.getElementById('tipoContenido').value =  result.data.tipo_contenido;
        
        console.log()
        tinymce.get('descripcion').setContent(result.data.descripcion);


        $('#formularioModal').modal('show'); 

    } catch (error) {
        console.error('Error:', error);
    }
}


// function openModal(id_product) {
    
//     event.preventDefault();
    
//     console.info(id_product);
//     fetchProduct(id_product);
    
//     $('#showProductModal').modal('show');
// }


document.getElementById("btnSave").addEventListener("click", function (e) {
    
    let formulario = document.getElementById("form");
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

    console.log( tinymce.get("descripcion").getContent());

    formData.append('descripcion', tinymce.get("descripcion").getContent());
    
    let config ={
        method: 'POST',
        body: formData
    }
    
    fetch(base_url+'contenidos/nuevoContenido/', config)
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data);
    })
    .catch(error => {
        console.error('Error al enviar el formulario:', error);
       
    });
});
