<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
            <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h1>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>