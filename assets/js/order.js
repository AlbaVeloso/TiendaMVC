


document.getElementById('form').addEventListener('submit', function (event) {
    event.preventDefault(); // Evitar el envío normal del formulario

    // Crear un objeto FormData con los datos del formulario
    var formData = new FormData(this);
    //enviar datos al servidor usando fetch al metodo create de orderController
    fetch("http://localhost/tiendamvc/order/create", {
        method: 'POST',
        body: formData
    })
        .then(data => data.json())
        .then(datos => {
            document.getElementById('form').reset();
            alert("Orden creada exitosamente");
        })
        .catch(err => {
            console.log(err);
        })

});



document.addEventListener('DOMContentLoaded', function () {
    const addProductButton = document.getElementById('add-product-button');
    const productsContainer = document.getElementById('products');

    // Verificar que los elementos existen
    if (addProductButton && productsContainer) {
        addProductButton.addEventListener('click', function () {
            // Obtén el último producto agregado
            const lastProduct = productsContainer.querySelector('.product:last-child');

            // Extrae el índice del último producto
            const lastIndex = parseInt(lastProduct.getAttribute('data-index'));

            // Incrementa el índice para el nuevo producto
            const newIndex = lastIndex + 1;

            // Clona el último producto
            const newProduct = lastProduct.cloneNode(true);

            // Actualiza el índice del producto clonado
            newProduct.setAttribute('data-index', newIndex);

            // Actualiza los nombres de los campos en el producto clonado
            const selectsAndInputs = newProduct.querySelectorAll('select, input');
            selectsAndInputs.forEach(function (element) {
                const name = element.name;
                const newName = name.replace(`[${lastIndex}]`, `[${newIndex}]`);
                element.name = newName;
                if (element.tagName === 'SELECT') {
                    element.value = ''; // Restablece el valor del select
                } else {
                    element.value = ''; // Restablece el valor de los inputs
                }
            });
            //agregar btn eliminar linea si no lo tiene
            if (!newProduct.querySelector('button')) {
                deleteButton = document.createElement('button');
                deleteButton.textContent = 'Eliminar';
                deleteButton.type = 'button';   
                newProduct.appendChild(deleteButton);
            }else{
                deleteButton = newProduct.querySelector('button');
            }
            deleteButton.addEventListener('click', function () {
                newProduct.remove();
            });
           

            // Agrega el nuevo producto al contenedor de productos
            productsContainer.appendChild(newProduct);
        });
    } else {
        console.log('No se encontraron los elementos necesarios');
    }
});


//add-product-button añade una nueva linea para seleccionar un producto igual a las que tengo en new_order.php
//#order_products es el id del contenedor de productos en new_order.php


