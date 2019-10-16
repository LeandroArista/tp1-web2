{include file="header.tpl"}
    <table>
      <tr>
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
             <td><a href='editarempresa/{$empresa->id_empresa}'>Editar</a> <a href='borrarempresa/{$empresa->id_empresa}'>Borrar</a></td>
          {/if}
        </tr>
      {/foreach}
    </table>
    <a href='empresas/'>Volver</a>
  </body>
</html>