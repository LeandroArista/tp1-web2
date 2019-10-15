{include file="header.tpl"}
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Propietario</th>
        <th>Pais</th>
        <th>Fecha Fundacion</th>
      </tr>
     {foreach from=$Empresa item=empresa}
        <tr>
          <td>{$empresa->id_empresa}</td>
          <td>{$empresa->nombre}</td>
          <td>{$empresa->propietario}</td>
          <td>{$empresa->pais}</td>
          <td>{$empresa->fecha_fundacion}</td> 
        </tr>
      {/foreach}
    </table>
    <a href='empresas/'>Volver</a>
  </body>
</html>