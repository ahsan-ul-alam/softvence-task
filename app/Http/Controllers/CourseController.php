<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\module;
use App\Models\course;
use App\Models\content;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $categories = category::all();
        return view('courses.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        // Validate base course data
        $request->validate([
            'title' => 'required|string|max:255',
            'feature_video' => 'nullable|string',
            'category' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'duration' => 'nullable|string',
            'level' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Handle thumbnail upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Create the course
        $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'feature_video' => $request->feature_video,
            'category_id' => $request->category,
            'thumbnail' => $thumbnailPath,
            'price' => $request->price,
            'video' => $request->feature_video,
            'duration' => $request->duration,
            'level' => $request->level,
            'status' => $request->status,
        ]);

        // Save modules and contents
        if ($request->has('modules')) {
            foreach ($request->modules as $moduleData) {
                $module = new Module();
                $module->title = $moduleData['title'];
                $module->description = $moduleData['description'] ?? null;
                $module->course_id = $course->id;
                $module->save();

                if (!empty($moduleData['contents'])) {
                    foreach ($moduleData['contents'] as $contentData) {
                        $content = new Content();
                        $content->module_id = $module->id;
                        $content->title = $contentData['title'];
                        $content->video_source = $contentData['type'];
                        $content->video_length = $contentData['duration'] ?? null;
                        $content->video_url = $contentData['value'];
                        $content->save();
                    }
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $course = course::find($id);
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('dashboard')->with('error', 'can not update course.Not permitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
