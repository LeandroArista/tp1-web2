<div class="user d-flex justify-content-center" id="{$user['nombre']}">
    <h3 class="w-75 d-flex justify-content-center bg-info text-white m-0 p-0 ">Comentarios {$cohete->nombre}</h3>
    {* <button type="button" :v-on:click.native="eliminar(comentario.id_comentario)" :id="comentario.id_comentario" class="btn_delete btn btn-light"><i class="far fa-trash-alt text-danger"></i></button> *}
</div>
 <div class="w-75 container bg-info text-white">
            <div class="row font-weight-bold ">
                <span class="col-3 align-self-start justify-content-start">Usuario</span>
                <span class="col-3 align-self-start justify-content-start">Fecha</span>
                <span class="col-3 align-self-start justify-content-start">Calificacion</span>
            </div>
</div>       

<section id="template-vue-comentarios" class="d-flex justify-content-center">
{literal}
    <ul class="list-group-flush m-0 p-0 w-75 ">
       <li class="list-group-item m-0 p-0" v-for="comentario in comentarios">
            <ul class="list-group-flush m-0 p-0">
                <li class="list-group-item list-group-item-info d-flex w-100 justify-content-between align-middle ">
                    <div class="row font-weight-bold w-100 ">
                        <span class="col-3 align-self-start justify-content-start">{{ comentario.usuario }}</span>
                        <span class="col-3 align-self-start justify-content-start">{{ comentario.fecha}}</span>
                        <span class="col-3 align-self-start justify-content-start"><i v-for="n in 5"  v-if="n <= parseInt(comentario.puntaje)" class="fas fa-star text-warning"></i></span>
                    </div>
                    <span class="align-middle"v-if="(isadmin || nombre == comentario.usuario)">
                    <button type="button" @click="eliminar(comentario.id_comentario)" :id="comentario.id_comentario" class="btn_delete btn btn-light"><i class="far fa-trash-alt text-danger"></i></button>
                        
                    </span>
                </li>
                <li class="list-group-item">{{ comentario.texto }}</li>
            </ul>
       </li> 
    </ul>

</section>
{/literal}
