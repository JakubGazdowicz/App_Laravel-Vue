<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\V1\TaskCollection;
use App\Http\Resources\V1\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return new TaskCollection(Task::paginate(5));
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return response()->json("Task created");
    }

    public function update(StoreTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return response()->json("Task updated");
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json("Task deleted");
    }
}
