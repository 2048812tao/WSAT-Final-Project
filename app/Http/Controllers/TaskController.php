<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function list()
    {
        $tasks = Task::paginate();
        return TaskResource::collection($tasks);
    }

    public function create(TaskRequest $request)
    {
        $payload = $request->validated();
        $task = Task::create($payload);
        return (new TaskResource($task));
    }

    public function show($taskID)
    {
        $task = Task::where('id', $taskID)->firstOrFail();
        return (new TaskResource($task));
    }

    public function update(TaskRequest $request, $taskID)
    {
        $payload = $request->validated();
        $task = Task::where('id', $taskID)->firstOrFail();
        $task->update($payload);
        return (new TaskResource($task->fresh()));
    }

    public function destroy($taskID)
    {
        $task = Task::where('id', $taskID)->firstOrFail();
        $task->delete();
        return response(status:203);
    }
}
