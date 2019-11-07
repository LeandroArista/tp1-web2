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
          {if $usuario->amin == true}
                <td><i class="fas fa-user-tie"></i></td>
          {else}
                <td><i class="fas fa-user"></i></td>
          {/if}
          <td>{$usuario->admin}</td>
          {if $logged && $admin} 
            <td>
                {if $usuario->admin == false}
                    <a href='setadmin/{$usuario->id_usuario}'><i class="fas fa-user-plus"></i></a>
                {else}
                    <a href='unsetadmin/{$usuario->id_usuario}'><i class="fas fa-user-minus"></i></a>
                {/if}
                <a href='borrarusuario/{$usuario->id_usuario}'class="delete"><i class="far fa-trash-alt"></i></a>
            </td>
          {/if}
        </tr>
      {/foreach}
    </table>
  </section>
 {include file="footer.tpl"}