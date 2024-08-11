<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TopikTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $topik = TopikTraining::select('id', 'title')->get();

        return view('course.index', compact('topik'));
    }

    public function getCourse(Request $request)
    {
        $topik = $request->input('topik');

        $sql = Course::with('topikTraining');

        if ($topik !== 'semua') {
            $sql->where('topik_id', $topik);
        }

        $course = $sql->get();

        return response()->json([
            'data' => $course->map(function ($item) {
                $topikTitle = TopikTraining::where('id', $item->topik_id)->value('title');

                return [
                    'id' => $item->id,
                    'topik' => $topikTitle,
                    'cover' => Storage::url($item->cover),
                    'title' => $item->title,
                    'description' => $item->description,
                    'mentor' => $item->mentor,
                    'student' => $item->student
                ];
            })
        ]);
    }

    public function storeTopik(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'mentor' => 'required|string|max:100',
                'student' => 'required',
                'topik' => 'required',
                'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('cover')) {
                $imagePath = $request->file('cover')->store('course_covers', 'public');
            } else {
                $imagePath = null;
            }

            Course::create([
                'topik_id' => $validatedData['topik'],
                'cover' => $imagePath,
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'mentor' => $validatedData['mentor'],
                'student' => $validatedData['student'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Course berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteCourse($id)
    {
        $data = Course::findOrFail($id);
        if ($data->cover) {
            Storage::disk('public')->delete($data->cover);
        }
        $data->delete();

        return redirect()->route('course.index');
    }
}