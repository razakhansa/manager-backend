<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    public function index()
    { 
        $projects = Project::with('tasks')->get();
        return response()->json($projects);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $project = Project::create($validatedData);

        return response()->json($project, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return response()->json($project, 200);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(null, 204);
    }

    // public function index()
    // {
    //     $projects = Project::all();
    //     return response()->json($projects);
    // }

    // public function show($id)
    // {
    //     $project = Project::findOrFail($id);
    //     return response()->json($project);
    // }

}
