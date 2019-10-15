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
          <td><a href='verempresa/{$empresa->id_empresa}'>Ver </a><a href='editarempresa/{$empresa->id_empresa}'>Editar</a> <a href='borrarempresa/{$empresa->id_empresa}'>Borrar</a></td>
        </tr>
      {/foreach}
    </table>
    <form action="insertarempresa" method="post">
      <input type="text" name="nombre" placeholder="Nombre">
      <input type="text" name="propietario" placeholder="Propietario">
      <input type="text" name="pais" placeholder="Pais">
      <input type="date" name="fecha_fundacion" placeholder="Fecha de Fundacion">
      <input type="submit" value="Insertar">
    </form>
  </body>
</html>