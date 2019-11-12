"use strict"

// event listeners
document.querySelector("#form-comentario").addEventListener('submit', insertarComentario);

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
function getComentarios(id_coehete) {
    
    let url='api/getComentariosCohete/'+id_coehete;
    fetch(url)
    .then(response => response.json())
    .then(function(){
        console.log(response);
        comentarios => {
        console.log("entre2");
        app.comentarios = comentarios; 
        let usuario=document.querySelector(".usuario").id;
        console.log(id);
        if (id=="admin"){
            app.isadmin=true;
            app.isloged=true;
        }else if(id=="logged"){
            app.isloged=true;
        }
    }
    })
    .catch(error => console.log(error));
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
         //getComentarios(id);
     })
     .catch(error => console.log(error));
}

// obtiene las tareas al iniciio
let id=document.querySelector(".comentarios").id;
getComentarios(id);
