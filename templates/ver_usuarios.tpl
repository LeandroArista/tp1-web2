{include file="header.tpl"}
  <section>
      <h1>Usuarios</h1>
     <table class="table table-bordered m-2">
      <tr class="thead-dark text-center">
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Administrador</th>
        <th></th>
      </tr>
      {foreach from=$lista_usuarios item=usuario}
        <tr class="text-center " >
          <td>{$usuario->id_usuario}</td>
          <td>{$usuario->nombre}</td>
          <td>{$usuario->mail}</td>
          {if $usuario->administrador == true}
                <td ><div class="d-flex justify-content-center"><i class="fas fa-user-tie fa-2x"></div></i></td>
          {else}
                <td> <div class="d-flex justify-content-center"><i class="fas fa-user fa-2x"></div></i></td>
          {/if}
          {if $logged && $admin} 
            <td class="d-flex align-items-center justify-content-center">
                {if $usuario->administrador == false}
                    <a href='setadmin/{$usuario->id_usuario}' class="view "><i class="fas fa-user-plus fa-2x "></i></a>
                {else}
                    <a href='unsetadmin/{$usuario->id_usuario}' class="delete"><i class="fas fa-user-minus fa-2x"></i></a>
                {/if}
                <a href='borrarusuario/{$usuario->id_usuario}'class="delete"><i class="far fa-trash-alt fa-2x"></i></a>
            </td>
          {/if}
        </tr>
      {/foreach}
    </table>
  </section>
 {include file="footer.tpl"}
 </body>
{include file="script.tpl"}
</html>