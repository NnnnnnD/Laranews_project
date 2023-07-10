<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('uploads/logo.png')}}" alt="LARANEWS Logo">
            LARANEWS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-1">
                <li class="nav-item">
                    <a class="nav-link" href="/home" style="color: white;">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($category as $cat)
                        <li>
                            <a class="dropdown-item" href="{{route('onKategori', $cat->id)}}">{{ $cat->nama_kategori }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                
            </ul>
            <form class="d-flex  mb-1" action="{{ route('search') }}" method="GET">
                <div class="input-group ">
                    <input class="form-control" type="search" name="keyword" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </div>
            </form>
            
            <ul class="navbar-nav ml-auto ms-5">
               
                <li class="nav-item dropdown ">
                    @auth
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    @endauth
                    @guest
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> User
                    </a>
                    @endguest
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        @endauth
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
        
    </div>
</nav>
<style>
    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: black;
        font-weight: bold;
        font-size: 18px;
    }

    .navbar-brand img {
        height: 30px;
    }
</style>
