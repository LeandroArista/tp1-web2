
<section id="template-vue-comentarios">

    <h3>Comentarios {$cohete->nombre}</h3>
{literal}
    <ul>
       <li v-for="comentario in comentarios">
            <span class="badge">Usuario: {{ comentario.usuario }} - Fecha: {{ comentario.fecha}} - Calificacion: </span>
            <span v-if="comentario.puntaje == 1"><i class="fas fa-star"></i></span>
            <span v-if="comentario.puntaje == 2"><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            <span v-if="comentario.puntaje == 3"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            <span v-if="comentario.puntaje == 4"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            <span v-if="comentario.puntaje == 5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            <span v-if="isadmin">
                <a :href="'eliminarcomentario/'+comentario.id_comentario" class="delete"><i class="far fa-trash-alt "></i></a>
            </span>
            <span><br>{{ comentario.texto }}</span>
            
       </li> 
    </ul>

</section>
{/literal}
