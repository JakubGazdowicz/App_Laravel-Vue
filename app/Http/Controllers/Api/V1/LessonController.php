<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Resources\V1\LessonCollection;
use App\Http\Resources\V1\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        return new LessonCollection(Lesson::paginate(10));
    }

    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
    }

    public function store(StoreLessonRequest $request)
    {
        Lesson::create($request->validated());

        return response()->json("Lesson created");
    }

    public function update(StoreLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());

        return response()->json("Lesson updated");
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return response()->json("Lesson deleted");
    }
}
