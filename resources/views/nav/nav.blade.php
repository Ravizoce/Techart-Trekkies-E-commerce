<div class="container-fluid d-flex justify-content-center">
    <div class="w-50 me-2" id="navbarSupportedContent">
        <form action="{{route('filter')}}" method="get" class="d-flex" role="search">
            <input class="form-control me-2 w-100" name='search' type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="w-fit">
        <a class=" text-decoration-none text-black" href="{{route('cart')}}">
            <button class="bg-primary rounded-3">
                <i class="bi bi-cart " style="font-size: 1.4rem;"></i>
            </button>
        </a>
    </div>
    @auth
        <div class="profile ms-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu bg-dark-subtle text-light">
                    <li><a class="dropdown-item" href="{{route("profile")}}">profile</a></li>
                    <li><a class="dropdown-item" href="{{ url('logout') }}">Log-out</a></li>
                </ul>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endauth
    @if (!auth()->check())
        <div class="ms-2 ">
            <a class=" text-decoration-none" href="{{ route('login') }}">
                <div class="butn bg-primary  rounded-3 p-2 text-black ">
                    login
                </div>
            </a>
        </div>
    @endif
</div>
