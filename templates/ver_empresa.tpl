{include file="header.tpl"}
<section>
    <table class="table table-bordered">
      <tr class="thead-dark">
        <th>ID</th>
        <th>Nombre</th>
        <th>Propietario</th>
        <th>Pais</th>
        <th>Fecha Fundacion</th>
        {if $logged }
          <th></th>
        {/if}
      </tr>
     {foreach from=$Empresa item=empresa}
        <tr>
          <td>{$empresa->id_empresa}</td>
          <td>{$empresa->nombre}</td>
          <td>{$empresa->propietario}</td>
          <td>{$empresa->pais}</td>
          <td>{$empresa->fecha_fundacion}</td> 
          {if $logged}
             <td>
             <a href='editarempresa/{$empresa->id_empresa}' class="edit"><i class="far fa-edit"></i></a>
             <a href='borrarempresa/{$empresa->id_empresa}'class="delete"><i class="far fa-trash-alt"></i></a>
             </td>
          {/if}
        </tr>
      {/foreach}
    </table>
    <a href='empresas/'><i class="fas fa-arrow-left fa-2x"></i></a>
  </section>
  {include file="footer.tpl"}