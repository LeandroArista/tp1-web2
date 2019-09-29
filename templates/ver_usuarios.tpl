{include file="header.tpl"}
    <ul>
      {foreach from=$lista_usuarios item=usuario}
        <li>{$usuario->id_usuario}: {$usuario->nombre}: {$usuario->email} - <a href='borrar/{$usuario->id_usuario}'>Borrar</a></li>
      {/foreach}
    </ul>

    <form action="insertar" method="post">
      <input type="text" name="nombre" placeholder="Nombre">
      <input type="text" name="mail" placeholder="Email">
      <input type="text" name="clave" placeholder="Clave">
      <input type="submit" value="Insertar">
    </form>
  </body>
</html>
