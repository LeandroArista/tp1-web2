{include file="header.tpl"}
        <div class="">
        <form action="updateempresa/{$Empresa->id_empresa}" class="form-dark form-group form-control-lg m-2" method="post">
            <div class="form-group">
                <label for="nombre">Empresa</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{$Empresa->nombre}">
            </div>
            <div class="form-group">
                <label for="propietario">Propietario</label>
                <input type="text" class="form-control" name="propietario" id="propietario" value="{$Empresa->propietario}">
            </div>
            <div class="form-group">
                <label for="pais">Pais</label>
                <input type="text" class="form-control" name="pais" id="pais" value="{$Empresa->pais}">
            </div>
            <div class="form-group">
                <label for="fecha_fundacion">Fecha Fundacion</label>
                <input type="date" class="form-control" name="fecha_fundacion" id="fecha_fundacion" value="{$Empresa->fecha_fundacion}">
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>
        <a href='empresas/' class="ml-2"><i class="fas fa-arrow-left fa-2x "></i></a>
        </div>
{include file="footer.tpl"}