
<section id="template-vue-comentarios">

    <h3>Comentarios {$cohete->nombre}</h3>
{literal}
    <ul>
       <li v-for="comentario in comentarios">
            <span>{{ comentario.id_usuario }} -{{ comentario.fecha}} -{{comentario.puntaje}}  </span>
            <span>{{ comentario.texto }}</span>
            <span v-if="{{$logged}} && comentario.id_usuario == {{$user->id_usuario}} || {$admin}">
                <a data-id="{{comentario.id}}" class="btn-eliminar" href="eliminarcomentario/{{comentario.id_comentario}}" class="delete"><i class="far fa-trash-alt "></i></a>
            </span>
       </li> 
    </ul>

</section>
{/literal}
