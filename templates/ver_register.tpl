{include 'templates/header.tpl'}
<div class="container">
    <form action="saveregister" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario</label>
            <input type="nombre" name="nombre" class="form-control" placeholder="Ingrese Nombre">
        </div>
        <div class="form-group">
            <label>E-mail)</label>
            <input type="email" name="mail" class="form-control" placeholder="Ingrese E-mail">
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

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

</div>
  </body>
</html>