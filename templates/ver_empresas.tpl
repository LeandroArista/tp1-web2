{include file="header.tpl"}
    <ul>
      {foreach from=$lista_empresas item=empresa}
        <li>{$empresa->id_empresa}: {$empresa->nombre}: {$empresa->propietario}: {$empresa->pais}: {$empresa->fecha_fundacion}</li>
      {/foreach}
    </ul>
  </body>
</html>