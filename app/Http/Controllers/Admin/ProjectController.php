<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:index project', ['only' => ['index']]);
        $this->middleware('permission:show project', ['only' => ['show']]);
        $this->middleware('permission:create project', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit project', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete project', ['only' => ['delete', 'destroy']]);
    }


    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() : View
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $category = new Project();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return to_route('projects.index')->with("status", "Gebruiker toegevoegd!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('pro ject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return to_route('projects.index')->with("status", "User changed!");
    }

    /**
     *  Show the form for deleting the specified resource.
     */
    public function delete(Project $project)
    {
        return view('admin.projects.delete', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('projects.index')->with("status", "User deleted!");
    }
}
