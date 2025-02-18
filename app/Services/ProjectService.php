<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectService
{
    public function getAllProjects(int $perPage)
    {
        return Project::with('sector', 'client')->latest()
            ->paginate($perPage);
    }

    public function createProject(array $data)
    {
        DB::beginTransaction();

        try {
            $project = new Project();
            $project->title = $data['title'];
            $project->sub_title = $data['sub_title'];
            $project->slug = Str::slug($data['title'], '-');
            $project->sector_id = $data['sector_id'];
            $project->client_id = $data['client_id'];
            $project->description = $data['description'];
            $project->location = $data['location'];
            $project->save();

            if (request()->hasFile('projectImages')) {
                Log::info('Files received:', [request()->file('projectImages')]);

                foreach ($data['projectImages'] as $image) {
                    $projectImage = new ProjectImage();
                    $projectImage->project_id = $project->id;
                    $projectImage->image = $image;
                    $projectImage->save();
                }
            }

            DB::commit();

            return $project;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Project creation failed: ' . $e->getMessage());

            return response()->json(['error' => 'Project creation failed!'], 500);
        }
    }


    public function editProject(int $id)
    {
        return Project::with(
            'sector',
            'client',
            'projectImages'
        )->findOrFail($id);
    }

    public function updateProject(int $id, array $data)
    {
        DB::beginTransaction();

        try {
            $project = Project::with('projectImages')->findOrFail($id);

            $project->update([
                'title'       => $data['title'],
                'sub_title'   => $data['sub_title'],
                'slug'        => Str::slug($data['title'], '-'),
                'sector_id'   => $data['sector_id'],
                'client_id'   => $data['client_id'],
                'description' => $data['description'],
                'location'    => $data['location'],
            ]);

            $existingImages = $project->projectImages->pluck('image')->toArray();
            foreach ($existingImages as $oldImage) {
                if (!in_array($oldImage, request('oldImages'))) {
                    Storage::disk('public')->delete('projects/' . $oldImage);
                    ProjectImage::where('project_id', $project->id)->where('image', $oldImage)->delete();
                }
            }

            if (!empty($data['projectImages']) && is_array($data['projectImages'])) {
                Log::info('Files received:', [$data['projectImages']]);
                foreach ($data['projectImages'] as $image) {

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'image'      => $image
                    ]);
                }
            }

            DB::commit();

            return $project;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Project update failed: ' . $e->getMessage());

            return response()->json(['error' => 'Project update failed!'], 500);
        }
    }


    public function deleteProject(int $id)
    {
        ProjectImage::where('project_id', $id)->delete();
        Project::findOrFail($id)->delete();

        return true;
    }
}
