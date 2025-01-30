<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-1/2" />
            <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $post->content }}
                </div>
            </div>

            <div class="flex gap-3 mt-2">
                <a href="{{ route('posts.edit', $post) }}">
                    <x-primary-button>Edit</x-primary-button>
                </a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <x-danger-button>Delete</x-danger-button>
                    </button>
            </div>
        </div>
    </div>
</x-app-layout>