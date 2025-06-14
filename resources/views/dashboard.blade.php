<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-bold mb-4">Courses</h3>

                    <table class="min-w-full border text-left text-sm font-light">
                        <thead class="border-b bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4">Title</th>
                                <th scope="col" class="px-6 py-4">Category</th>
                                <th scope="col" class="px-6 py-4">Duration</th>
                                <th scope="col" class="px-6 py-4">Level</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $key => $course)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $course->title }}</td>
                                    <td class="px-6 py-4">{{ $course->category->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4">{{ $course->duration }}</td>
                                    <td class="px-6 py-4 capitalize">{{ $course->level }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('courses.edit', $course->id) }}"
                                            class="text-blue-600 hover:underline">Edit</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No courses found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
