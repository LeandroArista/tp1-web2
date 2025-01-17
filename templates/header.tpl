<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <base href='{$BASE_URL}'>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/styles.css">
      <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
        <title>{$titulo}</title>
  </head>
  <body>
    <div class="contenedor">
    <header>
      <nav class="navbar navbar-expand-sm navbar-expand-lg navbar-dark bg-personalized">
        <!--   BRAND   -->
        <div class="row w-100 justify-content-between align-self-center">
          <div class="col-3 col-sm-2 col-md-2 d-flex justify-content-start align-items-start p-1">
            <a class="navbar-brand " href="#"><img src="./images/logo.png" id="logo" alt="SpaceRocket logo"></a>
          </div>

          <div class="col-auto d-flex justify-content-auto align-self-center">
            <h1 class="text-center navbar-text">
              Al infinito y mas alla
            </h1>
          </div>

          <div class="col-auto d-flex justify-content-end align-self-center">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-links"
              aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-self-center justify-content-end group" id="navbar-links">
              <ul class="nav navbar-nav align-self-center justify-content-end">
                {foreach from= $MENU key=k item=i}
                  {if !(!$logged && $k=="Logout") && !($logged && ($k == "Login" || $k == "Register"))}
                      {if $k=="Logout" && !empty($user)}
                        <li class="nav-item dropdown {if $k==$SelMenu} active{/if}">
                          <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {$user['nombre']}
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{$i}"> {$k}</a>
                          </div>
                        </li>
                      {else}
                        {if ($k=="Usuarios" && (($logged && !$admin)|| (!$logged)) )}

                        {else}
                          <li class="nav-item{if $k==$SelMenu} active{/if}"><a class="nav-link" href="{$i}">{$k}</a></li>
                        {/if}
                      {/if}
                    
                  {/if}
                 {/foreach}
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main class="align-self-center">