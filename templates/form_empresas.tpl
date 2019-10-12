{include file="header.tpl"}
        <form action="edit" method="post">
            <input type="text" name="nombre" placeholder="{$empresa->nombre}">
            <input type="text" name="propietario" placeholder="{$empresa->propietario}">
            <input type="text" name="pais" placeholder="{$empresa->pais}">
            <input type="date" name="fecha_fundacion" placeholder="{$empresa->fecha_fundacion}">
            <input type="submit" value="Guardar">
        </form>
    </body>
</html>