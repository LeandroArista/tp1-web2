{include file="header.tpl"}
     <table class="table table-bordered ">
      <tr class="thead-dark">
        <th>ID</th>
        <th>Nombre</th>
        <th></th>
      </tr>
      {foreach from=$lista_empresas item=empresa}
        <tr>
          <td>{$empresa->id_empresa}</td>
          <td>{$empresa->nombre}</td>
          {if $logged } 
            <td>
            <a href='verempresa/{$empresa->id_empresa}' class="view">Ver</a>
            <a href='editarempresa/{$empresa->id_empresa}' class="edit"><i class="far fa-edit"></i></a>
            <a href='borrarempresa/{$empresa->id_empresa}'class="delete"><i class="far fa-trash-alt"></i></a>
            </td>
          {else}
            <td><a href='verempresa/{$empresa->id_empresa}' class="view">Ver</a></td>
          {/if}
        </tr>
      {/foreach}
    </table>
    {if $logged }
      <form action="insertarempresa" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="propietario" placeholder="Propietario">
        <input type="text" name="pais" placeholder="Pais">
        <input type="date" name="fecha_fundacion" placeholder="Fecha de Fundacion">
        <input type="submit" class="btn btn-primary" value="Insertar">
      </form>
    {/if}
 {include file="footer.tpl"}