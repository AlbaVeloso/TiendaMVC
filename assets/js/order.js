fetch("http://localhost/tiendamvc/api/categories")
    .then(data => data.json())
    .then(datos => {
        datos.forEach(element => {
            let option = document.createElement("option");
            option.value = element.category_id;
            option.textContent = element.name;
            document.getElementById("category").appendChild(option);
        });
    })
    .catch(err => {
        console.log(err);
    })

fetch("http://localhost/tiendamvc/api/providers")
    .then(data => data.json())
    .then(datos => {
        datos.forEach(element => {
            let option = document.createElement("option");
            option.value = element.provider_id;
            option.textContent = element.name;
            document.getElementById("provider").appendChild(option);
        });
    })
    .catch(err => {
        console.log(err);
    })

fetch("http://localhost/tiendamvc/api/products")
    .then(data => data.json())
    .then(datos => {
        showproducts(datos);
    })
    .catch(err => {
        console.log(err);
    })

document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío normal del formulario

    // Crear un objeto FormData con los datos del formulario
    var formData = new FormData(this);

    // Realizar la solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/tiendamvc/order/create', true);  // Asegúrate de que esta URL sea correcta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Respuesta exitosa
                const response = JSON.parse(xhr.responseText);
                console.log(response);  // Mostrar la respuesta en la consola para depuración
                alert(response.message);  // Mostrar mensaje de éxito
                // Puedes redirigir al usuario o limpiar el formulario si es necesario
            } else {
                // Error
                console.log(xhr.responseText);  // Mostrar el error en la consola para depuración
                alert('Error al guardar la orden');
            }
        }
    };
    
    xhr.send(formData); // Enviar los datos del formulario
});

function showProducts(products) {
    let tbody = document.getElementById("products");
    tbody.innerHTML = "";
    products.forEach(product => {
        let tr = document.createElement("tr");
        let td = document.createElement("td");
        td.textContent = product.product_id;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = product.name;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = product.description;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = product.category.name;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = product.provider.name;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = product.stock;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = product.price;
        tr.appendChild(td);
        tbody.appendChild(tr);
    });
}