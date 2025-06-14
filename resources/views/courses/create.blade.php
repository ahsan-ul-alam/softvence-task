<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Course') }}
        </h2>
    </x-slot>

    <div class="mt-8 max-w-7xl mx-auto p-6 bg-gray-900 text-white rounded-lg shadow-md">
        <form id="courseForm" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Course Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Course Title</label>
                    <input type="text" name="title" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md" required>
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Feature Video</label>
                    <input type="text" name="feature_video" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Course Category</label>
                    <select name="category" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Thumbnail</label>
                    <input type="file" name="thumbnail" class="w-full px-4 py-1 bg-gray-800 border border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Price (৳)</label>
                    <input type="number" name="price" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md" required>
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Duration (e.g. 10 hours)</label>
                    <input type="text" name="duration" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Level</label>
                    <select name="level" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md">
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Status</label>
                    <select name="status" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md">
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1 text-sm text-gray-300">Feature Video Url</label>
                    <input type="text" name="feature_video" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-md">
                </div>
            </div>

            <!-- Modules -->
            <div id="modulesWrapper" class="space-y-6"></div>

            <button type="button" id="addModuleBtn" class="mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md">
                + Add Module
            </button>

            <!-- Submit Buttons -->
            <div class="mt-6 flex gap-4">
                <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md font-semibold">
                    Save
                </button>
                <button type="reset" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md font-semibold">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <!-- jQuery and Module Logic -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let moduleIndex = 0;

        $('#addModuleBtn').on('click', function () {
            moduleIndex++;
            const moduleHTML = `
                <div class="p-4 bg-gray-800 rounded-lg shadow-md module" data-index="${moduleIndex}">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-lg font-semibold">Module ${moduleIndex}</h3>
                        <button type="button" class="removeModuleBtn text-red-400 hover:text-red-600">Remove Module</button>
                    </div>

                    <input type="text" name="modules[${moduleIndex}][title]" class="w-full mb-3 px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white" placeholder="Module Title" required>
                    <input type="textarea" name="modules[${moduleIndex}][description]" class="w-full h-40 mb-3 px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white" placeholder="derscription (if any)"></textare>

                    <div class="contents space-y-4"></div>

                    <button type="button" class="addContentBtn px-3 py-1 mt-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-md">
                        + Add Content
                    </button>
                </div>
            `;
            $('#modulesWrapper').append(moduleHTML);
        });

        $(document).on('click', '.removeModuleBtn', function () {
            $(this).closest('.module').remove();
        });

        $(document).on('click', '.addContentBtn', function () {
            const moduleDiv = $(this).closest('.module');
            const moduleIndex = moduleDiv.data('index');
            const contentIndex = moduleDiv.find('.content').length;

            const contentHTML = `
                <div class="content p-4 bg-gray-700 rounded-md shadow-sm">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-white">Content</span>
                        <button type="button" class="removeContentBtn text-red-300 hover:text-red-500 text-sm">✕</button>
                    </div>

                    <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][title]" class="w-full mb-2 px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white" placeholder="Content Title">

                    <select name="modules[${moduleIndex}][contents][${contentIndex}][type]" class="w-full mb-2 px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white">
                        <option value="text">Text</option>
                        <option value="video">Video url</option>
                        <option value="image">Image</option>
                        <option value="link">Link</option>
                    </select>

                    <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][duration]" class="w-full mb-2 px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white" placeholder="Duration">

                    <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][value]" class="w-full mb-2 px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white" placeholder="Content Value / Link / Text">
                </div>
            `;
            moduleDiv.find('.contents').append(contentHTML);
        });

        $(document).on('click', '.removeContentBtn', function () {
            $(this).closest('.content').remove();
        });
    </script>
</x-app-layout>
