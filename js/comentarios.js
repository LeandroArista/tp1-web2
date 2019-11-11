"use strict"

// event listeners
document.querySelector("#form-cometario").addEventListener('submit', addTask);

// define la app Vue
let app = new Vue({
    el: "#template-vue-tasks",
    data: {
        subtitle: "Estas tareas se renderizan desde el cliente usando Vue.js",
        tasks: [], 
        auth: true
    }
});

/**
 * Obtiene la lista de tareas de la API y las renderiza con Vue.
 */
function getTasks() {
    fetch("api/tareas")
    .then(response => response.json())
    .then(tasks => {
        app.tasks = tasks; // similar a $this->smarty->assign("tasks", $tasks)
    })
    .catch(error => console.log(error));
}

/**
 * Inserta una tarea usando la API REST.
 */
function addTask(e) {
    e.preventDefault();
    
    let data = {
        titulo:  document.querySelector("input[name=titulo]").value,
        descripcion:  document.querySelector("input[name=descripcion]").value,
        prioridad:  document.querySelector("input[name=prioridad]").value,
        finalizada:  document.querySelector("input[name=finalizada]").checked
    }

    fetch('api/tareas', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
         getTasks();
     })
     .catch(error => console.log(error));
}

// obtiene las tareas al iniciio
getTasks();
