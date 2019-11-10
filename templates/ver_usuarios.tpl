{include file="header.tpl"}
  <section>
      <h1>Usuarios</h1>
     <table class="table table-bordered m-2">
      <tr class="thead-dark">
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Admin</th>
        <th></th>
      </tr>
      {foreach from=$lista_usuarios item=usuario}
        <tr>
          <td>{$usuario->id_usuario}</td>
          <td>{$usuario->nombre}</td>
          <td>{$usuario->mail}</td>
          {if $usuario->administrador == true}
                <td><i class="fas fa-user-tie fa-2x"></i></td>
          {else}
                <td><i class="fas fa-user fa-2x"></i></td>
          {/if}
          {if $logged && $admin} 
            <td>
                {if $usuario->administrador == false}
                    <a href='setadmin/{$usuario->id_usuario}' class="view"><i class="fas fa-user-plus fa-2x "></i></a>
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