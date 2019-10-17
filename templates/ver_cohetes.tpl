{include file="header.tpl"}
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
    <form action="insertarcohete" method="post">
      <input type="text" name="nombre" placeholder="Nombre">
      <input type="date" name="fecha_creacion" placeholder="Fecha de Creacion">
      <input type="text" name="altura" placeholder="Altura">
      <input type="text" name="diametro" placeholder="Diametro">
      <input type="text" name="masa" placeholder="Masa">
      <select name="id_empresa">
        {foreach from=$lista_empresas item=empresa}
          <option value="{$empresa->id_empresa}">{$empresa->nombre}</option>
        {/foreach}
      </select>
      <input type="submit" class="btn btn-primary" value="Insertar">
    </form>
    {/if}
{include file="footer.tpl"}