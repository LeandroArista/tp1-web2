<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <base href='{$BASE_URL}'>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
      <title>{$titulo}</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-expand-lg navbar-dark bg-personalized">
      <!--   BRAND   -->
      <div class="row w-100 justify-content-start align-self-center">
        <div class="col-3 col-sm-2 col-md-2 align-items-start p-1">
          <a class="navbar-brand " href="#"><img src="./images/logo.png" id="logo" alt="SpaceRocket logo"></a>
        </div>

        <div class="col-6 col-sm-4 col-md-6 align-self-center">
          <h1 class="text-center navbar-text">
            Al infinito y mas alla
          </h1>
        </div>

        <div class="col-3 col-sm-4 col-md-4 justify-content-end align-self-center">
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-links"
            aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse align-self-center justify-content-end group" id="navbar-links">
            <ul class="nav navbar-nav align-self-center justify-content-end">
              <li class="nav-item active">
                <a class="nav-link" href="home">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="empresas">Empresas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cohetes">Cohetes</a>
              </li>
              {if $logged }
                <li class="nav-item" >
                  <a class="nav-link" href="logout">Logout</a>
                </li>
              {else}
                <li class="nav-item">
                  <a class="nav-link" href="login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register">Register</a>
                </li>
              {/if}
              
            </ul>
          </div>
        </div>
      </div>

    </nav>
  </header>
  <main>