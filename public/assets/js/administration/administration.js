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
                            <td>${element.id_producto}</td>
                            <td><span class="link-style" style="cursor:pointer;" onclick="openModal(${element.id_producto});">${element.titulo}</span><td>
                            <td><img src="image source" class="img-fluid rounded-top" alt="image loading..."/>
                            </td>
                            
                            <td>
                                <button class="btn btn-info">Editar</button>
                                <button class="btn btn-danger">Borrar</button>
                            </td>
                        </tr>`;  
        });

        document.getElementById('tbody').innerHTML =  table;
         

    } catch (error) {
        console.error('Error:', error);
    }
}


async function fetchProduct(id_product) {

    let config = {
        method: 'GET',
        headers: {'Content-Type': 'application/json'}
    }

    let content = '';

    try {

        const response = await fetch(base_url+'contenidos/getProduct/'+id_product, config);
        const result = await response.json();
        
        console.info(result.data); 

        content = `
            <section class="content mt-3">
                <div>
                    <div class="container mt-1">
                        <div class="row justify-content-center">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h3>${result.data.titulo}</h3>
                                    </div>
                                    <img class="card-img-top img-thumbnail mx-auto d-block" src="${base_url+result.data.image_previa}" alt="Card image cap" style="max-width: 300px; max-height: 300px;">
                                    <div class="card-body">
                                        <h5 class="text-center"></h5>
                                        <p class="card-text">${result.data.contenido}</p>
                                        <a href="${base_url}" class="btn btn-primary">Regresar</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        
        
        `;

        document.getElementById('modal-body').innerHTML =  content;
         

    } catch (error) {
        console.error('Error:', error);
    }
}


function openModal(id_product) {
    
    event.preventDefault();
    
    console.info(id_product);
    fetchProduct(id_product);
    
    $('#showProductModal').modal('show');
}
