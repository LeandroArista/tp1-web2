{include file="header.tpl"}
<section>
     <table class="table table-bordered m-4">
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
      <form action="insertarempresa" class="form-dark form-group form-control-lg m-4" method="post">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        <input type="text" class="form-control" name="propietario" placeholder="Propietario">
        <input type="text" class="form-control" name="pais" placeholder="Pais">
        <input type="date" class="form-control"name="fecha_fundacion" placeholder="Fecha de Fundacion">
        <input type="submit" class="btn btn-primary" value="Insertar">
      </form>
    {/if}
  </section>
 {include file="footer.tpl"}