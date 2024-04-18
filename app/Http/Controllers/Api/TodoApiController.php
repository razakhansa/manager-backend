<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TodoTask;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

// class TodoApiController extends Controller
// {

//     public function index()
//     {
//         return TodoTask::all();
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'title' => 'required',
//             'description' => 'required|',
//             'status' => 'required',
            
//         ]);
//         $task = new TodoTask;
//         $task->title = $validatedData['title'];
//         $task->description = $validatedData['description'];
//         $task->status = $validatedData['status'];
//         $task->save();


//         return response()->json($task, 201);
//     }

//     public function destroy($id)
//     {
//         $task = TodoTask::find($id);
//         if (!$task) {
//             return response()->json(['message' => 'Contact not found'], 404);
//         }
//         $task->delete();

//         return response()->json(null, 204);
//     }

//     public function toggleStatus($id)
//     {
//         $task = TodoTask::find($id);
//         if (!$task) {
//             return response()->json(['message' => 'Contact not found'], 404);
//         }

//         $task->status = $task->status === 1 ?  0 : 1 ;
//         $task->save();

//         return response()->json($task, 200);
//     }

//     public function edit($id)
//     {
//         $task = TodoTask::find($id);
//         if (!$task) {
//             return response()->json(['message' => 'Contact not found'], 404);
//         }


//         return response()->json($task, 200);
//     }

//     public function update(Request $request, $id)
//     {
//         try {
//             $task = TodoTask::findOrFail($id);
//             $validatedData = $request->validate([
//                 'title' => 'sometimes|required',
//                 'description' => 'sometimes|required|',
//                 'status' => 'sometimes|required',
//             ]);
            
//             $task->update($validatedData);
    
//             return response()->json($task, 200);
//         } catch (\Exception $e) {
//             return response()->json(['error' => 'Update failed: ' . $e->getMessage()], 500);
//         }
//     }
    
// }
