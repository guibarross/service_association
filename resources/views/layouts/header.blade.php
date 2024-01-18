<div class="card-header bg-primary shadow p-3 border-0">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div>
            <a class="navbar-brand text-white py-0 my-0" href="{{ route('services.index') }}">
                <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="Logo"> Service Association
            </a>
        </div>
        <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse d-sm-flex justify-content-end" id="navbarNavAltMarkup">
            @auth
                <a class="nav-link text-white pl-0" href="{{ route('services.index') }}">Serviços</a>
                @if (auth()->check() && auth()->user()->is_admin != 1)
                    <a class="nav-link text-white pl-0" href="{{ route('user.services') }}">Serviços Associados</a>
                @endif
                <a class="nav-link text-white pl-0" href="/user/profile">Meu Perfil</a>
                <form action="/logout" method="post">
                    @csrf
                    <a class="nav-link text-white pl-0" href="/logout"
                        onclick="event.preventDefault(); 
                                                        this.closest('form').submit();">
                        Sair <i class="bi bi-box-arrow-right"></i>
                    </a>
                </form>
            @endauth
            @guest
                <a class="nav-link text-white pl-0" href="/login">Entrar</a>
                <a class="nav-link text-white pl-0" href="/register">Cadastrar</a>
            @endguest
        </div>
    </nav>
</div>
