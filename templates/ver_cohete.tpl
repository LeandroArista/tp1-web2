{include file="header.tpl"}
    <table>
      <tr>
        <th>Id Cohete</th>
        <th>Nombre</th>
        <th>Fecha Creacion</th>
        <th>Altura</th>
        <th>Diamertro</th>
        <th>Masa</th>
        <th>Empresa</th>
        <th></th>
      </tr>
      {foreach from=$lista_cohetes item=cohete}
        <tr>
            <td>{$cohete->id_cohete}</td> 
            <td>{$cohete->nombre}</td> 
            <td>{$cohete->fecha_creacion}</td> 
            <td>{$cohete->altura}</td> 
            <td>{$cohete->diametro}</td> 
            <td>{$cohete->masa}</td> 
            <td>{$cohete->empresa}</td>
          {if $logged } 
            <td><a href='editarcohete/{$cohete->id_cohete}'>Editar</a> <a href='borrarcohete/{$cohete->id_cohete}'>Borrar</a></td>
          {/if}
        </tr>
      {/foreach}
    </table>
    <a href='cohetes/'>Volver</a>
  </body>
</html>