{include file="header.tpl"}
    <ul>
      {foreach from=$lista_cohetes item=cohete}
        <li>{$cohete->id_cohete}: {$cohete->nombre}: {$cohete->fecha_creacion}: {$cohete->altura}: {$cohete->diametro}: {$cohete->masa}: {$cohete->id_empresa} - <a href='borrar/{$cohete->id_cohete}'>Borrar</a></li>
      {/foreach}
    </ul>

    <form action="insertar" method="post">
      <input type="text" name="nombre" placeholder="Nombre">
      <input type="date" name="fecha_creacion" placeholder="Fecha de Creacion">
      <input type="text" name="altura" placeholder="Altura">
      <input type="text" name="diametro" placeholder="Diametro">
      <input type="text" name="masa" placeholder="Masa">
      <input type="text" name="id_empresa" placeholder="ID Empresa">
      <input type="submit" value="Insertar">
    </form>
  </body>
</html>