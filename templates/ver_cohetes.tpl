{include file="header.tpl"}
      <form action="sortcohete"  class="form-group m-2 align-content-end" method="post">
          <div class="custom-control custom-checkbox">
            <input type="submit" class="custom-control-input" id="sort" name="sort">
            <label class="custom-control-label" for="sort">Ordenar por categoria</label>
          </div>
      </form>
      <table class="table table-bordered">
      <tr class="thead-dark">
        <th>Id Cohete</th>
        <th>Nombre</th>
        <th>Empresa</th>
        <th></th>
      </tr>
      {foreach from=$lista_cohetes item=cohete}
        <tr>
          <td>{$cohete->id_cohete}</td> 
          <td>{$cohete->nombre}</td>  
          {foreach from=$lista_empresas item=empresa}
            {if $cohete->id_empresa == $empresa->id_empresa}
              <td>{$empresa->nombre}</td>
            {/if}
          {/foreach}
          {if $logged } 
            <td>
            <a href='vercohete/{$cohete->id_cohete}' class="view">Ver</a>
            <a href='editarcohete/{$cohete->id_cohete}' class="edit"><i class="far fa-edit"></i></a>
            <a href='borrarcohete/{$cohete->id_cohete}' class="delete"><i class="far fa-trash-alt"></i></a>
            </td>
          {else}
            <td><a href='vercohete/{$empresa->id_empresa}' class="view">Ver</a></td>
          {/if}
        </tr>
      {/foreach}
    </table>
    {if $logged }
    <form action="insertarcohete"  class="form-dark form-group form-control-lg m-4" method="post">
      <input type="text" class="form-control" name="nombre" placeholder="Nombre">
      <input type="date" class="form-control" name="fecha_creacion" placeholder="Fecha de Creacion">
      <input type="text" class="form-control" name="altura" placeholder="Altura">
      <input type="text" class="form-control" name="diametro" placeholder="Diametro">
      <input type="text" class="form-control" name="masa" placeholder="Masa">
      <select class="form-control" name="id_empresa">
        {foreach from=$lista_empresas item=empresa}
          <option value="{$empresa->id_empresa}">{$empresa->nombre}</option>
        {/foreach}
      </select>
      <input type="submit" class="btn btn-primary" value="Insertar">
    </form>
    {/if}
{include file="footer.tpl"}