"use strict"

// event listeners
let form=document.querySelector("#form-comentario");
if(form!=null)
    form.addEventListener('submit', insertarComentario);



async function deleteComentario(itemid) {
    try {
        let url='api/eliminarcomentario/'+itemid;
        let response = await fetch(url, {
            "method": "DELETE",
            "headers": { "Content-Type": "application/json" }
        });
        if (response.ok) {
            console.log("borre " + itemid);
        } else {
            console.log("no se pudo borrar" + itemid);
        }
    } catch (error) {
        console.log(error);
    }
}


// define la app Vue
let app = new Vue({
    el: "#template-vue-comentarios",
    data: {
        comentarios: [], 
        isloged: false,
        isadmin: false,
        nombre:"",
        cont:0,
    },
    methods:{
        eliminar:function(id){
            deleteComentario(id);
            getComentarios();
        },
    }
});

/**
 * Obtiene la lista de tareas de la API y las renderiza con Vue.
 */
async function getComentarios() {
    let id_cohete=document.querySelector(".comentarios").id;
    let url='api/comentarios/'+id_cohete;
    try {
        let response = await fetch(url);
        if (response.ok) {
            let json = await response.json();
            app.comentarios = json; 
            let id=document.querySelector(".usuario").id;
            let nombre=document.querySelector(".user").id;
            console.log(json.length);
            app.cont=json.length;
            if (id=="admin"){
                app.isadmin=true;
                app.isloged=true;
                app.nombre=nombre;
            }else if(id=="logged"){
                app.isloged=true;
                app.nombre=nombre;
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

getComentarios();