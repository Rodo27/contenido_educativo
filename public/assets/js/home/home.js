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
        
        const response = await fetch(base_url+'contenidos', config);
        const result = await response.json();
        
        console.info(result.data); 

    } catch (error) {
        console.error('Error:', error);
    }
}




