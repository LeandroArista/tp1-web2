{include file="header.tpl"}
     <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th></th>
      </tr>
      {foreach from=$lista_empresas item=empresa}
        <tr>
          <td>{$empresa->id_empresa}</td>
          <td>{$empresa->nombre}</td> 
          <td><a href='verempresa/{$empresa->id_empresa}'>Ver</a></td>
        </tr>
      {/foreach}
    </table>
  </body>
</html>