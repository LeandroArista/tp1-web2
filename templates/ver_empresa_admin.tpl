{include file="header.tpl"}
    <ul>
        <li>{$empresa->id_empresa}: {$empresa->nombre}:{$empresa->propietario}: {$empresa->pais}: {$empresa->fecha_fundacion} -<a href='editarempresa/{$empresa->id_empresa}'>Editar</a> <a href='borrarempresa/{$empresa->id_empresa}'>Borrar</a></li>
    </ul>
    <a href='empresas/'>Volver</a>
  </body>
</html>