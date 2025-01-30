<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('posts.index') }}" class="nav-link px-2 text-white">All posts</a></li>
                <li><a href="{{ route('posts.create') }}" class="nav-link px-2 text-white">Create</a></li>
            </ul>

            <div class="text-end">
                @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="button" class="btn btn-primary">Logout</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</header>