<div class="card-header bg-primary shadow p-3 border-0">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div>
        <a class="navbar-brand text-white" href="{{ route('services.index') }}">
            Service Association
        </a>
    </div>
            <div class="navbar-nav">
                @auth
                    <a class="nav-link text-white" href="{{ route('services.index') }}">Serviços</a>
                    @if (auth()->check() && auth()->user()->is_admin =! 1)
                    <a class="nav-link text-white" href="{{ route('user.services')  }}">Serviços Associados</a>   
                    @endif
                    <a class="nav-link text-white" href="/user/profile">Meu Perfil</a>
                    <form action="/logout" method="post">
                        @csrf
                        <a class="nav-link text-white" href="/logout"
                            onclick="event.preventDefault(); 
                                                        this.closest('form').submit();">
                            Sair <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </form>
                @endauth
                @guest
                    <a class="nav-link text-white" href="/login">Entrar</a>
                    <a class="nav-link text-white" href="/register">Cadastrar</a>
                   
                @endguest
            </div>
        
    </nav>
</div>
