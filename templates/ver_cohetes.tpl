{include file="header.tpl"}
      <section class="align-content-center">
        <h1>Cohetes</h1>
        
        <table class="table table-bordered">
        <tr class="thead-dark">
          <th>Nombre</th>
          <th>{if $sort}
          <a class="btn" href="cohetes" role="button"><i  class="fas fa-sort-down"></i></a>
          {else}
          <a class="btn" href="sortcohetes" role="button"><i  class="fas fa-sort"></i></a>
          {/if}Empresa</th>
          <th></th>
        </tr>
        {foreach from=$lista_cohetes item=cohete}
          <tr>
            <td>{$cohete->nombre}</td>  
            {foreach from=$lista_empresas item=empresa}
              {if $cohete->id_empresa == $empresa->id_empresa}
                <td>{$empresa->nombre}</td>
              {/if}
            {/foreach}
            {if $logged && $admin} 
              <td>
              <a href='vercohete/{$cohete->id_cohete}' class="view"><i class="far fa-eye"></i></a>
              <a href='editarcohete/{$cohete->id_cohete}' class="edit"><i class="far fa-edit"></i></a>
              <a href='borrarcohete/{$cohete->id_cohete}' class="delete"><i class="far fa-trash-alt"></i></a>
              </td>
            {else}
              <td><a href='vercohete/{$cohete->id_cohete}' class="view"><i class="far fa-eye"></i></a></td>
            {/if}
          </tr>
        {/foreach}
      </table>
      {if $logged && $admin }
      <form action="insertarcohete"  class="form-dark form-group form-control-lg m-4" method="post" enctype="multipart/form-data">
        <label>Insertar Cohete</label>
        <input type="text" class="form-control m-1" name="nombre" placeholder="Nombre">
        <input type="date" class="form-control m-1" name="fecha_creacion" placeholder="Fecha de Creacion">
        <input type="text" class="form-control m-1" name="altura" placeholder="Altura">
        <input type="text" class="form-control m-1" name="diametro" placeholder="Diametro">
        <input type="text" class="form-control m-1" name="masa" placeholder="Masa">
        
        <select class="form-control m-1" name="id_empresa">
          <option selected>Seleccione Empresa ...</option>
          {foreach from=$lista_empresas item=empresa}
            <option value="{$empresa->id_empresa}">{$empresa->nombre}</option>
          {/foreach}
        </select>
        <label class="form-control m-1" >Selecciona Imagen/es: 
        <input required type="file"class=" m-1"  name="imagen[]" id="imageToUpload" multiple></label>
        <input type="submit" class="btn btn-primary" value="Insertar">
      </form>
      {/if}
    </section>
{include file="footer.tpl"}
</body>
{include file="script.tpl"}
</html>