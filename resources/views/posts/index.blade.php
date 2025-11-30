<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('posts.create') }}" class="text-blue-500 underline">Create New Post</a>
                    <table class="w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Id</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Updated</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td class="border px-4 py-2">{{ $post->id }}</td>
                                <td class="border px-4 py-2">{{ $post->title }}</td>
                                <td class="border px-4 py-2">{{ $post->updated_at->format('d M Y | h:m') }}</td>
                                <td class="border px-4 py-2 flex gap-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 underline">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 underline"
                                                onclick="return confirm('Are you sure you want to delete this post?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
