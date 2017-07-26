    <nav class="navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <p class="navbar-brand">WebSiteName</p>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home">Home</a></li>
    @if(Auth::check())
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inserimento
                  <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="inserisci-area">Area</a></li>
                        <li><a href="inserisci-mercato">Mercato</a></li>
                        <li><a href="inserisci-postazione">Postazione</a></li>
                        <li><a href="inserisci-autorizzazione">Autorizzazione</a></li>
                        <li><a href="inserisci-operatore">Operatore</a></li>
                        <li><a href="inserisci-tipologia">Tipologia merceologica</a></li>
                      </ul>
               
                </li>

              <li class="dropdown">

                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestione
                <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="inserisci-mercato">Mercato</a></li>
                    <li><a href="inserisci-area">Area</a></li>
                    <li><a href="inserisci-operatore">Assegnazioni</a></li>
                    <li><a href="inserisci-postazione">Presenze</a></li>
                    <li><a href="inserisci-autorizzazione">Autorizzazioni</a></li>
                  </ul>
           
              </li>
            </ul>
              <ul class="navbar-right">
                      <ul class="nav navbar-nav navbar-right">
                        <li style="color:black">Welcome, {{Auth::user()->name}}</li>
                        <li><a href="logout">Logout</a></li>
              </ul>       
          @else
            </ul>
          </ul>
          <div class="container">
                        <ul class="navbar-right">
                          <ul class="nav navbar-nav navbar-right">
                           <li><a href="register">Registrati</a></li>
                            <li><a href="login">Login</a></li>
                          </ul>
                        </ul>
          </div>

          @endif  

        </div>
      </div>
</nav>