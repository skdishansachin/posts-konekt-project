<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="flex items-baseline space-x-4">
                        <a href="{{ route('posts.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">All posts</a>
                        <a href="{{ route('posts.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Create Post</a>
                    </div>
                </div>
            </div>
            <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>