<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('dashboard', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        $data = $request->all();

        if ($request->has('cover_image')) {
            $img_path = Storage::put('cover_images', $request->cover_image);
            $data['cover_image'] = $img_path;
        }

        $data['slug'] = Str::slug($request->title);


        //dd($data['project_link']);
        $new_project = Project::create($data);

        return to_route('project.index')->with('message', 'Created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();
        if ($request->has('cover_image') && $project->cover_image) {
            Storage::delete($project->cover_image);

            $img_path = Storage::put('cover_image', $request->cover_image);
            $data['cover_image'] = $img_path;
        }
        //dd($data);
        $project->update($data);
        return to_route('project.index')->with('message', 'Updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        if (isNull($project->cover_image)) {
            Storage::delete($project->cover_image);
        }

        //dd($project);
        $project->delete();

        return to_route('project.index')->with('message', 'Delete sucessfully');
    }
}
