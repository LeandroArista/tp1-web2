{include file="header.tpl"}
      <table>
      <tr>
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
            <td><a href='vercohete/{$cohete->id_cohete}'>Ver </a><a href='editarcohete/{$cohete->id_cohete}'>Editar</a> <a href='borrarcohete/{$cohete->id_cohete}'>Borrar</a></td>
          {else}
            <td><a href='vercohete/{$empresa->id_empresa}'>Ver</a></td>
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
      <input type="submit" value="Insertar">
    </form>
    {/if}
  </body>
</html>