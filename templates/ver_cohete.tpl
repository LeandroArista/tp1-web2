{include file="header.tpl"}
<section class="m-4">
  <div class="row">
    <div class="m-0 p-0 col-sm-6">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">    
          {foreach from=$imagenes item=imagen}
          <div class="carousel-item {if !empty($SelImg) && $SelImg->id_imagen == $imagen->id_imagen }active{/if}">
            <img src="{$imagen->ruta}" class="d-block w-100" alt="{$imagen->id_imagen} imagen" >
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
      <li class="list-group-item d-flex justify-content-between align-items-center"><b>Cohete:</b><span class="badge bg-info text-white "> {$cohete->id_cohete}</span></li>
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
{include file="footer.tpl"}