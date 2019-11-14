{include file="header.tpl"}
<section class="m-4">
  <div class="row">
    <div class="m-0 p-0 col-sm-6">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">    
          {foreach from=$imagenes item=imagen}
          <div class="carousel-item {if !empty($SelImg) && $SelImg->id_imagen == $imagen->id_imagen }active{/if}">
            <div class="div-img">
              <img src="{$imagen->ruta}" class="d-block w-100 h-100"  alt="imagen-{$imagen->id_imagen}" >
            </div>
          </div>
          {{/foreach}}
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <ul class="m-0 p-0">
      <li class="list-group-item d-flex justify-content-between align-items-center"><b>Nombre:</b><span class="badge bg-info text-white"> {$cohete->nombre}</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><b>Fecha Creacion:</b><span class="badge bg-info text-white"> {$cohete->fecha_creacion}</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><b>Altura:</b><span class="badge bg-info text-white"> {$cohete->altura}</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><b>Diamertro:</b><span class="badge bg-info text-white">{$cohete->diametro}</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><b>Masa:</b><span class="badge bg-info text-white">{$cohete->masa}</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><b>Empresa:</b> <span class="badge bg-info text-white">{$cohete->empresa}</span></li>
      {if $logged && $admin} 
        <li class="list-group-item d-flex justify-content-between align-items-center"><span class="mx-auto row">
        <a href='editarcohete/{$cohete->id_cohete}' class="edit m-2"><i class="far fa-edit fa-2x"></i></a> 
        <a href='borrarcohete/{$cohete->id_cohete}'class="delete m-2"><i class="far fa-trash-alt fa-2x "></i></a>
        </span></li>
      {/if}
      </ul>
    </div>
    <a href='cohetes/'><i class="fas fa-arrow-left fa-2x m-4"></i></a>
  </div>
</section>
<section class="usuario" {if $admin }id="admin"{else}{if $logged}id="logged"{else}id="user"{/if}{/if}>
  <div class="comentarios m-4 " id='{$cohete->id_cohete}'>
    {include file="vue/coment_list.tpl"}
    {if $logged}
    <div class="d-flex justify-content-center">
      <form id="form-comentario" class="bg-dark text-white form-inline w-75 d-flex justify-content-center align-items-center " action="insertarcomentario" method="POST">
                  <h2>Agregar Comentario</h2>
                  <div class="form-row w-100  p-2">
                    <label for="texto" class="text-center align-middle col-sm-2 col-form-label">Comentario</label>
                    <div class="form-group mb-2 col-sm-5 m-1">
                      <input class="form-control w-100" type="text" name="texto" id="texto">
                    </div>
                    <label for="puntaje" class="text-center align-middle col-sm-1 col-form-label">Puntaje</label>
                    <div class="form-group mb-2 col-sm-2">
                      <select class="form-control" name="puntaje" id="puntaje">
                        <option selected value="1">1 </option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5 max</option>
                      </select>
                    </div>
                    <div class="form-group col-1 ">
                      <input type="submit" class="btn btn-primary mb-2" value="Insertar">
                    </div>
                  </div>
                  <input type="text" name="id_usuario" value="{$user['id_usuario']}" class="d-none" >
                  <input type="text" name="id_cohete" value="{$cohete->id_cohete}" class="d-none">
                  
      </form>
    </div>
    {/if}

  </div>
</section {}>
{include file="footer.tpl"}
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
{* <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script> *}
<script src="js/comentarios.js"></script>
</body>
{include file="script.tpl"}
</html>