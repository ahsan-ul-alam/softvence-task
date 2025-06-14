<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded p-6">
                <form method="POST" action="{{ route('courses.update', $course->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" value="{{ $course->title }}"
                            class="w-full border border-gray-300 rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Duration</label>
                        <input type="text" name="duration" value="{{ $course->duration }}"
                            class="w-full border border-gray-300 rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Level</label>
                        <select name="level" class="w-full border border-gray-300 rounded p-2">
                            <option value="beginner" {{ $course->level == 'beginner' ? 'selected' : '' }}>Beginner
                            </option>
                            <option value="intermediate" {{ $course->level == 'intermediate' ? 'selected' : '' }}>
                                Intermediate</option>
                            <option value="advanced" {{ $course->level == 'advanced' ? 'selected' : '' }}>Advanced
                            </option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
