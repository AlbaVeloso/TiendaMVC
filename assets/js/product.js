fetch("http://localhost/TiendaMVC/api/categories")
.then(data=>data.json())
.then(datos=>{
    datos.forEach(element => {
        let option=document.createElement("option");
        option.value=element.category_id;
        option.textContent=element.name;
        document.getElementById("category").appendChild(option);


    });
})
.catch(err=>{
    console.log(err);
})

fetch("http://localhost/TiendaMVC/api/providers")
.then(data=>data.json())
.then(datos=>{
    datos.forEach(element => {
        let option=document.createElement("option");
        option.value=element.provider_id;
        option.textContent=element.name;
        document.getElementById("provider").appendChild(option);


    });
})
.catch(err=>{
    console.log(err);
})

document.getElementById("form").onsubmit=function(e){
    e.preventDefault();
    let product={
        'name': document.getElementById("name").value,
        'description': document.getElementById("description").value,
        'category_id': document.getElementById("category").value,
        'provider_id': document.getElementById("provider").value,
        'stock': document.getElementById("stock").value,
        'price': document.getElementById("price").value
    }
    console.log(product)

}