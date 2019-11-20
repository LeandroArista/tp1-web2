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
        sort:"",
        cont:0,
    },
    methods:{
        eliminar:function(id){
            deleteComentario(id);
            getComentarios();
        },
        sortpuntaje:function(appsort){
            getComentariosSortByPuntaje(appsort);
        },
        sortfecha:function(appsort){
            getComentariosSortByFecha(appsort);
        },
        disable:function(){
            getComentarios();
        }

    }
});

/**
 * Obtiene la lista de tareas de la API y las renderiza con Vue.
 */
function assignar(json,appsort,sort){
    app.comentarios = json;
    let inverso=false;
    app.sort=sort;
    if (appsort!="" && sort!=""){
        if(appsort=="puntaje" && sort=="puntaje"){
            inverso=true;
            app.sort="reversepuntaje";
        }
        if(appsort=="fecha" && sort=="fecha"){
            inverso=true;
            app.sort="reversefecha";
        }
        if(appsort=="reversepuntaje" && sort=="puntaje"){
            inverso=false;
            app.sort="puntaje";
        }
        if(appsort=="reversepuntaje" && sort=="puntaje"){
            inverso=false;
            app.sort="puntaje";
        }
    }
    
    if (inverso == true)
        app.comentarios = json.reverse();
    
    let id=document.querySelector(".usuario").id;
    let nombre=document.querySelector(".user").id;
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

async function getComentarios() {
    let id_cohete=document.querySelector(".comentarios").id;
    let url='api/comentarios/'+id_cohete;
    try {
        let response = await fetch(url);
        if (response.ok) {
            let json = await response.json();
            assignar(json,"");
        }
    } catch (error) {
        console.log(error);
    }
}

async function getComentariosSortByPuntaje(appsort) {    
    let id_cohete=document.querySelector(".comentarios").id;
    let url='api/comentariospuntaje/'+id_cohete;
    try {
        let response = await fetch(url);
        if (response.ok) {
            let json = await response.json();
            assignar(json,appsort,"puntaje");
        }
    } catch (error) {
        console.log(error);
    }
}

async function getComentariosSortByFecha(appsort) {
    let id_cohete=document.querySelector(".comentarios").id;
    let url='api/comentariosfecha/'+id_cohete;
    try {
        let response = await fetch(url);
        if (response.ok) {
            let json = await response.json();
            assignar(json,appsort,"fecha");
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