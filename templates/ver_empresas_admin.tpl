{include file="header.tpl"}
    <ul>
      {foreach from=$lista_empresas item=empresa}
        <li>{$empresa->id_empresa}: {$empresa->nombre} - <a href='verempresa/{$empresa->id_empresa}'>Ver</a><a href='editarempresa/{$empresa->id_empresa}'>Editar</a> <a href='borrarempresa/{$empresa->id_empresa}'>Borrar</a></li>
      {/foreach}
    </ul>
    <form action="insert" method="post">
      <input type="text" name="nombre" placeholder="Nombre">
      <input type="text" name="propietario" placeholder="Propietario">
      <input type="text" name="pais" placeholder="Pais">
      <input type="date" name="fecha_fundacion" placeholder="Fecha de Fundacion">
      <input type="submit" value="Insertar">
    </form>
  </body>
</html>