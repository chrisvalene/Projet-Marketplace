<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center bg-dark">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Append</h1>
        <span>.</span>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu ">
        <ul>
          <li><a href="{{route('index')}}#hero" class="active">Accueil</a></li>
          <li><a href="{{route('index')}}#about">Nos produits</a></li>
          <li><a href="{{route('index')}}#services">Marches</a></li>
          <li><a href="{{route('index')}}#contact">Contact</a></li>
          <li><a href="{{route('index')}}#contact">Temoignages</a></li>

          @guest
            {{-- ************************************* --}}
             <li class="dropdown has-dropdown"><a href="#"><span>S'authentifier</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dd-box-shadow">
              <li><a href="{{ route('Inscription') }}">Inscription</a></li>
              <li><a href="{{ route('login') }}">Connexion</a></li>
            </ul>
          </li>
          {{-- ************************************* --}}
          @endguest


          @auth
          
              <li><a href="#">{{auth()->user()->nom_utilisateur}}</a></li>
            @if(auth()->user()->isAcheteur())
               <li><a href="#">Commandes</a></li>
            @endif

             <form action="{{route('logout')}}" method="post" class="d-inline">
              @csrf
                <button class="btn btn-success">Deconnexion</button>
            </form>

          @endauth
          


        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

     

    </div>
  </header><!-- End Header -->
