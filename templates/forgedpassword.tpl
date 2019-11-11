{include 'templates/header.tpl'}
<section>
<div class="container ">
    <form action="newpassword" method="POST" class="col-md-4 offset-md-4 mt-4 form-dark form-control-lg mb-4 ">
        <h1>{$titulo}</h1>
        <div class="form-group">
            <label>Usuario</label>
            <input type="nombre" name="nombre" class="form-control" value='' required>
        </div>
         {if $error}
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
        {/if}
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</div>
</section>
{include file="footer.tpl"}