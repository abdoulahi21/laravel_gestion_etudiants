<nav class="navbar navbar-expand-lg bg-info" >
<div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: white;">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" >
            <li class="nav-item">
                <a class="nav-link active" style="color: white;" aria-current="page" href="{{route('auth.etudiant')}}">Etudiant</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link active" style="color: white;" href="{{route('auth.classe')}}">Classe</a>
            </li>
            <li class="nav-item">
            </li>
            <li class="nav-item float-end">

            </li>
        </ul>
        <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            @auth
                <form   class="nav-item " action="{{route('auth.logout')}}" method="post">
                    @method("delete")
                    @csrf
                    <button  class="nav-link " onclick="return confirm('voulez-vous vous deconnecter');return false;" style="color: white;">Deconnexion</button>
                </form>
            @endauth
        </div>


    </div>
</div>
</nav>
<!---pour gerer la position de l'appelle de la page--->
@yield('content')
