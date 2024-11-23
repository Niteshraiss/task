<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @if (!Auth::user())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('index')}}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"href="{{route('login')}}">Login</a>
                </li>
                @endif
            </ul>
            @if (Auth::user())
            <li class="nav-item dropdown d-flex">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
            @endif

        </div>
    </div>
</nav>