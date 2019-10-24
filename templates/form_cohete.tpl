{include file="header.tpl" }
<section>
        <h1>Editar Cohete</h1>
        <form action="updatecohete/{$Cohete->id_cohete}" class="form-dark form-group form-control-lg m-2" method="post">
            <div class="form-group">
                <label for="nombre">Empresa</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{$Cohete->nombre}">
            </div>
            <div class="form-group">
                <label for="fecha_creacion">Fecha Creacion</label>
                <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion" value="{$Cohete->fecha_creacion}">
            </div>
            <div class="form-group">
                <label for="altura">Altura</label>
                <input type="text" class="form-control" name="altura" id="altura" value="{$Cohete->altura}">
            </div>
            <div class="form-group">
                <label for="diametro">Diametro</label>
                <input type="text" class="form-control" name="diametro" id="diametro" value="{$Cohete->diametro}">
            </div>
            <div class="form-group">
                <label for="masa">Masa</label>
                <input type="text" class="form-control" name="masa" id="masa" value="{$Cohete->masa}">
            </div>
            <div class="form-group">
                <label for="id_empresa">Empresa</label>
                <select class="form-control" name="id_empresa">
                {foreach from=$lista_empresas item=empresa}
                    {if $empresa->nombre == $Cohete->empresa } 
                        <option selected value="{$empresa->id_empresa}">{$empresa->nombre}</option>
                    {else}
                        <option value="{$empresa->id_empresa}">{$empresa->nombre}</option>
                    {/if}
                {/foreach}
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>
        <a href='cohetes' class="ml-2"><i class="fas fa-arrow-left fa-2x "></i></a>
</section>
{include file="footer.tpl" }