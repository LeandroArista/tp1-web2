"use strict"

// event listeners
let form=document.querySelector("#form-comentario");
if(form!=null)
form.addEventListener('submit', insertarComentario);

// define la app Vue
let app = new Vue({
    el: "#template-vue-comentarios",
    data: {
        comentarios: [], 
        isloged: false,
        isadmin: false,

    }
});

/**
 * Obtiene la lista de tareas de la API y las renderiza con Vue.
 */
async function getComentarios(id_cohete) {
    let url='api/comentarios/'+id_cohete;
    try {
        let response = await fetch(url);
        if (response.ok) {
            let json = await response.json();
            app.comentarios = json; 
            let id=document.querySelector(".usuario").id;
            if (id=="admin"){
                app.isadmin=true;
                app.isloged=true;
            }else if(id=="logged"){
                app.isloged=true;
            }
        }
    } catch (error) {
        console.log(error);
    }
}
/**
 * Inserta una tarea usando la API REST.
 */
function insertarComentario(e) {
    e.preventDefault();
    
    let data = {
        texto:  document.querySelector("input[name=texto]").value,
        puntaje:  document.querySelector("#puntaje").value,
        id_usuario:  document.querySelector("input[name=id_usuario]").value,
        id_cohete:  document.querySelector("input[name=id_cohete]").value,
    }

    fetch('api/comentario', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
        let id=document.querySelector(".comentarios").id;
         getComentarios(id);
     })
     .catch(error => console.log(error));
}

// obtiene las tareas al iniciio
let id=document.querySelector(".comentarios").id;
getComentarios(id);
