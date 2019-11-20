<section id="template-vue-comentarios" >
    <div class="user "  id="{$user['nombre']}">
        <div v-if="cont > 0">
            <div   class="d-flex justify-content-center" >
                <h3 class="w-75 d-flex justify-content-center bg-info text-white m-0 p-0 ">Comentarios {$cohete->nombre}</h3>
            </div>
            <div class="w-75 container bg-info text-white">
                        <div class="row font-weight-bold ">
                            <span class="col-3 align-self-start justify-content-start">
                                Usuario
                                <button  type="button" @click="disable()" :id="sort" class="btn btn-link text-white p-0 m-0 mr-1">
                                <i v-if='sort' class="fas fa-backspace"></i>
                                </button>
                            </span>
                            <span class="col-3 align-self-start justify-content-start">
                                <button type="button" @click="sortfecha(sort)" id="sortfecha" class="btn btn-link text-white p-0 m-0 mr-1">
                                <i v-if='sort == "reversefecha"' class="fas fa-sort-up"></i>
                                <i v-if='sort == "fecha"' class="fas fa-sort-down"></i>
                                <i v-if='sort !== "fecha" && sort!== "reversefecha"' class="fas fa-sort"></i>
                                </button>
                                Fecha
                            </span>
                            <span class="col-3 align-self-start justify-content-start">
                                <button type="button" @click="sortpuntaje(sort)" id="sortpuntaje" class="btn btn-link text-white p-0 m-0 mr-1">
                                <i v-if='sort == "reversepuntaje"' class="fas fa-sort-up"></i>
                                <i v-if='sort == "puntaje"' class="fas fa-sort-down"></i>
                                <i v-if='sort !== "puntaje" && sort!== "reversepuntaje"' class="fas fa-sort"></i>
                                </button>
                                Calificacion
                            </span>
                        </div>
            </div>
        </div>       
    </div>
    <div class="d-flex justify-content-center">
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
    </div>
</section>
{/literal}
