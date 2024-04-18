<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function index(Request $request)
    {
        if($request->project_id)
        {
            $tasks = Task::where('projectId',$request->project_id)->with('project:title')->get();
        }
        else{
            $tasks = Task::with('project')->get();
        }

        return response()->json($tasks);
    }

    public function status(Request $request, Task $task)
    {

        // dd($request->all());
        $task = Task::findOrFail($request->id);
        $task->status = $request->input('status');
        $task->save();

        return response()->json('task status updated');
       
    }


    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'status' => 'required|in:PENDING,COMPLETED',
        //     'project_id' => 'required|exists:projects,id',
        // ]);
        // dd($validatedData);

        $data = [
            'title' => $request->title,
            'description'  => $request->description,
            'status'  => $request->status,
            'project_id'  => $request->project_id,
        ];

        // dd($data);

        $task = Task::create($data);

        return response()->json($task, 200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:PENDING,COMPLETED',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return response()->json($task, 200);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
    // public function index()
    // {
    //     $tasks = Task::all();
    //     return response()->json($tasks);
    // }

    // public function show($id)
    // {
    //     $task = Task::findOrFail($id);
    //     return response()->json($task);
    // }
}
