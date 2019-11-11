{include 'templates/header.tpl'}
<section>
<div class="container">
    <form action="verify" method="POST" class="col-md-4 offset-md-4 mt-4 form-dark form-control-lg mb-4  ">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre de usuario">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="clave" class="form-control" placeholder="Password">
        </div>

        {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
        {/if}
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <a href="forgedpassword" class="text-white text-align-end"><u>Olvide mi contraseña</u></a>
        </div>
    </form>


</div>
</section>
{include file="footer.tpl"}