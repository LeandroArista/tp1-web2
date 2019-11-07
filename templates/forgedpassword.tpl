{include 'templates/header.tpl'}
<section>
<div class="container ">
    <form action="newpassword" method="POST" class="col-md-4 offset-md-4 mt-4 form-dark form-control-lg mb-4 ">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario</label>
            <input type="nombre" name="nombre" class="form-control" value='{$usuario->nombre}' required>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="mail" class="form-control" value='{$usuario->mail}' required>
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="password" name="clave" class="form-control" placeholder="Password" required>
        </div>
         {if $error}
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
        {/if}
        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>
</section>
{include file="footer.tpl"}