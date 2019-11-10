{include file="header.tpl"}
  <section>
      <h1>Empresas</h1>
     <table class="table table-bordered m-2">
      <tr class="thead-dark">
        <th>ID</th>
        <th>Nombre</th>
        <th></th>
      </tr>
      {foreach from=$lista_empresas item=empresa}
        <tr>
          <td>{$empresa->id_empresa}</td>
          <td>{$empresa->nombre}</td>
          {if $logged && $admin } 
            <td>
            <a href='verempresa/{$empresa->id_empresa}' class="view"><i class="far fa-eye"></i></a>
            <a href='editarempresa/{$empresa->id_empresa}' class="edit"><i class="far fa-edit"></i></a>
            <a href='borrarempresa/{$empresa->id_empresa}'class="delete"><i class="far fa-trash-alt"></i></a>
            </td>
          {else}
            <td><a href='verempresa/{$empresa->id_empresa}' class="view"><i class="far fa-eye"></i></a></td>
          {/if}
        </tr>
      {/foreach}
    </table>
    {if $logged && $admin}
      <form action="insertarempresa" class="form-dark form-group form-control-lg m-4" method="post">
        <label>Insertar Empresa</label>
        <input type="text" class="form-control m-1" name="nombre" placeholder="Nombre">
        <input type="text" class="form-control m-1" name="propietario" placeholder="Propietario">
        <input type="text" class="form-control m-1" name="pais" placeholder="Pais">
        <input type="date" class="form-control m-1"name="fecha_fundacion" placeholder="Fecha de Fundacion">
        <input type="submit" class="btn btn-primary" value="Insertar">
      </form>
    {/if}
  </section>
 {include file="footer.tpl"}