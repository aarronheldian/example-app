<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Project::query();

        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        if (request('start_date') && request('end_date')) {
            // Both start date and end date are provided
            $query->whereBetween('deadline', [request('start_date'), request('end_date') . ' 23:59:59']);
        } elseif (request('start_date')) {
            // Only start date is provided
            $query->where('deadline', '>=', request('start_date'));
        } elseif (request('end_date')) {
            // Only end date is provided
            $query->where('deadline', '<=', request('end_date') . ' 23:59:59');
        }

        // Order the projects by the closest deadline first
        // Then, order by projects with deadlines exceeding the current date
        $query->orderByRaw('deadline <= CURDATE()')
            ->orderBy('deadline', 'asc');

        $projects = $query->get();

        return view('project.list', [
            "title" => "Project",
            "projects" => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create', [
            "title" => "Project"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());

        return redirect()->route('project.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.detail', [
            "title" => "Project",
            "project" => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully');
    }
}
