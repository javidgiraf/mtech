<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Sector;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects(10);

        return view(
            'pages.admin.projects.index',
            compact('projects')
        );
    }

    public function create()
    {
        $sectors = Sector::all();
        $clients = Client::all();

        return view(
            'pages.admin.projects.create',
            compact('sectors', 'clients')
        );
    }

    public function store(CreateProjectRequest $request)
    {
        $this->projectService->createProject($request->all());

        return redirect()->route('admin.projects.index')->with('success', 'Project saved successfully');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        $project = $this->projectService->editProject($project->id);
        $sectors = Sector::all();
        $clients = Client::all();

        return view(
            'pages.admin.projects.edit',
            compact('project', 'sectors', 'clients')
        );
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectService->updateProject($project->id, $request->all());

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $this->projectService->deleteProject($project->id);

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }
}
