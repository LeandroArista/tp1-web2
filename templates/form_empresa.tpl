        <form action="updateempresa/{$Empresa->id_empresa}" method="post">
            <input type="text" name="nombre" value="{$Empresa->nombre}">
            <input type="text" name="propietario" value="{$Empresa->propietario}">
            <input type="text" name="pais" value="{$Empresa->pais}">
            <input type="date" name="fecha_fundacion" value="{$Empresa->fecha_fundacion}">
            <input type="submit" value="Guardar">
        </form>