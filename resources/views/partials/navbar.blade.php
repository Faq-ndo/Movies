<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt"><i class="fas fa-film"></i></span> Movies</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/topMovies">
                            <i class="fas fa-star"></i>
                            Top Movies
                        </a>
                    </li>

                </ul>
                @if( Auth::check())
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="/likedMovies">
                            <i class="fas fa-heart"></i>
                            My Movies
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Log Out
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </li>
                </ul>
                @endif
                @if( !Auth::check())
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item">
                            <a class="nav-link" href="/logIn">
                                <i class="fas fa-user"></i>
                                Log In
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/signUp">
                                <i class="fas fa-user-plus"></i>
                                Register
                            </a>
                        </li>
                    </ul>
                @endif
            </div>

    </div>
</nav>
