<div class="row">
    <div class="col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('report.submit') }}">Report Submit <span
                                class="sr-only">(current)</span></a>
                    </li>





                    @if (Auth::check())

                        @if (Auth::user()->user_type == 'admin')
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}"> Dashboard<span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('user.dashboard') }}"> Dashboard<span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/login') }}">Login/Signup <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    @endif

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
</div>{{-- row --}}
