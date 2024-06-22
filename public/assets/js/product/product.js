document.addEventListener('DOMContentLoaded', function() {
    // Código a ejecutar cuando el DOM esté completamente cargado
    console.log('El DOM está listo');
    
    // Puedes llamar a tus funciones aquí
    fetchProductById(id);
});

async function fetchProductById(id) {
    if (isNaN(id)) {
        console.error('ID debe ser un número');
        return;
    }

    try {
        const response = await fetch(`${baseUrl}/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error('Error en la petición: ' + response.status);
        }

        const result = await response.json();
        console.log(result.data); // Aquí accedemos a los datos del producto específico
    } catch (error) {
        console.error('Error:', error);
    }
}