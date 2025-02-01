<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    public function getAllProjects($perPage)
    {
        return Project::latest()
            ->paginate($perPage);
    }

    public function createProject(array $data)
    {
        return Project::create($data);
    }

    public function editProject(Project $project)
    {
        return $project;
    }

    public function updateProject(Project $project, array $data)
    {
        return $project->update($data);
    }

    public function deleteProject(Project $project)
    {
        return $project->delete();
    }
}